<html>

<?PHP
if(isset($_GET['ret'])){
		if($_GET['ret'] == 'OK'){
			echo "<CENTER>Le camp a été ajoutée</CENTER>";
		}
		else{
			echo "<CENTER>Renseignements non valides, le camp n'a pas été ajoutée</CENTER>";
		}
	}
?>
<head>
	<title>HUMAN 2.0 : Ajout de camp</title> 
	<meta charset="utf-8" />
	<link rel="stylesheet" href="FormAjoutPers.css" />
</head>

<body>
<div id="content">
	<div>
		<h2>Ajout d'un camp</h2>
	</div>
	<BR>
	<div>

			<form method="post" action="traitement.php">

				<fieldset>
					<legend><h3>Informations</h3></legend>

					<p>
        			<label>Nom</label> : <br><input type="text" name="nomDuCamp" placeholder="Nom" />
    			</p>

				<p>
	   					<BR>Places :<br/>
	   					<input type="number" name="nbPlaces" min="10" step="1" />
   				</p>
				
				<p>
	   					<BR>Nombre de médecins :<br/>
	   					<input type="number" name="nbMedecins" min="1" step="1" />
   				</p>

				</fieldset>
				<BR>
				<fieldset>
					<legend><h3>Informations géographiques</h3></legend>
					
					<p>
					Localisation : <BR>
					<select name="localisationCamp">
	   							<option value="Europe Nord">Europe du nord</option>
	   							<option value="Europe Sud">Europe du sud</option>
	   							<option value="Europe Est">Europe de l'est</option>
	   							<option value="Europe Ouest">Europe de l'ouest</option>
	   							<option value="Afrique Nord">Afrique du nord</option>
								<option value="Afrique Sud">Afrique du sud</option>
								<option value="Afrique Est">Afrique de l'est</option>
								<option value="Afrique Ouest">Afrique de l'ouest</option>
	   							<option value="Asie Nord">Asie du nord</option>
								<option value="Asie Sud">Asie du sud</option>
								<option value="Asie Est">Asie de l'est</option>
								<option value="Asie Ouest">Asie de l'ouest</option>
								<option value="Amérique Nord">Amérique du nord</option>
								<option value="Amérique Sud">Amérique du sud</option>
								<option value="Amérique Centre">Amérique centrale</option>							
	   					</select>
					</p>
					
					<p>
					<BR><label>Coordonnées géographiques</label> : <br><input type="text" name="coordonnees" placeholder="facultatif"/>
					</p>

					</fieldset>

   				<br>
   				<input type="submit" value="Ajouter" />
   				<br><br>

			</form>
		</div>
	</div>
	
</body>


</html>