-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 09 Décembre 2014 à 13:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `uoanalyse`
--

-- --------------------------------------------------------

--
-- Structure de la table `armure`
--

CREATE TABLE IF NOT EXISTS `armure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` float NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `armure`
--

INSERT INTO `armure` (`id`, `jet`, `min`, `max`, `nb`, `sum`, `sum_2`) VALUES
(4, 13, 7, 24, 3, 39, 689);

-- --------------------------------------------------------

--
-- Structure de la table `attaque`
--

CREATE TABLE IF NOT EXISTS `attaque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` float NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `attaque`
--

INSERT INTO `attaque` (`id`, `jet`, `min`, `max`, `nb`, `sum`, `sum_2`) VALUES
(9, 6.6, 5, 8, 5, 33, 225),
(10, 8.5, 8, 9, 2, 17, 145);

-- --------------------------------------------------------

--
-- Structure de la table `defense`
--

CREATE TABLE IF NOT EXISTS `defense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` float NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `degat`
--

CREATE TABLE IF NOT EXISTS `degat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` float NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fichemonstre`
--

CREATE TABLE IF NOT EXISTS `fichemonstre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nom_bdd` varchar(255) NOT NULL,
  `nom_image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `lvlmin` int(11) NOT NULL,
  `lvlmax` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `fichemonstre`
--

