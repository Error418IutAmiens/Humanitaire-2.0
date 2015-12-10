<?php

try {
    $strConnection = 'mysql:host=localhost;port=3306;dbname=humanitaire';
    $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $db = new PDO($strConnection, 'root', '', $arrExtraParam);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}

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
	if(isset($_POST['taille'])){
		$req = $req.",taille";
		$values = $values.','.$_POST['taille'];
	}
	if(isset($_POST['description'])){
		$req = $req.",descriptif";
		$values = $values.",'".$_POST['description']."'";
	}
	
	
	//debug
		$values = $values.");";
		$req = $req.") ".$values;
		echo $req;
	//
}

?>