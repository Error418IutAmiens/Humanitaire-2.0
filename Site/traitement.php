<?php

try{
    $strConnection = 'mysql:host=localhost;port=3306;dbname=humanitaire';
    $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $db = new PDO($strConnection, 'root', '', $arrExtraParam);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}

	//----- AJOUT PERSONNE -----\\
	if(isset($_POST['etat'])){
		$req = "insert into personne (etatConscience,sexe,trancheAge,couleurCheveux,couleurYeux,typeRefugie,nationalite";
		$values = "values(";
				
		if($_POST['etat'] == 'conscient'){
			$values = $values.'1';
		}
		else{
			$values = $values.'0';
		}
		
		$values = $values.",'".$_POST['sexe']."'";
		$values = $values.",'".$_POST['age']."'";
		$values = $values.",'".$_POST['cheveux']."'";
		$values = $values.",'".$_POST['yeux']."'";
		$values = $values.",'".$_POST['typeref']."'";
		$values = $values.",'".$_POST['pays']."'";
		
		
		if(isset($_POST['nom'])){
			$req = $req.",nom";
			$values = $values.",'".$_POST['nom']."'";
		}
		if(isset($_POST['prenom'])){
			$req = $req.",prenom";
			$values = $values.",'".$_POST['prenom']."'";
		}
		if(isset($_POST['taille']) and $_POST['taille'] != null){
				$req = $req.",taille";
				$values = $values.','.$_POST['taille'];		
		}
		if(isset($_POST['description'])){
			$req = $req.",descriptif";
			$values = $values.",\"".$_POST['description']."\"";
		}
		
		
		$values = $values.");";
		$req = $req.") ".$values;
		$db->exec($req);
		$id_data = $db->lastInsertId();	
		$req2 = "insert into presence (dateArrivee,id_pers,id_camp)
					VALUES(NOW(),".$id_data.",".$_POST['camp'].");";				
		$db->exec($req2);
		
		header('Location: index.php?action=addPers&ret=OK'); 
	}
	
	//----- AJOUT CAMP -----\\
	if(isset($_POST['localisationCamp'])){
		$req = "insert into camp (localisation,nom,nbPlaces,nbMedecins";
		$value = "values(\"".$_POST['localisationCamp'].'"';
		if(isset($_POST['nomDuCamp']) and $_POST['nomDuCamp'] != ''){
			$value.=",\"".$_POST['nomDuCamp'].'"';
		}
		else{
			header('Location: index.php?action=addCamp&ret=KO');		
		}
		if(isset($_POST['nbPlaces']) and $_POST['nbPlaces'] != null){
			$value.=",".$_POST['nbPlaces'];
		}
		else{
			header('Location: index.php?action=addCamp&ret=KO');
		}
		if(isset($_POST['nbMedecins']) and $_POST['nbMedecins'] != null){
			$value.=",".$_POST['nbMedecins'];
		}
		else{
			header('Location: index.php?action=addCamp&ret=KO');
		}
		if(isset($_POST['coordonnees'])){
			$req.=",coordonneesGeo";
			$value.=',"'.$_POST['coordonnees'].'"';
		}
		$req.=") ";
		$value.=");";
		$db->exec($req.$value);
		header('Location: index.php?action=addCamp&ret=OK');
	}
	
	//----- TRANSFERT PERSONNE -----\\
		if(isset($_POST['destination'])){
			$req = "update presence
					set dateSortie=NOW()
					where id_pers = ".$_POST['idPers']." and dateSortie < dateArrivee;";
			$db->exec($req);
			if($_POST['destination'] != "sortie"){
				$req = "insert into presence (dateArrivee,id_pers,id_camp)
					VALUES(NOW(),".$_POST['idPers'].",".$_POST['destination'].");";
				$db->exec($req);
			}
			header('Location: index.php?action=transfert&ret=OK');
		}
		
	//----- APPROVISIONNEMENT -----\\
		if(isset($_POST['campDestinataire'])){
			if(($_POST['medicament'] != '0') and ($_POST['nbMedicament'] > 0)){
				$flag = true;
				$stmt  = $db->prepare("Select id_stock_medicaments, qteMedicaments 
										from stockmedicaments 
										where id_medicaments = ? and id_camp = ?");
				if($stmt->execute(array($_POST['medicament'],$_POST['campDestinataire']))){					
					if($stmt->rowCount() == 0){
						$stmt = $db->prepare("insert into stockmedicaments (id_medicaments,id_camp,qteMedicaments) 
												values(:med,:camp,:qte)");
						$stmt->execute(array(':med'=>$_POST['medicament'],':camp'=>$_POST['campDestinataire'],':qte'=>$_POST['nbMedicament']));
					}
					else{
						$row = $stmt->fetch();
						$stmt = $db->prepare('update stockmedicaments set qteMedicaments = :qte
												where id_stock_medicaments = :id');
						$stmt->execute(array(':id'=>$row['id_stock_medicaments'],':qte'=>$row['qteMedicaments'] + $_POST['nbMedicament']));
					}					
				}			
			}
			else{
				$flag = false;
			}
			
			if(($_POST['materiel'] != '0') and ($_POST['nbMateriel'] > 0)){
				$flag = true;
				$stmt  = $db->prepare("Select id_stock_materiel, qtemateriel
										from stockmateriel 
										where id_materiel_medical = ? and id_camp = ?");
				if($stmt->execute(array($_POST['materiel'],$_POST['campDestinataire']))){					
					if($stmt->rowCount() == 0){
						$stmt = $db->prepare("insert into stockmateriel (id_materiel_medical,id_camp,qtemateriel) 
												values(:med,:camp,:qte)");
						$stmt->execute(array(':med'=>$_POST['materiel'],':camp'=>$_POST['campDestinataire'],':qte'=>$_POST['nbMateriel']));
					}
					else{
						$row = $stmt->fetch();
						$stmt = $db->prepare('update stockmateriel set qtemateriel = :qte
												where id_stock_materiel = :id');
						$stmt->execute(array(':id'=>$row['id_stock_materiel'],':qte'=>$row['qtemateriel'] + $_POST['nbMateriel']));
					}					
				}
			}
			
			if($flag){
				header('Location: formulaire.php?dest=formAppro&ret=OK'); 
			}
			else{
				header('Location: formulaire.php?dest=formAppro&ret=KO'); 
			}					
		}
		
		
		
		
	//----- REDIRECTION SI PAS DE FORMULAIRE -----\\	
		if(empty($_POST))	
			header('Location: index.php'); 
?>