INSERT INTO `fichemonstre` (`id`, `nom`, `nom_bdd`, `nom_image`, `description`, `lvlmin`, `lvlmax`) VALUES
(1, 'Rat géant', 'rat geant', 'rat.png', '<p>Les Rats Géants déferlent en horde dans la campagne et constituent un véritable fléau depuis la nuit des temps. Car ces mutations monstrueuses du rongeur commun ne se contentent pas de grignoter les réserves de blé, ni même de saccager les chaumières des paysans : ils sont volontiers carnivores et charognards et véhiculent des maladies pestilentielles. En outre, ils sont dotés d’une intelligence nocive et n’hésitent pas à s’attaquer aux villes. Leur technique procède alors en deux temps : une première vague de ces bêtes assaille les barricades jusqu’à ce que l’une d’elles arrive à se faufiler dans les rangs des défenseurs et à y propager les infections par le biais de ses parasites ; une fois les lignes ennemies ainsi affaiblies, les pernicieuses créatures envahissent en nombre la citadelle et en investissent le moindre recoin. Elles restent alors tapies jusqu’à ce qu’une proie affaiblie par les fièvres passe à leur portée et se repaissent de sa dépouille avant d’assurer la multiplication des générations futures. Qui bientôt tenteront de dévaster d’autres régions.<br /><br />\r\n		<em>« Autrefois le rat des villes<br />\r\n		Invita le rat géant<br />\r\n		D’une façon fort hostile<br />\r\n		Celui-ci s’en vint séant.<br />\r\n		<br />\r\n		Sur un tapis de cadavres<br />\r\n		Le couvert se trouva mis.<br />\r\n		Mais soudain dans les charpies<br />\r\n		Le gros rat du p’tit se gave… » Comptines des Grandes Pestes de Khaâ-Mû, éleveur d''orques depuis 25 ans.</em></p>', 1, 10),
(2, 'Crapaud Géant', 'crapaud', 'crapaud.jpg', '<p>Cet énorme crapaud est le produit d’une manipulation magique incontrôlée. Censée servir d’arme sonore en faisant exploser les cervelles de ses victimes par l’effet de ses coassements, cette expérimentation fut abandonnée à la fin de l’Hegemon Artassien. Cependant, l’espèce se montra étonnamment viable. Son habitude agaçante de se placer à proximité d’un campement pour pousser ses hurlements sadiques toute la nuit la rend dangereuse.<br /><br />\r\n		\r\n		En effet, ce bruit abominable et incessant peut rapidement provoquer des crises de nerfs chez les aventuriers les moins endurcis, susceptibles de se lever en hurlant au milieu de la nuit pour charger aveuglément, épée en main, sans même penser à enlever leur pyjama ou à passer une côte de maille. Le venin que suppure cette bête est toutefois recherché, et de nombreux jeunes aventuriers voient dans sa récolte un moyen rapide de faire fortune. Nombreux sont ceux qui meurent dans d’atroces souffrances, les tympans percés par un coassement tueur.<br /><br />\r\n		\r\n		<em>« Avec les bouchons d’oreille Joyeux Corsaire ™, pars à la chasse au crapaud parfaitement couvert ! Satisfait ou remboursé (sur preuve) »</em> Réclame parue dans <em>le Barbare déchaîné</em> d’Earok.</p>', 1, 10),
(3, 'Chauve-souris géante', 'chauve-souris', 'chsouris.png', '<p>Le battement obscur d’ailes de cuir sombre dans la nuit. Un corps massif fendant les airs nocturnes sous la hâve lueur d’Aryn. Le chant lancinant d’un orgue dans un château au sein du Scercz''biec. Le vol noir de la Chauve-ouris Géante sur les plaines de Nacridan provoque la terreur sous sa large ombre maléfique ; quand le crépuscule vient, c’est en vastes groupes que ce féroce carnivore n’hésite nullement à s’en prendre à ses victimes : monstres, bêtes, Races Aînées, tout lui est bon pour nourrir son abominable appétit. Tombant de tout son poids considérable sur le dos de sa proie, elle le fouette avec ses lourdes ailes de cuir aux griffes proéminentes, tout en lui plongeant ses crocs effrayants dans la nuque, pour aspirer son sang. Contrairement aux rumeurs, il ne s’agit pas, néanmoins, d’un véritable vampire, et si elle ne brûle pas au soleil, un bon coup d’un froid acier bien affûté saura tranquilliser définitivement ce monstre. Domestiquée, elle sert efficacement de messager ou de Familier, et procure un important bonus au charisme pour les nécromanciens et autres êtres de la nuit.<br /><br />\r\n\r\n		« <em>... c’était par une nuit obscure, m’sieur Zvountz. Mon camarade Wanderbegen était sorti fumer une pipe d’herbe-qui-fait-sourire-bêtement… c’est Adah qui lui avait refilée, moi j’y ai pas touché, ça me fait tousser, je vous le jure… Et puis il y a eu un bruit comme un gros truc qui ferait flap-flap, et… et quand je suis sortie, il était partiiiiiiii-i-i-i… sans… SANS MÊME ME DIRE AU REVOIR !</em> » <em>Mes traumatismes</em>, par Llyn.</p>', 1, 10),
(4, 'Kobold', 'kobold', 'kobold.jpg', '<p>Ces petites créatures à la fourrure fauve et à tête de chien, rappelant celle d’un cocker mais en plus laid, sont assez pathétiques. D''une force très peu développée, à peine capable de brandir un coutelas, elles sont en outre d''une rare stupidité. Ce n''est pas pour rien qu''un proverbe izandrin dit : « <em>Aussi bête qu''un kobold dans une colonne de paladins. </em>» En vérité, leur seule chance de parvenir à mettre un terme à l''existence d''un aventurier est de le prendre par surprise pendant son sommeil ou de lui jeter une boule de feu. Par une espèce d''humour assez saumâtre de Dame Nature, les kobolds comptent en effet au nombre de leurs très rares aptitudes celles de produire à volonté de petites sphères incandescentes, dont ils se servent en général pour organiser de complexes parades enflammées pour trouver une partenaire, ou pour chasser les papillons et les oiseaux dont ils font une consommation quasi exclusive, bien que ne dédaignant pas à l''occasion fruits sauvages et racines, voire une charogne ou deux. <br /><br />\r\n\r\n		Contrairement à son lointain parent le Gnoll, toutefois, le kobold prend toujours soin de bien faire cuire la viande qu''il consomme, au risque néanmoins de s''enflammer lui-même, ce qui arrive hélas bien plus souvent qu''on ne le croit. Il y a peu de mérite à affronter pareille aberration de la nature, mais les plus jeunes aventuriers ne manquent pas de les massacrer pour peu qu''ils en trouvent. En plus de pourvoir à leur éducation, cela leur procure un divertissant spectacle de sons et lumières.<br /><br />\r\n\r\n		«<em> - Bon, les gens, y a plus d''ambiance, là, s''écria Balin à la cantonade. Et si on jouait à Paf le kobold ?</em>» Les folles soirées de la Taverne de la Tortue Boiteuse, par Dame Amlika.	</p>', 3, 12),
(5, 'Loup', 'loup', 'loup.jpg', '<p>Ce loup est d''une taille assez imposante. Sa riche fourrure grise et noire est très convoitée par les habitants des villes, mais, hélas, il rechigne bien trop souvent à s''en séparer au profit des aventuriers qui s''en viennent là lui prendre. Muni de crocs impressionnants, il n''hésitera jamais à tailler une couenne ou deux à ceux qui s''approchent trop de lui, et ses puissantes mâchoires peuvent parfaitement suffire à arracher une gorge à découvert, par exemple. Néanmoins, il craint en général les races aînées et n''ira pas les attaquer, à moins qu''il ne soit en nombre ou affamé et désespéré. On cite alors bien souvent la fois où les loups entrèrent dans Earok, durant ce terrible hiver de 3E555. La population en fut d''ailleurs bien heureuse, car on n''avait plus de viande comestible depuis bien longtemps. <br /><br />\r\n\r\n		«<em>... Faites bien attention ma petite dame, ce n''est pas un chien que vous avez là, c''est un fauve ! – Je suis certaine qu''il me fera aucun mal, répliqua Amlika</em>» Croc Jaune, d''Amlika</p>', 3, 12),
(6, 'Araignée éclipsante', 'araignee-éclipsante', 'araignee-eclipsante.jpg', '<p>Dans une île où chaque espèce d''araignée semble être gagnée d''une aérophagie proportionnelle à son avidité pour la chair humaine, l''araignée éclipsante apparaît presque comme un soulagement. Bien que son venin soit mortel, cet arachnide au corps noir et luisant est de taille modeste, à peine plus d''un mètre de haut, et n''est même pas très agressif. A vrai dire, elle ferait une proie facile pour tout jeune aventurier en quête d’exercice et, dans un monde où chaque village est habitué à recevoir la visite d''armées mortes-vivantes, de dragons enragés ou d''Alicia de Lamb tous les cinq à sept, l''araignée éclipsante aurait bien du mal à gagner le respect de ses monstrueux collègues, si elle n''avait la capacité de se téléporter en un clin d’œil à n''importe quel endroit de son champ de vision. Loin de ton épée. Hors de portée de ton arc. Làààà !! derrière, dans ton dos… ah, criss, trop tard...<br /><br />\r\n\r\n		« <em>Encore une putain d''araignée !! J''en ai marre des araignées !! AAAAAAAAAH !! </em>», Pourquoi j''ai mangé mon pied avant de me taper la tête contre un arbre en chantant, de Suma Dartson</p>', 3, 12),
(7, 'Fourmi guerrière géante', 'fourmi guerriere geante', 'fourmi.jpg', '<p>Malgré sa taille qui peut atteindre plusieurs coudées de haut, la Fourmi Guerrière Géante ne semble pas extrêmement menaçante sauf pour les plus frêles combattants. Cependant, cette mignonne bestiole couverte d’une carapace d’un noir profond compte bien plus sur la vie en société que sur sa force propre. Les Fourmis Guerrières ont en effet développé une technique redoutable de chasse en groupe afin de protéger leur nid, et surtout leur reine pour laquelle elles se battront jusqu’à la mort. En peloton d’une douzaine d’individus, ces insectes défendent leur tanière avec acharnement et ne sont pas dénués d’intelligence, ils ont même développé une certaine faculté magique assimilable aux Arcanes Mineures; chacun, lorsqu’il se sent menacé, a bien vite fait d’appeler ses compagnes à la rescousse qui ne tardent pas à l’épauler dans le combat.<br /><br />\r\n\r\n		« <em>Flûte alors ! Encore des fourmis qui viennent boulotter mon cheval ! </em>» De la Nature et des Joies du Pique - nique, de Luc de Retz</p>', 3, 12),
(8, 'Fourmi reine', 'fourmi reine', 'fourmi.jpg', '<p>La Reine Fourmi est la première cause des infestations d''insectes géants sur les terres de Nacridan. D''une grande intelligence, ces créatures sont heureusement rares : capables de pondre des centaines de combattantes en quelques jours, elles peuvent réellement faire apparaître des armées entières de fourmis guerrières, qui les défendront jusqu''à la mort, voire, si un nécromancien passe par-là, après celle-ci. Fondamentalement, la fourmi, fût-elle géante, n''est pas très dure à tuer, mais, hélas, elles sont fichtrement nombreuses. En outre, leur reine est capable d''émettre des phéromones d''une grande puissance, qui rendent littéralement folles furieuses les guerrières. Handicapée par son gigantisme et le poids de sa lourde cuirasse de chitine aux tons d''ébène et d''argent, la Reine Fourmi est parfois vulgairement appelée « outre à expérience » par les jeunes aventuriers, mais de toute façon, ces gens-là ne respectent plus rien, ça n''était pas pareil de mon temps, hein mâme Durant.<br /><br />\r\n\r\n		« <em>Avec la masse d''arme Tonfa, réglés, tes problèmes de fourmis ! Approuvé par les services de sécurité de la Fédération ! Également utile pour le contrôle des foules </em>» Réclame parue dans La Vraie Vérité, magazine de la Fédération des Peuples Libres.</p>', 3, 12),
(9, 'Homme-Lézard', 'homme-lezard', 'homme-lezard.jpg', '<p>Les Hommes-Lézards forment un peuple étrange. Des légendes racontent qu’ils proviendraient de lointaines îles à l’est de Nacridan mais hormis les corsaires de Dust, rares sont ceux qui parviennent à en revenir, malgré les multiples expéditions menées en vue de se saisir des fabuleuses réserves de perles que recéleraient leurs atolls d’origine. Bien qu’inhumaine, leur civilisation est pourtant avérée : ils possèdent leur propre langage sacré, mais parlent aussi la langue des races aînées, bâtissent des constructions gigantesques dans les marais et les jungles qu’ils affectionnent, vénèrent des dieux terribles et sont prêts à dépecer leur prochain pour quelques piécettes d’or. <br /><br />\r\n\r\n		Bien que bipède, l’Homme-Lézard ressemble plutôt à un varan qu’à un homme, avec sa peau écailleuse verdâtre et ses grands yeux glauques, ses mains palmées et sa gueule proéminente munie d’une multitude de fines dents acérées. Lorsque, poussés par la surpopulation, par leur goût du lucre ou afin d’honorer dignement leurs puissances divines, ils sortent en troupes effrénées de leur repaire, montant dans leurs longs bateaux-serpents pour fondre sur les côtes de Nacridan, ils constituent une réelle menace pour les villages côtiers, tant leur cruauté est grande. <br /><br />\r\n\r\n		En dépit des efforts des corsaires de Dust et des seigneurs de la Grève Lointaine, ils prélèvent trop souvent dans les chaumières de pauvres victimes afin de les offrir en sacrifice à Rastapoulatepec, leur sombre et sanglante divinité tutélaire. Seuls, ils se montrent non moins perfides et abominables. Leur langue fourchue darde des sarcasmes persifleurs tandis qu’ils comptent sur leur haute stature et sur leurs puissants membres griffus pour leur assurer l’avantage sur leur victime, qu’ils dépouilleront consciencieusement de tous ses biens une fois leur forfait accompli.<br /><br />\r\n\r\n		« <em>Mon habitude n’est pas de faire d’amalgames, mais il faut bien reconnaître que ces hordes d’hommes - lézards posent un sérieux problème de sécurité. Un Homme - Lézard, ça va. C''est quand il y en a plusieurs que ça pose des problèmes !</em>» Discours d’investiture d''El Zvountz comme Maître de Chasse à la Fédération des Peuples Libres.</p>', 5, 15),
(10, 'Mange-coeur', 'mange-coeur', '', '<p>À la fois prêtres, guerriers et stratège, les Mange-Cœurs à l''éclatante collerette sont les commandants des hommes-lézards, désignés par ces guerriers pour mener le raid sur les terres adverses, et oints par les grands prêtres de Rastapoulatepec, le dieu au cœur noir. Tout homme-lézard peut en droit être Mange-Cœur, mais dans les faits, l''admiration de ces guerriers devant être obtenue, ce sont en général les plus coriaces et les plus forts des leurs qui obtiennent cet honneur. Une certaine aisance est également nécessaire pour payer les provisions et le bateau serpent qui mènera le raid. <br /><br />\r\n\r\n		Portant des semi-armures somptueusement décorées aux couleurs sanglantes du dieu lézard, les Mange-Cœurs affectionnent en général des armes tarabiscotées aux lames étranges, dont le poids et la taille symbolisent leur force et leur ascendant psychologique sur l''ennemi. Rares sont ceux en effet parmi les races aînées qui ne peuvent se cacher d''un léger frémissement – voire d''une légère humidité au niveau des chausses – en voyant débouler soudain du sous-bois une horde mugissante et sifflante de monstres plus grands que des hommes, brandissant sabres et haches, dans le but de massacrer tout le monde, et, détail cocasse, de dévorer leur cœur. Assez littéralement : le cœur des ennemis morts – voire encore vivants – étant considéré comme un mets de choix. Il n''est pas rare, d''ailleurs, de voir un Mange-Cœur accomplir ce fait au beau milieu d''un champ de bataille. C''est même le meilleur moment pour mettre fin à ses méfaits d''un bon coup de lance bien placé, mais curieusement, la majorité des conscrits ne sont pas pressés de l''approcher. <br /><br />\r\n\r\n		« <em>- Ssss''… Je vaisss manger votre cœur !! Mouhahahaaaaargll.<br />\r\n		- Se vanter ou tuer, il faut choisir </em>», Apocryphes de Bataille, de Jorel Tapeau.</p>', 5, 15),
(11, 'Araignée sabre', 'araignee sabre', 'araignee-sabre.jpg', '<p>Pour être dépourvue de venin, cette araignée aussi grande qu''un homme n''en est pas moins redoutable. Outre son apparence absolument répugnante, qui est susceptible de faire flancher les cœurs les plus solides, cette créature massive au torse trapu est un adversaire coriace : recouverte d''épaisses plaques de chitine brunâtre, elle est capable de se déplacer à une vitesse foudroyante, usant de ses pattes antérieures comme de véritables armes de guerre dont les bords sont plus tranchants que des rasoirs et aussi solides que de l''acier. Dressée sur ses pattes postérieures, si elle ne vous a pas déjà sournoisement poignardé dans le dos, l''Araignée Sabre utilise ses lames pour combattre ses rivales comme pour tuer ses proies.<br /><br />\r\n\r\n		Quant à la protection d’une armure pour se garantir de ses assauts, il ne faut pas y compter : ses coups transpercent le cuir bouilli et la maille comme du lin. Seule une épaisse plate pourra avoir quelque chance d’y résister. Si les jeunes araignées sont faciles à défaire, les plus âgées sont d''une taille colossale et leur science du corps à corps est immense. Dans tous les cas, il est vivement recommandé de se tenir à distance et de s''en servir comme cible de tir à l''arc.<br /><br />\r\n\r\n		« <em>Messire, vite, messire ! Elle arrive !!!<br />\r\n		– Roh, deux secondes, la corde de l''arbalète vient de lâcher...</em> »<br />\r\n		Dernières paroles de Godefroy de Noirmarée et de son écuyer, Hughes de Père inconnu, in <eM>Vie inutiles</em>, de Plute Orque.</p>', 5, 15),
(12, 'Araignée piégeuse', 'araignee piegeuse', 'araignee-piegeuse.jpg', '<p>Une immense araignée aussi haute qu’un nain et deux fois plus large, noire et velue, sur laquelle se dessine d’un jaune tranchant l’image morbide d’une tête de mort, telle est l’Araignée Piégeuse. Elle se tient bien souvent tapie dans l’ombre d’une grotte ou dans de vastes terriers qu’elle creuse à même le sol. Mais son ouïe est si fine qu’elle est capable de repérer sa proie à des lieues à la ronde. Ses yeux aux multiples facettes luisent d’un regard maléfique lorsqu’elle s’élance sur sa cible, brillant d’un rouge vif et signifiant à sa future victime «<em> il est trop tard </em>». <br /><br />\r\n\r\n		Maligne en diable, furtive et insidieuse, l’araignée piégeuse s’y entend à isoler les groupes de voyageurs avant d’envoyer chaque individu dans un trou garni de ses toiles où elle pourra les dévorer tranquillement. Perpétuellement affamée, cette araignée est toujours si avide de chair fraîche que seuls les elfes des profondeurs, dit-on, sont parvenus à en dresser comme montures pour la chasse et la guerre. Malheur à qui croise alors leur chemin ! Ses griffes sont aussi féroces que son appétit, et son intelligence maléfique en fait une chasseresse redoutable.<br /><br />\r\n\r\n		« <em>J’étais coincé au fond de son puits, et je voyais ses grands yeux rouges surmontant des mandibules terribles qui se rapprochaient. Heureusement, j’avais dû renoncer à mon bain annuel à cause de l’enterrement de la tante Gudrun, sinon elle m’aurait boulotté tout cru. L’araignée, pas la tante, quoique... </em>»<br />\r\n		Le Testament des Héros Perdus de Balin le Brave</p>', 5, 15),
(13, 'Âme en peine', 'ame en peine', 'amepeine.jpg', '<p>Il est des rages si grandes. Il est des âmes si noires. Il est des êtres si torturés, des colères si terribles, que la Mort même ne parvient pas à apaiser ces malheureux. Frappés d''un anathème au-delà de la compréhension des hommes, leurs âmes torturées sont condamnées à errer par-delà les frontières des Plaines Ombreuses, bien après que leurs corps sont revenus à la terre, et leurs os dispersés. Quelle que soit la raison de leur éternelle errance, les âmes en peine hantent les lieux qui les ont vues périr, brûlant d''une haine inextinguible pour les êtres de chair et de sang sur lesquelles elles ne manquent pas d''exercer une vengeance sanglante sitôt qu''elles le peuvent. Ces formes éthérées semblent constituées d''une brume grisâtre à la phosphorescence malsaine, et rampent dans les airs accompagnées d''un murmure aussi inaudible qu''atroce. Si elles ne représentent pas, stricto sensu, un très grand danger du fait de leur débilité physique, leur manie de traverser les obstacles et de surgir sans crier gare, attaquant à outrance et sans aucun discernement tous ceux qui croisent leur chemin, les rendent redoutables pour les nerfs – et les vessies – les moins solides. <br /><br />\r\n\r\n		Maître Rodroc, un vieux routard, se souvient : « <em>C''était atroce ; j''étais en train d''inventorier les possessions matérielles de feu un marchand qui venait de faire une mauvaise rencontre, le pauvre, quand j''ai entendu des cris de rage déments et que j''ai vu deux yeux injectés de sang qui me fondaient dessus. Mais en fait, ce n''était qu''Alicia de Lamb.</em> »</p>', 5, 15),
(14, 'Fantôme', 'fantome', 'fantome.jpg', '<p>Cet esprit inapaisé a trouvé une mort en général aussi brutale que sanglante dans quelque coin perdu de l''Ile, de préférence les ruines romantiques d''un vieux château sur une falaise au bord de la mer ou une vieille auberge qui servait de repère à des brigands sanguinaires. \r\n\r\n		Depuis sa mort, il hante les lieux qui l''ont vu périr, se réjouissant de l''arrivée de quelques insouciants inconnus, en les effrayant par ses gémissements, cris de souffrances, et autres piaulements infâmes les humains qui s''en approchent trop. Il peut même se révéler dangereux, en descellant sciemment des pierres. Les modèles un peu supérieurs sont même capables de manier avec une violence redoutable de lourdes chaînes rouillées dont ils se servent comme d''un fléau d''arme, utilisant les capacités de leur ectoplasme pour esquiver les coups reçus en échanges...<br /><br />\r\n\r\n		«<em>Essentiellement, toute l’agressivité d''un revenant réside dans ce que je pourrais appeler l''habitus du trauma, vous voyez ?...<br />\r\n		–Hou hou ! <br />\r\n		–Alors, parlez –moi donc un peu de votre mort, M. Jean sans Corps, vous voulez bien ?</em>» Introduction à la psychanalyse ectoplasmique, Siggi Lakhan</p>', 8, 18),
(15, 'Esprit terrifiant', 'esprit terrifiant', 'esprit-terrifiant.jpg', '<p>Bien que peu le sachent, l’Esprit Terrifiant est un mélomane. Avant tout adepte du Sombre Barde Oggy Obbourne, il se plaît à accompagner son arrivée de musiques lancinantes et sataniques jouées sur des gammes impossibles. Mais cette mélopée funeste n’est rien comparée à son apparence. Évanescent dans les ténèbres, enveloppé de miasmes d’une couleur noirâtre digne du plus profond d’Outre-Styx, il répand un froid glacial autour de lui; et seuls ses yeux mortifères apparaissent parfois parmi les sournoises volutes de ce qui fut jadis un corps. <br /><br />\r\n\r\n		Il s’aventure de nuit près des arbres desséchés ou dans les demeures qui ont vu son trépas, profitant des ténèbres pour insuffler d’horribles cauchemars aux occupants en leur chantant ses complaintes sinistres. Quasiment invisible dans la pénombre, ses yeux se repaissent alors du pauvre hère égaré entre le sommeil et la veille, entre la vie et la mort. Une panique incontrôlable accompagne son apparition, et plus d’un valeureux guerrier a lâché son arme et mouillé ses chausses en s’enfuyant devant l’Esprit Terrifiant.<br /><br />\r\n\r\n		« <em>Un esprit terrifié est déjà à moitié mort. Pour qui se soucie du travail bien fait, il ne reste plus qu’à achever la tâche.</em>» Ethique au Nécromant de Dame Mordsith.</p>', 8, 18),
(16, 'Doppleganger', 'doppleganger', 'doppleganger.jpg', '<p>Le Doppleganger est une créature décidément très étrange… Nul ne sait d’où il provient et nul ne saurait non plus prédire son comportement. Est-il la fabrication d’un mage dément ou l’incarnation d’un esprit de la forêt particulièrement perfide ? Sous sa forme originelle, le Doppleganger se présente comme une frêle créature à la peau grisâtre. Son visage dépourvu de traits n’est adouci que par deux grands yeux pâles comme la lune où semblent luire des questions enfantines. Mais gare à qui se laisserait aller aux sentiments ! Le Doppleganger se montre un redoutable étrangleur, enserrant dans ses mains noueuses le cou de ses proies dans une étreinte fatale. Il se plaît alors à changer son apparence en celle de sa victime, parfois durant des mois, imitant à la perfection son caractère et ses habitudes, jusqu’au jour où il jette son dévolu sur une nouvelle cible. Celle-ci, souvent abusée par les talents de métamorphe de la créature, se retrouve ainsi un beau jour rapidement étranglée à son tour. De nombreux témoignages rapportent qu’ainsi des familles et des guildes entières ont été décimées.<br /><br />\r\n\r\n		«<em> Tiens, mademoiselle des Eaux d’Hêt, c’est fooormidable comme vous me rappelez quelqu’un, mais qui ? </em>» <br />\r\n		Souvenirs de Magda Layne, de P. Rouste</p>', 10, 20),
(17, 'Assassin runique', 'assassin runique', 'assassin-runique.jpg', '<p>Produit de conjurations antiques et de sacrifices humains plus ou moins sanglants, l''Assassin Runique est un humanoïde élancé, au teint pâle comme le lait, à la tête étrangement chauve et boursouflée, dépourvue de bouche et de nez, et aux longs doigts graciles. Ses yeux noirs sont ternes et immobiles comme le néant des Contrées de l''Ombre. Il a une dague dans la main. Aucune porte ne le retiendra, aucune muraille ne ralentira son pas coulé et gracieux. Aucun volet ne détournera son regard fixe. Il est venu pour vous.<br /><br /> \r\n\r\n		Censés disparaître proprement une fois leur méfait accompli, les Assassins Runiques étaient autrefois très à la mode : on se les arrachait, depuis les milieux nécromanciens de Néphy, qui s''en servaient comme carton d''invitation, jusqu''aux riches nobles d''Artasse, qui ne voyaient pas d''objection à en lancer un sur un rival, une fois convenablement vêtu bien sûr. Toutefois, l''usage tend à se perdre aujourd’hui, et c''est bien regrettable… En effet, notoirement imparfaite, la conjuration qui donne naissance à l''Assassin Runique ne parvient pas dans tous les cas à l’ assujettir à sa mission, et un nombre important y échappe et erre éternellement dans les terres de Nacridan. Dépourvus de réel esprit, ils accomplissent alors dûment ce pourquoi ils sont venus à la « vie », jusqu''à ce qu''une épée ou un sort ne vienne finalement mettre un terme à cette triste existence.<br /><br />\r\n\r\n		« <em>Des volutes bleutées du brasero surgit la pâle forme de l’Assassin. Le Grand Mage l’aspergea copieusement de son mystérieux mélange soigneusement broyé en une fine poudre mais la chose eut tôt fait de s’enfuir par la fenêtre – Mince, encore raté, j’ai dû mettre trop de sel ! </em>», extrait de La prise de risque dans l''art des soins magiques, d''Aé Li.</p>', 10, 20),
(18, 'Ange noir', 'ange noir', 'ange-noir.jpg', '<p>Au temps de la grandeur de Landar, nombreux étaient les prêtres-sorciers habiles à manier les puissances des ténèbres, créant et soumettant à leur pouvoir de nombreux êtres. Parmi les plus craints de leurs esclaves étaient les sinistres Anges Noirs, créatures impalpables faites de fumée obscure, et de malheur. Ombres parmi les ombres, les Anges Noirs portaient sans bruits ni murmures la sentence mortelle, frappant l''impie sans que pierre, fer ou flamme ne puisse l''arrêter. Difficile et coûteuse était leur création, et plus dur encore de les maintenir sous contrôle. <br /><br />\r\n\r\n		Il n''était pas rare de voir une créature se retourner contre son maître et fuir dans les ténèbres en dessous du monde, se nourrissant de la peur et du désespoir. On dit que, par les nuits sans lune, certains des Anges remontent par des chemins noirs et cachés, inconnus des mortels, en quête de victimes pour apaiser leur soif inextinguible.</p>', 10, 25),
(19, 'Gobelin', 'gobelin', 'gobelin.png', '<p>Petit, nerveux, et méchant, le gobelin aurait tout pour faire un excellent président de la République (de Tonak, bien sûr), s''il n''était aussi vert que faible et pleutre. Ne se déplaçant jamais qu''en vastes bandes, les gobelins sont méprisés sans vergogne par toutes les autres peuplades de Nacridan. Toutefois, ils sont loin d''être bêtes ; et nombreux sont ceux qui survivent dans l''ombre de grands seigneurs trolls ou orques en assurant des tâches vitales, telles que comprendre les mots longs de plus de deux syllabes ou compter les pièces d''or du dernier butin. Ce sont également des voleurs assez compétents, et des archers potables, qui peuvent profiter de leur grand nombre pour ensevelir l''ennemi sous une pluie de flèches.<br /><br />\r\n\r\n		«<em>Sha''llaback hi hi hikk Shologlogoobb !</em>» Aria du premier acte de Sosi fanglobglob Tutigalbrr, opéra gobelin en V actes et trois interludes.</p>', 15, 25);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `pass_md5` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `login`, `pass_md5`) VALUES
(1, 'adminUO', '1136b2610ea0f7d87a950371326a205b '), /*Piou*/
(2, 'Admin', 'cd13c40674411f4480040590d08e9035'); /*Mouahaha*/

-- --------------------------------------------------------

--
-- Structure de la table `mm`
--

CREATE TABLE IF NOT EXISTS `mm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` float NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `monstres`
--

CREATE TABLE IF NOT EXISTS `monstres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `niveau` tinyint(4) NOT NULL,
  `id_Att` int(11) NOT NULL,
  `id_Def` int(11) NOT NULL,
  `id_PV` int(11) NOT NULL,
  `id_MM` int(11) NOT NULL,
  `id_Armure` int(11) NOT NULL,
  `id_Degat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pv`
--

CREATE TABLE IF NOT EXISTS `pv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nb` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
