<!DOCTYPE HTML>

<HTML>
	<head>
		<title>Humanitaire 2.0</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="CSS/main.css">
	</head>

<body>
	
	<?php
		$URL=$_GET['dest'];
		include("sidebar.php");

		if($URL=="FP")
			include("formulairepersonne.php");

		if($URL=="FC")
			include("formulairecamps.php");

		if($URL=="FTP")
			include("formTransfertPers.php");

		if($URL=="FAC")
			include("formAjoutCamp.php");

		if($URL=="FAP")
			include("formAjoutPers.php");

		if($URL=="formAppro")
			include("formApprovisionnement.php");

	?>



</body>





</HTML>