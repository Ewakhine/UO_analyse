<?php
include ('header.php');
include ('menu_aside.php');

$Nom='Crapaud géant';
$Nom_bdd='crapaud';
$Nom_page='crapaud.php';
$Nom_image='img/crapaud.jpg';
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
		<p>Cet énorme crapaud est le produit d’une manipulation magique incontrôlée. Censée servir d’arme sonore en faisant exploser les cervelles de ses victimes par l’effet de ses coassements, cette expérimentation fut abandonnée à la fin de l’Hegemon Artassien. Cependant, l’espèce se montra étonnamment viable. Son habitude agaçante de se placer à proximité d’un campement pour pousser ses hurlements sadiques toute la nuit la rend dangereuse.<br /><br />
		
		En effet, ce bruit abominable et incessant peut rapidement provoquer des crises de nerfs chez les aventuriers les moins endurcis, susceptibles de se lever en hurlant au milieu de la nuit pour charger aveuglément, épée en main, sans même penser à enlever leur pyjama ou à passer une côte de maille. Le venin que suppure cette bête est toutefois recherché, et de nombreux jeunes aventuriers voient dans sa récolte un moyen rapide de faire fortune. Nombreux sont ceux qui meurent dans d’atroces souffrances, les tympans percés par un coassement tueur.<br /><br />
		
		<em>« Avec les bouchons d’oreille Joyeux Corsaire ™, pars à la chasse au crapaud parfaitement couvert ! Satisfait ou remboursé (sur preuve) »</em> Réclame parue dans <em>le Barbare déchaîné</em> d’Earok.</p>
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
		
		<form id="myForm" method="post" action=<?php echo $Nom_page; ?>>
			<input type="hidden" name="level" value="<?php echo $_POST['level']; ?>" />
			<input type="submit" name="infos" value="Retour"/>
		</form>
		
		<?php 		
	}
?>
</section>

<?php
include ('footer.php');
?>
