<head>
		<title>Humanitaire 2.0</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="CSS/main.css">
</head>
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
	$req = "SELECT * FROM personne WHERE ";
	$et = false;
	if(!empty($_POST['sexe']))
	{
			$req .= "personne.sexe = \"".$_POST['sexe']."\""; 
			$et = true;

	}
	if(!empty($_POST['nom']))
	{
		if($et)
		{
			$req .= " AND ";

		}

		$req .= " personne.nom = \"".$_POST['nom']."\"";	
		$et=true;
	}
	
	if(!empty($_POST['prenom']))
	{
		if($et)
		{
			$req .= " AND ";

		}

			$req .= " personne.prenom = \"".$_POST['prenom']."\"";
			$et=true;
	}
	
	if(!empty($_POST['pays']))
	{
		if($et)
		{
			$req .= " AND ";
		}

		$req .=" personne.nationalite = \"".$_POST['pays']."\"";
		$et=true;
	}

	if(!empty($_POST['age']))
	{
		if($et)
		{
			$req .= " AND ";

		}

		$req .= " personne.trancheAge = \"".$_POST['age']."\"";
		$et=true;
	}

	if(!empty($_POST['cheveux']))
	{
		if($et)
		{
			$req .= " AND ";

		}

		$req .= " personne.couleurCheveux = \"".$_POST['cheveux']."\"";
		$et=true;
	}

	if(!empty($_POST['yeux']))
	{
		if($et)
		{
			$req .= " AND ";

		}

		$req .= " personne.couleurYeux = \"".$_POST['yeux']."\"";
		$et=true;
	}
	if(!empty($_POST['typeref']))
	{
		if($et)
		{
			$req .= " AND ";

		}

		$req .= " personne.typeRefugie = \"".$_POST['typeref']."\"";
		$et=true;
	}
	else{
		if(!$et){
			$req = "select * from personne";
		}
	}

$reponse = $db->query($req." order by nom");
$flag=false;
include('sidebar.php');
echo "<div id='content'>";
if($reponse->rowCount() == 0){ 
	echo"Aucune personne ne correspond à votre recherche";
}
else{
	echo "<table width=100%>";
	echo "<TR><TH id='titleBorder'><B>NOM</B></TH>
			<TH id='titleBorder'><B>PRENOM</B></TH>
			<TH id='titleBorder'><B>NATIONALITE</B></TH>
			<TH id='titleBorder'><B>AGE</B></TH>
			<TH id='titleBorder'><B>TAILLE</B></TH>
			<TH id='titleBorder'><B>CHEVEUX</B></TH>
			<TH id='titleBorder'><B>YEUX</B></TH>
			<TH id='titleBorder'><B>TYPE DE REFUGIE</B></TH>
			<TH id='titleBorder'><B>CAMP</B></TH>
			<TH id='titleBorder'><B>TRANSFERT</B></TH></TR>";
			
	while ($donnees = $reponse->fetch())
	{
		$req = $db->prepare("Select camp.id_camp,camp.nom,camp.localisation 
				from camp,presence 
				where camp.id_camp = presence.id_camp and id_pers = :id and dateSortie < dateArrivee;");
		$req->execute(array(':id'=>$donnees['id_pers']));
		echo "<TR><TD id='border'>";
		echo $donnees['nom'];
		echo "</TD><TD id='border'>";
		echo $donnees['prenom'];
		echo "</TD><TD id='border'>";
		echo $donnees['nationalite'];
		echo "</TD><TD id='border'>";
		if($donnees['trancheAge'] == 'moins15'){echo "moins de 15 ans";}
		if($donnees['trancheAge'] == 'medium15-25'){echo "15 - 25 ans";}
		if($donnees['trancheAge'] == 'medium25-40'){echo "25 - 40 ans";}
		if($donnees['trancheAge'] == 'plus40'){echo "plus de 40 ans";}
		echo "</TD><TD id='border'>";
		echo $donnees['taille']." cm";
		echo "</TD><TD id='border'>";
		echo $donnees['couleurCheveux'];
		echo "</TD><TD id='border'>";
		echo $donnees['couleurYeux'];
		echo "</TD><TD id='border'>";
		echo $donnees['typeRefugie'];
		echo "</TD><TD id='border'>";
		if($req->rowCount() > 0){
			$camp = $req->fetch();
			echo $camp['localisation']." - ".$camp['nom'];	
			$trans = true;
		}
		else{
			echo "Sorti";
			$trans = false;
		}
		echo "</TD><TD id='border'>";
		if($trans)
			echo "<a href=formTransfertPers.php?idPers=".$donnees['id_pers']."><img src='images/transfert.png'></img></a></center>";
		
		echo "</TD></TR>";
	}
	echo "</table>";
}
echo "</div>";
$reponse->closeCursor();

?>