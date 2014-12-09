<?php
include ('header.php');
include ('menu_aside.php');
?>				
<section id="information">
	<article>
		<h3>Présentation</h3>
		<p>Salutations,<br /><br />
		Ce site est conçu pour les membres de l'Union Obscure et recense les différents monstres présents dans Nacridan. On y retrouve notamment leurs descriptions et les différentes informations dépendant de leurs caractéristiques de combat.<br /><br />
		Il suffit de sélectionner l'un des monstres puis de choisir son niveau dans le menu déroulant de gauche.<br />
		Les informations disponibles vous seront alors fournies. Pour les compléter, il suffit de cliquer sur le bouton : J'apporte des infos !</p>
	</article>
	
	<div id="connexion">
	<?php
	if (!isset($_SESSION['login'])  && !isset($_SESSION['pass']) )
	{ 
	?>
		<p>Connexion :</p>
		<form action="connexion.php" method="post">
			<label for="login">Login : </label><input type="text" id="login" name="login" /><br />
			<label for="pass">Mot de passe : </label><input type="password" id="pass" name="pass" /><br />
			<input type="submit" name="connexion" value="Connexion" />
		</form>
	<?php
	}
	else {
	?>
		<p>Déconnexion :</p>
		<a href="deconnexion.php">Déconnexion</a>
	<?php
	}
	?>
	</div>
</section>
	
<?php
include ('footer.php');
?>		