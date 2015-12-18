<html>

<?PHP

	try {
		$strConnection = 'mysql:host=localhost;port=3306;dbname=humanitaire'; //Ligne 1
		$arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); //Ligne 2
		$db = new PDO($strConnection, 'root', '', $arrExtraParam); //Ligne 3; Instancie la connexion
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Ligne 4
	}
	catch(PDOException $e) {
		$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
		die($msg);
	}						

		?>
		
	<head>
	<title>HUMAN 2.0 : Approvisionnement</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="FormAjoutPers.css" />
	</head>
		
	<body>
	<div id="content">

	<div>
	<?php
		if(isset($_GET['ret'])){
			if($_GET['ret'] == 'OK'){
				echo "<font color='00AA00'>Approvisionnement enregistré !</font><BR><BR>";
			}
			else{
				echo "<font color='AA0000'>Erreur lors de l'enregistrement</font><BR><BR>";
			}		
		}
	?>
	<div>
		<h2>Approvisionnement d'un camp</h2>
	</div>
	<form method="post" action="traitement.php">
		<BR><fieldset>
			<legend><h3>Camp destinataire</h3></legend>
				<select name="campDestinataire">					
				<?PHP							

				echo "<optgroup label='Europe'>";
				$request = "Select * from camp where localisation like 'Europe%' order by localisation;";
				$res = $db->query($request);
				$res->setFetchMode(PDO::FETCH_OBJ);							
				while($data = $res->fetch())
				{
					echo "<option value='".$data->id_camp."'>".$data->localisation." - ".$data->nom."</option>";
				
				}	
				echo "</optgroup>";
				
				echo "<optgroup label='Afrique'>";
				$request = "Select * from camp where localisation like 'Afrique%' order by localisation;";
				$res = $db->query($request);
				$res->setFetchMode(PDO::FETCH_OBJ);							
				while($data = $res->fetch())
				{
					echo "<option value='".$data->id_camp."'>".$data->localisation." - ".$data->nom."</option>";
				
				}	
				echo "</optgroup>";
				
				echo "<optgroup label='Asie'>";
				$request = "Select * from camp where localisation like 'Asie%' order by localisation;";
				$res = $db->query($request);
				$res->setFetchMode(PDO::FETCH_OBJ);							
				while($data = $res->fetch())
				{
					echo "<option value='".$data->id_camp."'>".$data->localisation." - ".$data->nom."</option>";
				
				}	
				echo "</optgroup>";
				
				echo "<optgroup label='Amerique'>";
				$request = "Select * from camp where localisation like 'Amerique%' order by localisation;";
				$res = $db->query($request);
				$res->setFetchMode(PDO::FETCH_OBJ);							
				while($data = $res->fetch())
				{
					echo "<option value='".$data->id_camp."'>".$data->localisation." - ".$data->nom."</option>";
				
				}	
				echo "</optgroup>";
				
				?> 													  							  								
   							
				</select>
			</p>
		</fieldset>
		<BR><fieldset>
			<legend><h3>Cargaison</h3></legend>	
			
				<table><TR><TD width=300>
				Matériel : <BR>
				<select name="materiel">
				<option selected="selected" value='0'>Aucun</option>
				<?PHP
				$request = "Select * from materielmedical order by nomMateriel;";
				$res = $db->query($request);
				$res->setFetchMode(PDO::FETCH_OBJ);							
				while($data = $res->fetch())
				{
					echo "<option value='".$data->id_materiel_medical."'>".$data->nomMateriel."</option>";								
				}
				?>
				</select>
				</TD><TD>
				Quantité : <BR>
				<input type="number" name="nbMateriel">
				</TD></TR></table>
				
				<BR>
				
				<table><TR><TD width=300>
				Médicament : <BR>
				<select name="medicament">
				<option selected="selected" value='0'>Aucun</option>		
				<?PHP
				$request = "Select * from medicaments order by nomMedicament;";
				$res = $db->query($request);
				$res->setFetchMode(PDO::FETCH_OBJ);							
				while($data = $res->fetch())
				{
					echo "<option value='".$data->id_medicament."'>".$data->nomMedicament."</option>";		
				}
				?>
				</TD><TD>
				Quantité : <BR>
				<input type="number" name="nbMedicament">
				</TD></TR></table>
				
		</fieldset>
			<p>
			
			<BR><input type="submit" value="Valider">
			</p>
		
		</form>
		</div>
