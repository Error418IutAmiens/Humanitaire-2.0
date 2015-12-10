<!DOCTYPE html>
<html>
    <head>
		<title>human2.0</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="test.css" />
    </head>

	<body>
	<h2> recup des données recherche personne </h2>
	<?php
		if(!empty($_POST['nom'])){
			print ("nom saisi: ${_POST['nom']}")};
		if(!empty($_POST['prenom'])){
			print ("prenom saisi : ${_POST['prenom']}")};
		if(!empty($_POST['pays'])){	
			print ("nationnalité : ${_POST['pays']}")};
		if(!empty($_POST['etat'])){
			print ("Son etat est : ${_POST['etat']}")};
		if(!empty($_POST['age'])){
			print ("Son Âge : ${_POST['age']}")};
		if(!empty($_POST['cheveux'])){
			print ("Sa couleur des cheveux : ${_POST['cheveux']}")};
		if(!empty($_POST['yeux'])){
			print ("Sa couleur des yeux: ${_POST['yeux']}")};
		if(!empty($_POST['zonecamp'])){
			print ("Son camp se situe: ${_POST['zonecamp']}")};
		if(!empty($_POST['typeref'])){
			print ("C'est un refugié de type ${_POST['typeref']}")if(!empty($_POST['nom_du_champ'])){;	
	?>
	<h2> recup des données recherche camp</h2>
		<?php
		if(!empty($_POST['nom_camp'])){
			print ("nom du camp saisi: ${_POST['nom_camp']}")};
		if(!empty($_POST['pays_camp'])){
			print ("Pays du camp saisi : ${_POST['pays_camp']}")};
		if(!empty($_POST['longitude'])&& (!empty($_POST['latitude'])){
			print ("Ses coordonnées géographiques sont: ${_POST['latitude']} ${_POST['longitude']} ")};
		if(!empty($_POST['nb_places'])){
			print ("Nombre de places restantes : ${_POST['nb_places']}")};
		if(!empty($_POST['nb_medecin'])){
			print ("Nombre de medecins sur place : ${_POST['nb_medecin']}")};
	
	?>
	
	
	
	
	
	</body>


</html>