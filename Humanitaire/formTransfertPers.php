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

	if(isset($_GET['idPers'])){
		?>
		
	<head>
		<title>Humanitaire 2.0</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="CSS/main.css">
		</head>
	
	<body>
	<?PHP include('sidebar.php'); ?>
	<div id='content'>
	<div>
		<h2>Transfert d'une personne</h2>
	</div>

	<div>
	
	<BR><form method="post" action="traitement.php">
		<fieldset>
			<legend><h3>Destination</h3></legend>
				<input type="hidden" name="idPers" value="<?php echo $_GET['idPers']?>">
				<select name="destination">	
				<optgroup label='Sortie'>
				<option value="sortie">Sortie du camp</option>
				</optgroup>
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
			<p>
			<BR><input type="submit" value="Valider">
			</p>
		</fieldset>
		<?PHP		
	}
	else{
		header('Location: index.php'); 
	}
	
?>

