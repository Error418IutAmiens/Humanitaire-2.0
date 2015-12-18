<div id="content">
	<article>
	
	<div class = "formulaire">
	<h2>Formulaire de recherche d'un camp</h2>
	<p> Veuillez donner les cacteristiques du camps recherché : </p>

	
	
<!--	label       // pour le CSS
{
	display: block;
	width: 300px;
	float: left;
} -->
		<form id="monform" method="post" action="ResRechercheCamp.php">
		
		   <label for="nom_camp"><BR>Nom du camp : <BR></label><input type="text" name="nom_camp" /><BR><BR>
		   

		  
			   <label for="pays">Localisation :</label>
			  <p>
					<select name="pays_camp">
								<option selected value=''></option>
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
		 		  <BR>
			   
		   
		   <label for="nb_places" >Nombre de places : <BR></label><input type="number" name="nb_places" /> <BR>
		   <label for="nb_medecin">Nombres de medecins : <BR></label><input type="number" name="nb_medecin" /> <BR><BR>
		   
		   <input type="submit" value="Rechercher" />
	   
		   
		</form>
	</div>
	
	</article>
</div>