<!--
		<a href="gobelin.php"><li>Gobelins</li></a>
		<a href="shamangobelin.php"><li>Shamans gobelins</li></a>
		<a href="gobelinarcher.php"><li>Gobelins archers</li></a>
		<a href="goule.php"><li>Goules</li></a>
		<a href="ombre.php"><li>Ombres</li></a>
		<a href="bleme.php"><li>Blêmes</li></a>
		<a href="golemchair.php"><li>Golems de chair</li></a>
		<a href="momie.php"><li>Momies</li></a>
		<a href="squelette.php"><li>Squelettes</li></a>
		<a href="gobelours.php"><li>Gobelours</li></a>
		<a href="orc.php"><li>Orcs</li></a>
		<a href="horreursousbois.php"><li>Horreurs des sous-bois</li></a>
		<a href="feebois.php"><li>Fées des bois</li></a>
		<a href="mantepretresse.php"><li>Mantes prêtresses</li></a>
		<a href="hobgobelin.php"><li>Hobgobelins</li></a>
		<a href="troll.php"><li>Trolls</li></a>
		<a href="necromancien.php"><li>Nécromanciens</li></a>
		<a href="zombi.php"><li>Zombis</li></a>
		<a href="combattantsquelette.php"><li>Combattants squelettes</li></a>
		<a href="gardiensquelette.php"><li>Gardiens squelettes</li></a>
		<a href="feufol.php"><li>Feux fols</li></a>
		<a href="ogrebicephale.php"><li>Ogres bicéphales</li></a>
		<a href="gardenoir.php"><li>Gardes noirs</li></a>
		<a href="guerrierpossede.php"><li>Guerriers possédés</li></a>
		<a href="balor.php"><li>Balors</li></a>
		<a href="gardetenebres.php"><li>Gardes des Ténèbres</li></a>
		<a href="serpentaqualien.php"><li>Serpents aqualiens</li></a>
		<a href="abominationmarais.php"><li>Abominations des marais</li></a>
		<a href="basilic.php"><li>Basilics majeurs</li></a>
		<a href="basilicmineur.php"><li>Basilics mineurs</li></a>
		<a href="manticore.php"><li>Manticores</li></a>
		<a href="dragondunes.php"><li>Dragons des dunes</li></a>
		<a href="scorpiongeant.php"><li>Scorpions géants</li></a>
		<a href="basilicroi.php"><li>Basilics rois</li></a>
		<a href="vouivre.php"><li>Vouivres</li></a>
		<a href="etranglesaule.php"><li>Étranglesaules</li></a>
		<a href="sauteurfauchard.php"><li>Sauteurs fauchards</li></a>
		<a href="gargouille.php"><li>Gargouilles</li></a>
		<a href="golemargile.php"><li>Golems d'argile</li></a>
		<a href="dopplegangermajeur.php"><li>Dopplegangers majeurs</li></a>
		<a href="araigneetitanesque.php"><li>Araignées titanesques</li></a>
		<a href="golembiere.php"><li>Golems de bière</li></a>
		<a href="dragonvent.php"><li>Dragons de vent</li></a>
		<a href="gmwyverne.php"><li>Grand-mères Wyvernes</li></a>
		<a href="wyverne.php"><li>Wyvernes</li></a>
		<a href="dragonrouge.php"><li>Dragons rouges</li></a>
		<a href="phenix.php"><li>Phénix</li></a>
		<a href="griffon.php"><li>Griffons</li></a>
		<a href="kraken.php"><li>Krakens terrestres</li></a>
		<a href="dragonroyal.php"><li>Dragons royaux</li></a>
		<a href="griffonargente.php"><li>Griffons argentés</li></a>
		<a href="araigneecolossale.php"><li>Araignées colossales</li></a>
		<a href="gnoll.php"><li>Gnolls</li></a>
		<a href="gandrezc.php"><li>Gandrezcs</li></a>
	</ul>
</nav>-->

<nav id="menu_aside">
	<ul>
		<?php if (isset($_SESSION['login']) && $_SESSION['login']=="Admin" && isset($_SESSION['pass'])) { ?>
		<a href="addmonster.php"><li>Add Monster</li></a>
		<?php }
		$array_monster = array (
			1 => "Rats Géants", "Crapauds Géants", "Chauve-souris Géantes", "Kobolds", "Loups", "Araignées éclipsantes", "Fourmis guerrières géantes", "Fourmis reines", "Hommes-Lézards", "Manges-Coeur", "Araignées sabres", "Araignées piégeuses", "Âmes en peine", "Fantômes", "Esprits terrifiants", "Dopplegangers", "Assassins runiques", "Anges noirs", "Gobelin");
			
		foreach ($array_monster as $key => $value) {
			echo "<a href=fichemonstre.php?id=".$key."><li>".$value."</li></a>";
		}
	?>
	</ul>
</nav>
