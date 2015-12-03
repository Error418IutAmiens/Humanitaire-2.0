
=============================================================================================================================
PERSONNE
=============================================================================================================================

$db = new PDO('mysql:host=localhost;port=3306;dbname=humanitaire','root','');

if(!empty $_POST[])
{
	$et ; 
	$req="Select * from personne where";

	if(!empty($_POST['nom']))
	{
		$requete = $requete . "personne.nom = ".$_POST['nom'];
		$et=true;
	}

	if(!empty($_POST['prenom']))
	{
		if($et)
		{
			$requete += "and";

		}

			$requete = $requete . "personne.prenom = ".$_POST['prenom'];
			$et=true;
	}

	if(!empty($_POST['pays']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "personne.nationalite = ".$_POST['pays'];
		$et=true;
	}

	if(!empty($_POST['etat']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "personne.etatConscience = ".$_POST['etat'];
		$et=true;
	}

	if(!empty($_POST['age']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "personne.trancheAge = ".$_POST['age'];
		$et=true;
	}

	if(!empty($_POST['cheveux']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "personne.couleurCheveux = ".$_POST['cheveux'];
		$et=true;
	}

	if(!empty($_POST['yeux']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "personne.couleurYeux = ".$_POST['yeux'];
		$et=true;
	}

	if(!empty($_POST['zonecamp']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "personne.zoneGeographique = ".$_POST['zonecamp'];
		$et=true;
	}

	if(!empty($_POST['typeref']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "personne.typeRefugie = ".$_POST['typeref'];
		$et=true;
	}
}
	$et=false;

	$statement = $db->query($requete);
	while($data = $requete->fetch())
	{
		echo $data->nom.'<BR>'.$data->prenom.'<BR>'.$data->nationalite.'<BR>'.$data->etatConscience.'<BR>'.$data->trancheAge.'<BR>'.$data->couleurCheveux.'<BR>'.$data->couleurYeux.'<BR>'.$data->zoneGeographique.'<BR>'.$data->typeRefugiee;
	}
	
=============================================================================================================================
CAMP
=============================================================================================================================
if(!empty $_POST[])
{
	$et ; 
	$requete="Select * from camp where";

	if(!empty($_POST['nom_camp']))
	{
		$requete = $requete . "camp.nomCamp = ".$_POST['nom_camp'];
		$et=true;
	}

	if(!empty($_POST['pays_camp']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "camp.localisation = ".$_POST['pays_camp'];
		$et=true;
	}

	if(!empty($_POST['longitude'])&&(!empty($_POST['latitude']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "camp.coordonneesGeo = ".$_POST['longitude'].$_POST['latitude'];
		$et=true;
	}

	if(!empty($_POST['nb_places']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "camp.nbPlaces = ".$_POST['nb_places'];
		$et=true;
	}

	if(!empty($_POST['nb_medecin']))
	{
		if($et)
		{
			$requete += "and";

		}

		$requete = $requete . "camp.nbMedecins = ".$_POST['nb_medecin'];
		$et=true;
	}

	$et=false;

	$statement = $db->query($requete);
	while($data = $requete->fetch())
	{
		echo $data->nomCamp.'<BR>'.$data->localisation.'<BR>'.$data->coordonneGeo.'<BR>'.$data->nbPlaces.'<BR>'.$data->nbMedecins;
	}
}
