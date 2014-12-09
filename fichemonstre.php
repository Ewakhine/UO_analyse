<?php
include('header.php');
include('connectionbdd.php');

$ficheC = $bdd->query("SELECT COUNT(*) FROM fichemonstre");
if ($_GET['id'] > $ficheC->fetch()[0])
{
	echo "<br /><br /><center><h1>Mouaha, t'as essayé d'me gruger, connard.</h1></center>";
}

else {
echo $ficheC->fetch()[0];
$fiche = $bdd->query("SELECT * FROM fichemonstre WHERE id = '".$_GET['id']."'");
$fich=$fiche->fetch();


include ('function.inc.php');
fiche_monstre($fich['nom'], $fich['nom_bdd'], "fichemonstre.php?id=".$_GET['id'], $fich['nom_image'], $fich['description'], $fich['lvlmin'], $fich['lvlmax']);
$fiche->closeCursor();
}

$ficheC->closeCursor();
include('footer.php')
?>