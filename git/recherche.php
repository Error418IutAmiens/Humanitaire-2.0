
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
...
