<!-- Content -->

<div id="content">
	<?PHP
	setlocale(LC_TIME,'fr_FR.utf-8','fra');
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

	if(isset($_GET['action']) and isset($_GET['ret'])){
		if($_GET['action'] == 'addPers'){
			switch($_GET['ret']){
				case "OK":
					echo "<font color='00AA00'>Personne ajoutée !</font>";
					break;			
			}			
		}
		elseif($_GET['action'] == 'addCamp'){
			switch($_GET['ret']){
				case "OK":
					echo "<font color='00AA00'>Camp ajoutée !</font>";
					break;
				case "KO":
					echo "<font color='AA0000'>Informations non valides !</font>";
					break;		
			}		
		}
		elseif($_GET['action'] == 'transfert'){
			switch($_GET['ret']){
				case "OK":
					echo "<font color='00AA00'>Personne transférée !</font>";
					break;			
			}		
		}
	}
	$req = $db->query("Select count(*) from personne");
	$nbPers = $req->fetch();
	$req = $db->query("Select count(*) from camp");
	$nbCamp = $req->fetch();
	?>
	<div class="inner">		
		<!-- Post -->
		<article class="box post post-excerpt">
			<header>					
				<h2>Site Humanitaire 2.0</h2>
				<p>Site de recherche réfugiés </p>
			</header>			
			<div class="info">	
				<span class="date">
					<span class="month"><?PHP echo utf8_encode(strftime('%A'));?></span>
					<span class="day"><?PHP echo utf8_encode(strftime('%d'));?></span>
					<span class="month"><?PHP echo utf8_encode(strftime('%B'));?></span>
					<span class="year"><?PHP echo utf8_encode(strftime('%G'));?></span>
				</span>

				<ul class="stats">
					<table><TR><TD><img src="images/bonhomme.png" alt=""   class="icone" /></TD><TD><?PHP echo $nbPers[0];?></TD></TR>
					<TR><TD><img src="images/place.png" alt=""      class="icone" /></TD><TD><?PHP echo $nbCamp[0];?></TD></TR>
					<TR><TD><img src="images/food.png" alt=""        class="icone"/></TD><TD>  </TD></TR>
					<TR><TD><img src="images/medicament.png" alt="" class="icone" /></TD><TD>  </TD></TR>
					</table>
					
					

				</ul>
			</div>
			<a href="#" ><img src="images/pic01.jpg" alt="" class="image" /></a>
			<p>
				<strong>Aide Humanitaire </strong> 
				L'aide humanitaire peut prendre diverses formes: don d'argent, envoi de marchandises et équipements de première nécessité, envoi de personnel faisant des interventions sur place, renforcement des acteurs locaux. Cette aide peut provenir de diverses sources : </br>

				Les associations (laïques ou confessionnelles, voire idéologiques) et les ONG humanitaires (dites aussi caritatives). </br> 
				Elles sont financées soit sur fonds propres (cotisations des membres, dons, opérations diverses…), soit par des subventions des municipalités, des gouvernements, des organisations internationales ou tout autre organisme qui souhaite soutenir l'action de ces ONG ou lui confier certaines tâches. Les ONG fonctionnent le plus souvent avec du personnel bénévole, mais elles peuvent employer du personnel rétribué. 
				</br> Dans le cas d'ONG internationales, dont les missions se déroulent à l'étranger, les expatriés sont presque tous rétribués. S'ils doivent mettre en œuvre un programme financé par une institution internationale, comme l'Union européenne ou l'une des agences de l'ONU, leur rétribution est prise en charge par ces organismes. 
				</br>Ce personnel humanitaire, qu'il soit expatrié ou bien du pays d'intervention, est de plus en plus pris pour cible et chaque année, des incidents sont à déplorer. Ceci est en partie expliqué par ce que l'on appelle "la réduction de l'espace humanitaire". </br>
				Les États et autres collectivités publiques
				Les Organisations Internationales publiques, notamment celles dépendant de l'ONU, le Bureau de la coordination des affaires humanitaires, et de l'Union européenne, etc. La Déclaration et programme d'action de Vienne affirme que "conformément à la Charte des Nations Unies et aux principes du droit international humanitaire, on souligne combien il est important et nécessaire de fournir une assistance humanitaire aux victimes de toutes les catastrophes, naturelles ou causées par l'homme2.
				Les entreprises (attention cependant au "volontourisme" qui est une reprise du mot "humanitaire" par des agences de voyages lucratives)
				<br/>
				<br/>
				<br/>
				<br/>
			</p>
			
			<a href="#" ><img src="images/pic02.jpg" alt="Photo du camp syrien" class="image" /></a>
							<br/>
				<br/>
	

	</div>
</div>
