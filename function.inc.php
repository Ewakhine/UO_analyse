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
			<strong>Attaque :</strong> <?php echo number_format($attaque['jet'],2); ?> ( moyenne : <?php echo number_format(($attaque['sum']/$attaque['nb']),2); ?> - écart-type : <?php echo number_format($ecart,2); ?> ) [ estimation : <?php echo $attaque['nb']; ?> ]<br /><br /> <?php } ?>
			
			<?php if($degat['nb'] > 0) {
			$ecart = pow((($degat['sum_2']/$degat['nb'])-(pow($degat['sum'],2)/pow($degat['nb'],2))),(1/2) );	?>
			<strong>Dégâts :</strong> <?php echo number_format($degat['jet'],2); ?> ( moyenne : <?php echo number_format(($degat['sum']/$degat['nb']),2); ?> - écart-type : <?php echo number_format($ecart,2); ?> ) [ estimation : <?php echo $degat['nb']; ?> ]<br /><br /> <?php } ?>
			
			<?php if($defense['nb'] > 0) {
			$ecart = pow((($defense['sum_2']/$defense['nb'])-(pow($defense['sum'],2)/pow($defense['nb'],2))),(1/2) );	?>
			<strong>Défense :</strong> <?php echo number_format($defense['jet'],2); ?> ( moyenne : <?php echo number_format(($defense['sum']/$defense['nb']),2); ?> - écart-type : <?php echo number_format($ecart,2); ?> ) [ estimation : <?php echo $defense['nb']; ?> ]<br /><br /> <?php } ?>
			
			<?php if($pv['nb'] > 0) {
			$ecart = pow((($pv['sum_2']/$pv['nb'])-(pow($pv['sum'],2)/pow($pv['nb'],2))),(1/2) );	?>
			<strong>PV :</strong> <?php echo number_format($pv['jet'],2); ?> ( moyenne : <?php echo number_format(($pv['sum']/$pv['nb']),2); ?> - écart-type : <?php echo number_format($ecart,2); ?> ) [ estimation : <?php echo $pv['nb']; ?> ]<br /><br /> <?php } ?>
			
			<?php if($armure['nb'] > 0) {
			$ecart = pow((($armure['sum_2']/$armure['nb'])-(pow($armure['sum'],2)/pow($armure['nb'],2))),(1/2) );	?>
			<strong>Armure :</strong> <?php echo number_format($armure['jet'],2); ?> ( moyenne : <?php echo number_format(($armure['sum']/$armure['nb']),2); ?> - écart-type : <?php echo number_format($ecart,2); ?> ) [ estimation : <?php echo $armure['nb']; ?> ]<br /><br /> <?php } ?>
			
			<?php if($mm['nb'] > 0) {
			$ecart = pow((($mm['sum_2']/$mm['nb'])-(pow($mm['sum'],2)/pow($mm['nb'],2))),(1/2) );	?>
			<strong>Maitrise de la magie :</strong> <?php echo number_format($mm['jet'],2); ?> ( moyenne : <?php echo number_format(($mm['sum']/$m['nb']),2); ?> - écart-type : <?php echo number_format($ecart,2); ?> ) [ estimation : <?php echo $mm['nb']; ?> ] <?php } ?>
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




/* Function		:	fiche_monstre
** Input		:	STRING $Nom, STRING $Nom_bdd, STRING $Nom_page, STRING $Nom_image, STRING $Description, INT $lvlmin, INT $lvlmax
** OUTPUT		:	Aucun
** Description	:	Génère la fiche d'un monstre.
** Creator		: 	Ewakhine Do'varden
** Date 		: 	08 / 12 / 2014 */

function fiche_monstre($Nom, $Nom_bdd, $Nom_page, $Nom_image, $Description, $lvlmin, $lvlmax) {
include ('menu_aside.php');


$Nom_image='img/'.$Nom_image;
?>

<section id="information">
	<h3><?php echo $Nom; ?></h3>
	
	<aside id="plus">
		<table>
			<td><strong>Obtenir plus d'informations : </strong></td>
			<td><form id="formulaire" method="post" action=<?php echo $Nom_page; ?>>
				<select name="level">
					<option value="choix0">-- Base --</options>
					<?php
					for ($i=$lvlmin; $i < $lvlmax + 1; $i++) {
						echo '<option value="choix'.$i.'">Niveau '.$i.'</option>';
					}
					?>
				</select>
				<input type="submit" name="visualiser" />
			</form></td>
		</table>
	</aside>
	
<?php
	if (!isset($_POST['level']) || (isset($_POST['level']) && $_POST['level'] == 'choix0') )
	{
?>	
	<article id="content">
		<h4>Appréciation de l'UO :</h4>
		<p>Une petite appréciation de nos experts.</p>
	
		<h4>Description</h4>
		<?php if ($Nom_image != "img/") { ?><img id="image" src=<?php echo $Nom_image; ?> />
		<?php }
		echo $Description; ?>
	</article>	
	
<?php
	}
	
		for ($niveau = $lvlmin; $niveau < $lvlmax + 1; $niveau++)
	{
		if (isset($_POST['visualiser']) && isset($_POST['level']) && $_POST['level'] == 'choix'.$niveau)
		{			
			afficher_caract($Nom, $Nom_bdd, $niveau);
			if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
		?>
			<form method="post" action=<?php echo $Nom_page; ?>>
				<input type="submit" name="infos" value="J'apporte des infos !" />
				<input type="hidden" name="level" value="<?php echo $_POST['level']; ?>" />
			</form>
		<?php
			}
		}
	}
	
	if(isset($_POST['infos']) && isset($_POST['level'])) {
		$niveau =  $_POST['level'];
		$niv = explode("x", $niveau);
		
		afficher_caract($Nom, $Nom_bdd, $niv[1]);
		?>
			
		<form method="post" action=<?php echo $Nom_page; ?>>
			<select name="caract">
				<option value="attaque">Attaque</option>
				<option value="defense">Défense</option>
				<option value="degat">Dégâts</option>
				<option value="armure">Armure</option>
				<option value="mm">Maitrise de la magie</option>
				<option value="pv">PV</option>
			</select>
			
			<input type="text" name="valeur" />
			<input type="hidden" name="level" value="<?php echo $_POST['level']; ?>" />
			
			<input type="submit" name="valider" value="Valider" />
		</form>		
	<?php
	}
	
	if(isset($_POST['valider']) && isset($_POST['level']) && isset($_POST['caract']) && $_POST['valeur'] != null)
	{
		ajouter_donnee ($Nom_bdd);
		?>
		<form method="post" action=<?php echo $Nom_page; ?>>
			<input type="hidden" name="level" value="<?php echo $_POST['level']; ?>" />
			<input type="submit" name="infos" value="Retour"/>
		</form>
	<?php }
echo "</section>";
}
?>