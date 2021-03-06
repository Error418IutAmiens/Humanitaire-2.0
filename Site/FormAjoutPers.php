<html>
<div id="content">
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

	if(isset($_GET['ret'])){
		if($_GET['ret'] == 'OK'){
			echo "<CENTER>La personne a été ajoutée</CENTER>";
		}
		else{
			echo "<CENTER>Renseignements non valides, la personne n'a pas été ajoutée</CENTER>";
		}
	}
	
?>
<head>
	<title>HUMAN 2.0 : Ajout de persone</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="FormAjoutPers.css" />
</head>

<body>
	<div>
		<h2>Ajout d'une personne</h2>
	</div>

	<div>

			<BR><form method="post" action="traitement.php">

				<fieldset>
					<legend><h3>Information civiles</h3></legend>

				<p>
        			<label>Prenom</label> : <br><input type="text" name="prenom" placeholder="Prenom" />
    			</p>	
					
				<p>
					<label>Nom</label> : <br><input type="text" name="nom" placeholder="Nom" />
    			</p>

    			<p>
				     <BR><label>Sexe</label>:<br>
				     <input type="radio" name="sexe" checked="checked" value="H" id="H" /> <label for="H">Homme</label><br />
				     <input type="radio" name="sexe" value="F" id="F" /> <label for="F">Femme</label><br />
			    </p>

			    <BR><p>
				    Age <br />
				    <input type="radio" name="age" value="moins15" checked="checked" id="moins15" /> <label for="moins15">Moins de 15 ans</label><br />
				    <input type="radio" name="age" value="medium15-25" id="medium15-25" /> <label for="medium15-25">15-25 ans</label><br />
				    <input type="radio" name="age" value="medium25-40" id="medium25-40" /> <label for="medium25-40">25-40 ans</label><br />
				    <input type="radio" name="age" value="plus40" id="plus40" /> <label for="plus40">Plus de 40 ans</label>
   				</p>

				</fieldset>

				<BR>
				<fieldset>
					<legend>Informations physiques</legend>

					<p>
	   					Taille en cm :<br/>
	   					<input type="number" name="taille" min="50" max="300" step="1" />
   					</p>

	   				<BR><p>
	        			<label>Courte desctiption</label> : <br><textarea name="description" placeholder="Inserez une courte description de la personne"rows="10" cols="50"></textarea>
	    			</p>

	    			<BR><p>
	   					Couleur des cheveux :<br>
	   					<select name="cheveux">
	   							<option value="bruns">Bruns</option>
	   							<option value="blonds">Blonds</option>
	   							<option value="roux">Roux</option>
	   							<option value="chatains">Chatains</option>
	   							<option value="grix">Grix</option>
	   							<option value="chauve">Chauve</option>
	   					</select>
	   				</p>

	   				<BR><p>
	   					Couleur des yeux :<br>
	   					<select name="yeux">
	   							<option value="marrons">Marrons</option>
	   							<option value="bleus">Bleus</option>
	   							<option value="verts">Verts</option>
	   					</select>
	   				</p>


				</fieldset>
				
				<BR>
   				<fieldset>
   					<legend>Informations d'accueil</legend>

   					<p>
				     <label>Etat</label>:<br>
				     <input type="radio" name="etat" checked="checked" value="conscient" id="conscient" /> <label for="conscient">Conscient</label><br />
				     <input type="radio" name="etat" value="inconscient" id="inconscient" /> <label for="inconscient">Inconscient</label><br />
			    </p>

				<BR><p>
   					Type de réfugié :<br>
   					<select name="typeref">
   							<option value="politique">Politique</option>
   							<option value="guerre">Guerre</option>
   							<option value="catastrophe">Catastrophe naturelle</option>
   							<option value="famine">Famine</option>
   					</select>
   				</p>
				
   				<BR><p>
   					Pays de provenance <br>
					<select name="pays"> 
						<option value="France" selected="selected">France </option>
						<option value="Afghanistan">Afghanistan </option>
						<option value="Afrique_Centrale">Afrique_Centrale </option>
						<option value="Afrique_du_sud">Afrique_du_Sud </option> 
						<option value="Albanie">Albanie </option>
						<option value="Algerie">Algerie </option>
						<option value="Allemagne">Allemagne </option>
						<option value="Andorre">Andorre </option>
						<option value="Angola">Angola </option>
						<option value="Anguilla">Anguilla </option>
						<option value="Arabie_Saoudite">Arabie_Saoudite </option>
						<option value="Argentine">Argentine </option>
						<option value="Armenie">Armenie </option> 
						<option value="Australie">Australie </option>
						<option value="Autriche">Autriche </option>
						<option value="Azerbaidjan">Azerbaidjan </option>
						<option value="Bahamas">Bahamas </option>
						<option value="Bangladesh">Bangladesh </option>
						<option value="Barbade">Barbade </option>
						<option value="Bahrein">Bahrein </option>
						<option value="Belgique">Belgique </option>
						<option value="Belize">Belize </option>
						<option value="Benin">Benin </option>
						<option value="Bermudes">Bermudes </option>
						<option value="Bielorussie">Bielorussie </option>
						<option value="Bolivie">Bolivie </option>
						<option value="Botswana">Botswana </option>
						<option value="Bhoutan">Bhoutan </option>
						<option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
						<option value="Bresil">Bresil </option>
						<option value="Brunei">Brunei </option>
						<option value="Bulgarie">Bulgarie </option>
						<option value="Burkina_Faso">Burkina_Faso </option>
						<option value="Burundi">Burundi </option>
						<option value="Caiman">Caiman </option>
						<option value="Cambodge">Cambodge </option>
						<option value="Cameroun">Cameroun </option>
						<option value="Canada">Canada </option>
						<option value="Canaries">Canaries </option>
						<option value="Cap_vert">Cap_Vert </option>
						<option value="Chili">Chili </option>
						<option value="Chine">Chine </option> 
						<option value="Chypre">Chypre </option> 
						<option value="Colombie">Colombie </option>
						<option value="Comores">Colombie </option>
						<option value="Congo">Congo </option>
						<option value="Congo_democratique">Congo_democratique </option>
						<option value="Cook">Cook </option>
						<option value="Coree_du_Nord">Coree_du_Nord </option>
						<option value="Coree_du_Sud">Coree_du_Sud </option>
						<option value="Costa_Rica">Costa_Rica </option>
						<option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
						<option value="Croatie">Croatie </option>
						<option value="Cuba">Cuba </option>
						<option value="Danemark">Danemark </option>
						<option value="Djibouti">Djibouti </option>
						<option value="Dominique">Dominique </option>
						<option value="Egypte">Egypte </option> 
						<option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
						<option value="Equateur">Equateur </option>
						<option value="Erythree">Erythree </option>
						<option value="Espagne">Espagne </option>
						<option value="Estonie">Estonie </option>
						<option value="Etats_Unis">Etats_Unis </option>
						<option value="Ethiopie">Ethiopie </option>
						<option value="Falkland">Falkland </option>
						<option value="Feroe">Feroe </option>
						<option value="Fidji">Fidji </option>
						<option value="Finlande">Finlande </option>
						<option value="France">France </option>
						<option value="Gabon">Gabon </option>
						<option value="Gambie">Gambie </option>
						<option value="Georgie">Georgie </option>
						<option value="Ghana">Ghana </option>
						<option value="Gibraltar">Gibraltar </option>
						<option value="Grece">Grece </option>
						<option value="Grenade">Grenade </option>
						<option value="Groenland">Groenland </option>
						<option value="Guadeloupe">Guadeloupe </option>
						<option value="Guam">Guam </option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guernesey">Guernesey </option>
						<option value="Guinee">Guinee </option>
						<option value="Guinee_Bissau">Guinee_Bissau </option>
						<option value="Guinee equatoriale">Guinee_Equatoriale </option>
						<option value="Guyana">Guyana </option>
						<option value="Guyane_Francaise ">Guyane_Francaise </option>
						<option value="Haiti">Haiti </option>
						<option value="Hawaii">Hawaii </option> 
						<option value="Honduras">Honduras </option>
						<option value="Hong_Kong">Hong_Kong </option>
						<option value="Hongrie">Hongrie </option>
						<option value="Inde">Inde </option>
						<option value="Indonesie">Indonesie </option>
						<option value="Iran">Iran </option>
						<option value="Iraq">Iraq </option>
						<option value="Irlande">Irlande </option>
						<option value="Islande">Islande </option>
						<option value="Israel">Israel </option>
						<option value="Italie">italie </option>
						<option value="Jamaique">Jamaique </option>
						<option value="Jan Mayen">Jan Mayen </option>
						<option value="Japon">Japon </option>
						<option value="Jersey">Jersey </option>
						<option value="Jordanie">Jordanie </option>
						<option value="Kazakhstan">Kazakhstan </option>
						<option value="Kenya">Kenya </option>
						<option value="Kirghizstan">Kirghizistan </option>
						<option value="Kiribati">Kiribati </option>
						<option value="Koweit">Koweit </option>
						<option value="Laos">Laos </option>
						<option value="Lesotho">Lesotho </option>
						<option value="Lettonie">Lettonie </option>
						<option value="Liban">Liban </option>
						<option value="Liberia">Liberia </option>
						<option value="Liechtenstein">Liechtenstein </option>
						<option value="Lituanie">Lituanie </option> 
						<option value="Luxembourg">Luxembourg </option>
						<option value="Lybie">Lybie </option>
						<option value="Macao">Macao </option>
						<option value="Macedoine">Macedoine </option>
						<option value="Madagascar">Madagascar </option>
						<option value="Madère">Madère </option>
						<option value="Malaisie">Malaisie </option>
						<option value="Malawi">Malawi </option>
						<option value="Maldives">Maldives </option>
						<option value="Mali">Mali </option>
						<option value="Malte">Malte </option>
						<option value="Man">Man </option>
						<option value="Mariannes du Nord">Mariannes du Nord </option>
						<option value="Maroc">Maroc </option>
						<option value="Marshall">Marshall </option>
						<option value="Martinique">Martinique </option>
						<option value="Maurice">Maurice </option>
						<option value="Mauritanie">Mauritanie </option>
						<option value="Mayotte">Mayotte </option>
						<option value="Mexique">Mexique </option>
						<option value="Micronesie">Micronesie </option>
						<option value="Midway">Midway </option>
						<option value="Moldavie">Moldavie </option>
						<option value="Monaco">Monaco </option>
						<option value="Mongolie">Mongolie </option>
						<option value="Montserrat">Montserrat </option>
						<option value="Mozambique">Mozambique </option>
						<option value="Namibie">Namibie </option>
						<option value="Nauru">Nauru </option>
						<option value="Nepal">Nepal </option>
						<option value="Nicaragua">Nicaragua </option>
						<option value="Niger">Niger </option>
						<option value="Nigeria">Nigeria </option>
						<option value="Niue">Niue </option>
						<option value="Norfolk">Norfolk </option>
						<option value="Norvege">Norvege </option>
						<option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
						<option value="Nouvelle_Zelande">Nouvelle_Zelande </option>
						<option value="Oman">Oman </option>
						<option value="Ouganda">Ouganda </option>
						<option value="Ouzbekistan">Ouzbekistan </option>
						<option value="Pakistan">Pakistan </option>
						<option value="Palau">Palau </option>
						<option value="Palestine">Palestine </option>
						<option value="Panama">Panama </option>
						<option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
						<option value="Paraguay">Paraguay </option>
						<option value="Pays_Bas">Pays_Bas </option>
						<option value="Perou">Perou </option>
						<option value="Philippines">Philippines </option> 
						<option value="Pologne">Pologne </option>
						<option value="Polynesie">Polynesie </option>
						<option value="Porto_Rico">Porto_Rico </option>
						<option value="Portugal">Portugal </option>
						<option value="Qatar">Qatar </option>
						<option value="Republique_Dominicaine">Republique_Dominicaine </option>
						<option value="Republique_Tcheque">Republique_Tcheque </option>
						<option value="Reunion">Reunion </option>
						<option value="Roumanie">Roumanie </option>
						<option value="Royaume_Uni">Royaume_Uni </option>
						<option value="Russie">Russie </option>
						<option value="Rwanda">Rwanda </option>
						<option value="Sahara Occidental">Sahara Occidental </option>
						<option value="Sainte_Lucie">Sainte_Lucie </option>
						<option value="Saint_Marin">Saint_Marin </option>
						<option value="Salomon">Salomon </option>
						<option value="Salvador">Salvador </option>
						<option value="Samoa_Occidentales">Samoa_Occidentales</option>
						<option value="Samoa_Americaine">Samoa_Americaine </option>
						<option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option> 
						<option value="Senegal">Senegal </option> 
						<option value="Seychelles">Seychelles </option>
						<option value="Sierra Leone">Sierra Leone </option>
						<option value="Singapour">Singapour </option>
						<option value="Slovaquie">Slovaquie </option>
						<option value="Slovenie">Slovenie</option>
						<option value="Somalie">Somalie </option>
						<option value="Soudan">Soudan </option> 
						<option value="Sri_Lanka">Sri_Lanka </option> 
						<option value="Suede">Suede </option>
						<option value="Suisse">Suisse </option>
						<option value="Surinam">Surinam </option>
						<option value="Swaziland">Swaziland </option>
						<option value="Syrie">Syrie </option>
						<option value="Tadjikistan">Tadjikistan </option>
						<option value="Taiwan">Taiwan </option>
						<option value="Tonga">Tonga </option>
						<option value="Tanzanie">Tanzanie </option>
						<option value="Tchad">Tchad </option>
						<option value="Thailande">Thailande </option>
						<option value="Tibet">Tibet </option>
						<option value="Timor_Oriental">Timor_Oriental </option>
						<option value="Togo">Togo </option> 
						<option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
						<option value="Tristan da cunha">Tristan de cuncha </option>
						<option value="Tunisie">Tunisie </option>
						<option value="Turkmenistan">Turmenistan </option> 
						<option value="Turquie">Turquie </option>
						<option value="Ukraine">Ukraine </option>
						<option value="Uruguay">Uruguay </option>
						<option value="Vanuatu">Vanuatu </option>
						<option value="Vatican">Vatican </option>
						<option value="Venezuela">Venezuela </option>
						<option value="Vierges_Americaines">Vierges_Americaines </option>
						<option value="Vierges_Britanniques">Vierges_Britanniques </option>
						<option value="Vietnam">Vietnam </option>
						<option value="Wake">Wake </option>
						<option value="Wallis et Futuma">Wallis et Futuma </option>
						<option value="Yemen">Yemen </option>
						<option value="Yougoslavie">Yougoslavie </option>
						<option value="Zambie">Zambie </option>
						<option value="Zimbabwe">Zimbabwe </option>
					</select>

   				</p>

   				

   				<BR><p>
   					Camp de réfugié :<br>
   					<select name="camp">
					
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

   				<br>
   				<input type="submit" value="Ajouter" />
   				<br><br>

			</form>

	</div>
</div>
</body>


</html>