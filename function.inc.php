<?php
/* Function		:	afficher_caract
** Input		:	STRING $nom, STRING $nom_bdd, INT $niveau
** OUTPUT		:	Aucun
** Description	:	Affiche les caractéristiques d'un monstre d'un certain niveau en se référant à la base de donnée uoanalyse.
** Creator		: 	Ewakhine Do'varden
** Date 		: 	27 / 10 / 2014 */

function afficher_caract($nom, $nom_bdd, $niveau)
{
	echo "<h4>".$nom." de niveau ".$niveau."</h4>";
		
	include('connectionbdd.php');
	
	$monstre = $bdd->query("SELECT * FROM monstres WHERE nom = '".$nom_bdd."' AND niveau = '".$niveau."'");
	
	$monstr = $monstre->fetch();
	if(!$monstr)
	{
		echo "<p>Aucune donnée n'a été collectée pour le moment.</p>";
	}
	else {
		$idCar = $monstr['id_Att'];
		
		$caract = $bdd->query("SELECT * FROM attaque WHERE id ='".$idCar."'");
		$attaque = $caract->fetch();
		$idCar = $monstr['id_Def'];
		
		$caract = $bdd->query("SELECT * FROM defense WHERE id ='".$idCar."'");
		$defense = $caract->fetch();
		$idCar = $monstr['id_Armure'];
		
		$caract = $bdd->query("SELECT * FROM armure WHERE id ='".$idCar."'");
		$armure = $caract->fetch();
		$idCar = $monstr['id_Degat'];
		
		$caract = $bdd->query("SELECT * FROM degat WHERE id ='".$idCar."'");
		$degat = $caract->fetch();
		$idCar = $monstr['id_MM'];
		
		$caract = $bdd->query("SELECT * FROM mm WHERE id ='".$idCar."'");
		$mm = $caract->fetch();
		$idCar = $monstr['id_PV'];
		
		$caract = $bdd->query("SELECT * FROM pv WHERE id ='".$idCar."'");
		$pv = $caract->fetch();
		
?>
		<p>
			<?php if($attaque['nb'] > 0) {
			$ecart = pow((($attaque['sum_2']/$attaque['nb'])-(pow($attaque['sum'],2)/pow($attaque['nb'],2))),(1/2) );	?>
			<strong>Attaque :</strong> <?php echo $attaque['jet']; ?> ( moyenne : <?php echo ($attaque['sum']/$attaque['nb']); ?> - écart-type : <?php echo $ecart; ?> ) [ estimation : <?php echo $attaque['nb']; ?> ]<br /><br /> <?php } ?>
			
			<?php if($degat['nb'] > 0) {
			$ecart = pow((($degat['sum_2']/$degat['nb'])-(pow($degat['sum'],2)/pow($degat['nb'],2))),(1/2) );	?>
			<strong>Dégâts :</strong> <?php echo $degat['jet']; ?> ( moyenne : <?php echo ($degat['sum']/$degat['nb']); ?> - écart-type : <?php echo $ecart; ?> ) [ estimation : <?php echo $degat['nb']; ?> ]<br /><br /> <?php } ?>
			
			<?php if($defense['nb'] > 0) {
			$ecart = pow((($defense['sum_2']/$defense['nb'])-(pow($defense['sum'],2)/pow($defense['nb'],2))),(1/2) );	?>
			<strong>Défense :</strong> <?php echo $defense['jet']; ?> ( moyenne : <?php echo ($defense['sum']/$defense['nb']); ?> - écart-type : <?php echo $ecart; ?> ) [ estimation : <?php echo $defense['nb']; ?> ]<br /><br /> <?php } ?>
			
			<?php if($pv['nb'] > 0) {
			$ecart = pow((($pv['sum_2']/$pv['nb'])-(pow($pv['sum'],2)/pow($pv['nb'],2))),(1/2) );	?>
			<strong>PV :</strong> <?php echo $pv['jet']; ?> ( moyenne : <?php echo ($pv['sum']/$pv['nb']); ?> - écart-type : <?php echo $ecart; ?> ) [ estimation : <?php echo $pv['nb']; ?> ]<br /><br /> <?php } ?>
			
			<?php if($armure['nb'] > 0) {
			$ecart = pow((($armure['sum_2']/$armure['nb'])-(pow($armure['sum'],2)/pow($armure['nb'],2))),(1/2) );	?>
			<strong>Armure :</strong> <?php echo $armure['jet']; ?> ( moyenne : <?php echo ($armure['sum']/$armure['nb']); ?> - écart-type : <?php echo $ecart; ?> ) [ estimation : <?php echo $armure['nb']; ?> ]<br /><br /> <?php } ?>
			
			<?php if($mm['nb'] > 0) {
			$ecart = pow((($mm['sum_2']/$mm['nb'])-(pow($mm['sum'],2)/pow($mm['nb'],2))),(1/2) );	?>
			<strong>Maitrise de la magie :</strong> <?php echo $mm['jet']; ?> ( moyenne : <?php echo ($mm['sum']/$m['nb']); ?> - écart-type : <?php echo $ecart; ?> ) [ estimation : <?php echo $mm['nb']; ?> ] <?php } ?>
		</p>
<?php
		$caract->closeCursor();
	}
	$monstre-> closeCursor();
}



/* Function		:	ajouter_donnee
** Input		:	STRING $nom_bdd
** OUTPUT		:	Aucun
** Description	:	Ajoute les données aux caractéristiques d'un monstre d'un certain niveau en se référant à la base de donnée uonalyse.
** Creator		: 	Ewakhine Do'varden
** Date 		: 	27 / 10 / 2014 */

