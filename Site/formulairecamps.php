
	<article>
	
	<div class = "formulaire">
	<h2>Formulaire de recherche d'un camp</h2>
	<p> Veuillez donner les cacteristiques du camps : </p>

	
	
<!--	label       // pour le CSS
{
	display: block;
	width: 300px;
	float: left;
} -->
		<form id="monform" method="post" action="recherche.php">
		
		   <label for="nom_camp">Nom du camp : </label><input type="text" name="nom_camp" /><br /><br /><br />
		   

		  
			   <label for="pays">Pays</label>
			   <select name="pays_camp" id="pays">
				   <optgroup label="Europe">
					   <option value="france">France</option>
					   <option value="espagne">Espagne</option>
					   <option value="italie">Italie</option>
					   <option value="royaume-uni">Royaume-Uni</option>
				   </optgroup>
				   <optgroup label="Amérique">
					   <option value="canada">Canada</option>
					   <option value="etats-unis">Etats-Unis</option>
				   </optgroup>
				   <optgroup label="Asie">
					   <option value="chine">Chine</option>
					   <option value="japon">Japon</option>
				   </optgroup>
			   </select>
		 		  </br><br /><br /> 
			   
		   <label for="coordonnee_camp">coordonnées geographiques : latitude</label><input type="text" name="latitude_camp" /> longitude :  <input type="text" name="longitude_camp" /> </br><br /><br />
		   <label for="nb_places" >Nombre de places disponibles : </label><input type="text" name="nb_places" /> </br><br /><br />
		   <label for="nb_medecin">Nombres de medecins : </label><input type="text" name="nb_medecin" /> </br><br /><br />
		   
		   <input type="submit" value="Valider" />
	   
		   
		</form>
	</div>
	
	</article>