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

	$et = false; 
	$req="SELECT * FROM camp WHERE";

	if(!empty($_POST['nom_camp']))
	{
		$req .=" camp.nomCamp = '".$_POST['nom_camp']."'";
		$et=true;
	}

	if(!empty($_POST['pays_camp']))
	{
		if($et)
		{
			$req .= " and ";

		}

		$req .=" camp.localisation = '".$_POST['pays_camp']."'";
		$et=true;
	}

	if(!empty($_POST['nb_places']))
	{
		if($et)
		{
			$req .= " and ";

		}

		$req .= " camp.nbPlaces = ".$_POST['nb_places'];
		$et=true;
	}

	if(!empty($_POST['nb_medecin']))
	{
		if($et)
		{
			$req .= " and ";

		}

		$req = $req . " camp.nbMedecins = ".$_POST['nb_medecin'];
	}
	else{
		if(!$et){
			$req = "Select * from camp";
		}
	}

$reponse = $db->query($req." order by localisation");
$flag=false;
include('sidebar.php');
?>
	<div id=content>
	<table width=100%>
	<TR><TH id='titleBorder'><B>Localisation</B></TH>
	<TH id='titleBorder'><B>Nom</B></TH>
	<TH id='titleBorder'><B>Capacité</B></TH>
	<TH id='titleBorder'><B>Médecins</B></TH>
	<TH id='titleBorder'><B>Stock</B></TH></TR>
	
<?PHP
while ($donnees = $reponse->fetch()){
?>	
	<TR>
		<?php $flag = true; ?>
		<TD id='border'><?php echo $donnees['localisation']; ?></TD>
		<TD id='border'><?php echo $donnees['nom']; ?></TD>		
		<TD id='border'><?php echo $donnees['nbPlaces']; ?></TD>
		<TD id='border'><?php echo $donnees['nbMedecins']; ?></TD>
		<TD id='border'></TD>
	</TR>
		
<?php
}

if(!$flag){ echo"Aucun camp ne correspond à votre recherche";}

$reponse->closeCursor();
echo "</div>";
?>