function ajouter_donnee ($nom_bdd) 
{
	include('connectionbdd.php');
	$niveau =  $_POST['level'];
	$niv = explode("x", $niveau);

	$monstre = $bdd->query('SELECT COUNT(*) AS nb FROM monstres WHERE nom="'.$nom_bdd.'" AND niveau="'.$niv[1].'"');
	$monstr = $monstre->fetch();

	//Cas où le monstre de tel niveau n'existe pas encore dans la base de données.
	if($monstr['nb'] == 0)
	{	
		//J'insère d'abord la ligne correspondant à la caractéristique			
		$req = $bdd->prepare('INSERT INTO '.$_POST['caract'].'(jet, min, max, nb, sum, sum_2) VALUES(:jet, :min, :max, :nb, :sum, :sum_2)');
		$req->execute(array(
					'jet' => $_POST['valeur'],
					'min' => $_POST['valeur'],
					'max' => $_POST['valeur'],
					'nb' => "1",
					'sum' => $_POST['valeur'],
					'sum_2' => pow($_POST['valeur'], 2)
					));
		
		$array = array( 
				"attaque" => "id_Att",
				"defense" => "id_Def",
				"armure" => "id_Armure",
				"pv" => "id_PV",
				"degat" => "id_Degat",
				"mm" => "id_MM"
				);
		
		$donnee = $bdd-> query("SELECT id FROM ".$_POST['caract']." ORDER BY id DESC");
		$donne = $donnee->fetch();
			
		//Puis j'ajoute la ligne correspondant au monstre
		$req = $bdd->prepare('INSERT INTO monstres(nom, niveau, '.$array[$_POST['caract']].') VALUES(:nom, :niveau, :id_car)');
		$req->execute(array(
					'nom' => $nom_bdd,
					'niveau' => $niv[1],
					'id_car' => $donne['id']
					));
		$donnee->closeCursor();
	}

	//Cas où le monstre de tel niveau existe déjà
	elseif($monstr['nb'] == 1)
	{
		$array = array( 
				"attaque" => "id_Att",
				"defense" => "id_Def",
				"armure" => "id_Armure",
				"pv" => "id_PV",
				"degat" => "id_Degat",
				"mm" => "id_MM"
				);
		
		$donnee1 = $bdd->query("SELECT ".$array[$_POST['caract']]." FROM monstres WHERE nom='".$nom_bdd."' AND niveau ='".$niv[1]."'");
		$donne1 = $donnee1->fetch();
		$idcar = $donne1[$array[$_POST['caract']]];
		
		//S'il n'y a encore aucune valeur correspondant à la caractéristique
		if(	$idcar == 0)	
		{
			//Je crée une nouvelle entrée pour la caractéristique
			$req = $bdd->prepare('INSERT INTO '.$_POST['caract'].'(jet, min, max, nb, sum, sum_2) VALUES(:jet, :min, :max, :nb, :sum, :sum_2)');
			$req->execute(array(
					'jet' => $_POST['valeur'],
					'min' => $_POST['valeur'],
					'max' => $_POST['valeur'],
					'nb' => "1",
					'sum' => $_POST['valeur'],
					'sum_2' => pow($_POST['valeur'],2)
					));
			
			//Je récupère la valeur de l'id de la caract
			$donnee = $bdd->query("SELECT id FROM ".$_POST['caract']." ORDER BY id DESC");
			$donne = $donnee->fetch();
			
			//Je mets à jour la ligne du monstre
			$req = $bdd->prepare("UPDATE monstres SET ".$array[$_POST['caract']]." = :id_car WHERE nom='".$nom_bdd."' AND niveau='".$niv[1]."'" );
			$req->execute(array(
					'id_car' => $donne['id']
					));
					
			$donnee->closeCursor();
		}
		
		//S'il y a déjà une valeur correspondant à la caractéristique
		else 
		{
			$donnee = $bdd->query("SELECT ".$array[$_POST['caract']]." FROM monstres WHERE nom='".$nom_bdd."' AND niveau='".$niv[1]."'");
			$donne = $donnee->fetch();
			
			$bdd->exec("UPDATE ".$_POST['caract']." SET nb=nb+1 WHERE id = '".$donne[$array[$_POST['caract']]]."'");
			
			$dube = $bdd->query("SELECT jet, min, max, nb, sum, sum_2 FROM ".$_POST['caract']." WHERE id='".$donne[$array[$_POST['caract']]]."'");
			$dub = $dube->fetch();
			$nb = $dub['nb'];
			$min = min($dub['min'], $_POST['valeur']);
			$max = max($dub['max'], $_POST['valeur']);
			$jet = ($dub['jet']*($nb-1)+$_POST['valeur'])/$nb;
			$som = $dub['sum']+$_POST['valeur'];
			$som2 = $dub['sum_2']+pow($_POST['valeur'],2);
			
			$req = $bdd->prepare("UPDATE ".$_POST['caract']." SET jet=:njet, min=:nmin, max=:nmax, sum=:nsom, sum_2=:nsom2 WHERE id = '".$donne[$array[$_POST['caract']]]."'");
			$req->execute(array(
						'njet' => $jet,
						'nmin' => $min,
						'nmax' => $max,
						'nsom' => $som,
						'nsom2' => $som2
						));
						
			$donnee->fetch();
		}			
		$donnee1->closeCursor();
	}
}
?>
