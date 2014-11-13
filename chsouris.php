<?php
include ('header.php');
include ('menu_aside.php');

$Nom='Chauve-souris géante';
$Nom_bdd='chauve-souris';
$Nom_page='chsouris.php';
$Nom_image='img/chsouris.jpg';
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
					for ($i=1; $i < 11; $i++) {
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
		<img id="image" src=<?php echo $Nom_image; ?> />
		<p>Le battement obscur d’ailes de cuir sombre dans la nuit. Un corps massif fendant les airs nocturnes sous la hâve lueur d’Aryn. Le chant lancinant d’un orgue dans un château au sein du Scercz'biec. Le vol noir de la Chauve-ouris Géante sur les plaines de Nacridan provoque la terreur sous sa large ombre maléfique ; quand le crépuscule vient, c’est en vastes groupes que ce féroce carnivore n’hésite nullement à s’en prendre à ses victimes : monstres, bêtes, Races Aînées, tout lui est bon pour nourrir son abominable appétit. Tombant de tout son poids considérable sur le dos de sa proie, elle le fouette avec ses lourdes ailes de cuir aux griffes proéminentes, tout en lui plongeant ses crocs effrayants dans la nuque, pour aspirer son sang. Contrairement aux rumeurs, il ne s’agit pas, néanmoins, d’un véritable vampire, et si elle ne brûle pas au soleil, un bon coup d’un froid acier bien affûté saura tranquilliser définitivement ce monstre. Domestiquée, elle sert efficacement de messager ou de Familier, et procure un important bonus au charisme pour les nécromanciens et autres êtres de la nuit.<br /><br />

		« <em>... c’était par une nuit obscure, m’sieur Zvountz. Mon camarade Wanderbegen était sorti fumer une pipe d’herbe-qui-fait-sourire-bêtement… c’est Adah qui lui avait refilée, moi j’y ai pas touché, ça me fait tousser, je vous le jure… Et puis il y a eu un bruit comme un gros truc qui ferait flap-flap, et… et quand je suis sortie, il était partiiiiiiii-i-i-i… sans… SANS MÊME ME DIRE AU REVOIR !</em> » <em>Mes traumatismes</em>, par Llyn.</p>
	</article>	
	
<?php
	}
	
		for ($niveau = 1; $niveau < 11; $niveau++)
	{
		if (isset($_POST['visualiser']) && isset($_POST['level']) && $_POST['level'] == 'choix'.$niveau)
		{
			include('function.inc.php');			
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
		include('function.inc.php');
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
		include('function.inc.php');
		ajouter_donnee ($Nom_bdd);
		?>
		<form method="post" action=<?php echo $Nom_page; ?>>
			<input type="hidden" name="level" value="<?php echo $_POST['level']; ?>" />
			<input type="submit" name="infos" value="Retour"/>
		</form>
	<?php }
?>
</section>

<?php
include ('footer.php');
?>
