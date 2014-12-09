<?php

include ('header.php');
include ('menu_aside.php');

include('connectionbdd.php');
?>
<section id="information">
<br /><br />
<form id="addM" method="post" action="addmonster.php">
	<fieldset>
		<label for="nom">Nom</label><input type="text" name="nom" id="nom" /><br />
		<label for="nom_bdd">Nom bdd</label><input type="text" name="nom_bdd" id="nom_bdd" /><br />
		<label for="nom_image">Nom image</label><input type="text" name="nom_image" id="nom_image" /><br />
		<label for="nom_image">Description</label><textarea name="description" id="description" /></textarea><br />
		<label for="lvlmin">Niveau min</label><input type="text" name="lvlmin" id="lvlmin" /><br />
		<label for="lvlmax">Niveau max</label><input type="text" name="lvlmax" id="lvlmax" /><br />
	</fieldset>
	<input type="submit" name="valider" value="Valider" />
</form>
<?

if (isset($_POST['valider'])) {
$addM = $bdd->prepare("INSERT INTO fichemonstre (nom, nom_bdd, nom_image, description) VALUES (:nom, :nom_bdd, :nom_image, :description)");
$addM->execute(array(
			'nom' => $_POST['nom'],
			'nom_bdd' => $_POST['nom_bdd'],
			'nom_image' => $_POST['nom_image'],
			'description' => $_POST['description']
			));
echo "<br /><br />La créature ".$_POST['nom']." a bien été ajoutée.";
}
echo "</section>";
include ('footer.php');
?>