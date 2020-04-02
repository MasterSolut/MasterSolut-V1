/*
Navicat MySQL Data Transfer

Source Server         : Xampp
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mastersolut_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-25 02:52:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `abonner_newsletters`
-- ----------------------------
DROP TABLE IF EXISTS `abonner_newsletters`;
CREATE TABLE `abonner_newsletters` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL DEFAULT '',
  `visible_abonner` varchar(1) NOT NULL DEFAULT 'o',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of abonner_newsletters
-- ----------------------------

-- ----------------------------
-- Table structure for `album`
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id_album` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `titre_album` varchar(255) NOT NULL,
  `libelle_album` text,
  `id_section` int(12) NOT NULL,
  `position_album` int(1) NOT NULL,
  `frontal_album` varchar(1) DEFAULT NULL,
  `publier_album` varchar(1) NOT NULL,
  `visible_album` varchar(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('1', 'Album Accueil', 'Accueil', '3', '1', 'o', 'o', 'o');
INSERT INTO `album` VALUES ('2', 'Album Partenaire 1', 'Album Partenaire 1', '5', '1', '', 'o', 'o');

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id_article` int(5) NOT NULL AUTO_INCREMENT,
  `titre_article` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `libelle_article` text CHARACTER SET utf8,
  `position_article` tinyint(2) DEFAULT NULL,
  `autres_article` varchar(255) NOT NULL,
  `fichier_article` varchar(255) DEFAULT NULL,
  `image_article` varchar(255) NOT NULL,
  `contenu_article` text CHARACTER SET utf8 NOT NULL,
  `id_smenu` int(1) NOT NULL,
  `visible_accueil` varchar(15) DEFAULT NULL,
  `publier_article` varchar(1) NOT NULL DEFAULT 'o',
  `visible_article` varchar(1) DEFAULT 'o',
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', 'DÃ©veloppement Web', '70 000F CFA', '2', '3 mois', 'Crationdesiteinternet1485235517.jpg', '', '<p style=\"text-align: justify;\">\r\n	&nbsp;Vous savez vous servir d\'un ordinateur, vous ne souhaitez pas vous faire mal &agrave; la t&ecirc;te et apprendre les langages php/mysql ou html, cette formation vous permet en quelques jours, de\r\n	cr&eacute;er un site Internet dynamique et professionnel aux multiples fonctionnalit&eacute;s.\r\n</p>\r\n<div>\r\n	<div style=\"text-align: justify;\">\r\n		PR&Eacute;-REQUIS :\r\n		<strong>\r\n			Aucun. La culture Windows (fen&ecirc;tre, menu, clic, double-clic) est conseill&eacute;e.\r\n		</strong>\r\n	</div>\r\n	<div style=\"text-align: justify;\">\r\n		PUBLIC :\r\n		<strong>\r\n			Ce cours concerne toute personne d&eacute;sirant r&eacute;aliser un site Web avec les technologies actuelles ou souhaitant disposer d\'une &quot;culture Web&quot; concr&egrave;te.\r\n		</strong>\r\n	</div>\r\n</div> ', '1', '', 'o', 'o');
INSERT INTO `article` VALUES ('2', 'DÃ©veloppement Mobile', ' 160 000F CFA', '2', '3 mois', 'DveloppementMobile1485236194.png', '', '<p style=\"text-align: justify;\">Cette formation D&eacute;veloppement Mobile vous permettra de r&eacute;aliser des applications ou des sites Web pour mobile uniquement avec des technologies standards comme HTML, CSS, et JavaScript</p>\r\n<p style=\"text-align: justify;\">PR&Eacute;-REQUIS :&nbsp;<strong>Connaissance de l\'environnement web et des supports mobiles.</strong></p>\r\n<p style=\"text-align: justify;\">PUBLIC :&nbsp;<strong>Webmanager, webmarketer, webmaster, Graphiste, chef de projet digital, chef de projet mobile.</strong></p>', '1', '', 'o', 'o');
INSERT INTO `article` VALUES ('3', 'INFOGRAPHIE', '70 000F CFA', '1', '', 'INFOGRAPHIE1480592899.jpg', '', '<p>&nbsp;En cours</p>', '2', '', 'n', 'o');
INSERT INTO `article` VALUES ('4', 'Initiation en Entrepreneuriat', '20 000F CFA', '1', '1 mois', 'InitiationenEntrepreunariat1485241954.png', '', '<p>&nbsp;en cours</p>', '3', '', 'o', 'o');
INSERT INTO `article` VALUES ('5', 'Site web', 'fa linefont-globe hvr-icon-drop', '1', '', null, '', '<div style=\"text-align: justify;\"><b><span style=\"color: rgb(0, 128, 128);\"><font size=\"3\">&nbsp;Votre entreprise est unique, votre site web aussi.</font></span></b></div>\r\n<div style=\"text-align: justify;\">Un site web permet de vous faire conna&icirc;tre, de faire conna&icirc;tre votre entreprise et vos valeurs. Le site web est devenu la premi&egrave;re source d&rsquo;information des consommateurs sur une marque, le site web est la passerelle entre vous et vos clients.</div>', '4', '', 'o', 'o');
INSERT INTO `article` VALUES ('6', 'Applications Web', 'fa linefont-screen-desktop hvr-icon-drop', '2', '', null, '', '<p style=\"text-align: justify;\"><span style=\"color: rgb(0, 128, 128);\">&nbsp;<b><font size=\"3\">Comprendre vos processus m&eacute;tiers pour mieux les rationaliser.</font></b></span></p>\r\n<div style=\"text-align: justify;\">Une application web est un logiciel accessible depuis un navigateur web. Une application automatise des processus m&eacute;tiers, l&rsquo;application web permet en plus un support multiplateforme et une accessibilit&eacute; permanente.</div>', '4', '', 'o', 'o');
INSERT INTO `article` VALUES ('7', 'Ergonomie', '', '1', '', 'Ergonomie1485016330.jpg', '', '<p>&nbsp;<b><font size=\"2\">De l\'ergonomie &agrave; la simplicit&eacute; d\'usage.</font></b></p>\r\n<div>Si un site vous parait simple et agr&eacute;able, c\'est que le travail d\'ergonomie y a &eacute;t&eacute; bien fait. L\'intuitivit&eacute; d\'un site n\'est pas le fruit du hasard, mais bien d\'un travail de fond entre vos utilisateurs, vous et notre ergonome.&nbsp;</div>', '5', '', 'o', 'o');
INSERT INTO `article` VALUES ('8', 'CrÃ©ation graphique', '', '2', '', 'Crationgraphique1485016040.png', '', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><hgroup>\r\n<div><b><font size=\"3\">Refl&eacute;tez vos valeurs dans votre application.</font></b></div>\r\n</hgroup></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div>La cr&eacute;ation graphique reprend vos couleurs, votre charte graphique et surtout votre identit&eacute;. Le design singularisera votre application web et personne n&lsquo;oubliera votre service.</div>', '5', '', 'o', 'o');
INSERT INTO `article` VALUES ('9', 'IntÃ©gration', '', '3', '', 'Intgration1485014036.jpg', '', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><hgroup>\r\n<div><b><font size=\"3\">&nbsp;La passerelle entre le design et le web.</font></b></div>\r\n</hgroup></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div>L\'int&eacute;gration transforme le plus fid&egrave;lement possible le design en page internet. L\'int&eacute;gration permet d\'obtenir des pages compatibles avec tous les navigateurs qui sont ensuite utilis&eacute;es par le d&eacute;veloppeur.</div>', '5', '', 'o', 'o');
INSERT INTO `article` VALUES ('10', 'MODERN', '', '3', '', null, '', '<p>&nbsp;EN COURS</p>', '5', '', '', 'n');
INSERT INTO `article` VALUES ('11', 'Web Design', 'fa fa-tablet hvr-icon-drop', '1', '', null, '', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus sollicitudin pellentesque et non erat.</p>', '6', '', 'o', 'o');
INSERT INTO `article` VALUES ('12', 'Online marketing', 'fa fa-line-chart hvr-icon-drop', '2', '', null, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus sollicitudin pellentesque et non erat.\r\n													', '6', '', 'o', 'o');
INSERT INTO `article` VALUES ('13', 'Branding', 'fa fa-codepen hvr-icon-drop', '3', '', null, '', '<p>&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus sollicitudin pellentesque et non erat.</p>', '6', '', 'o', 'o');
INSERT INTO `article` VALUES ('14', 'DÃ©veloppement', '(+228) 90 08 67 17', '2', '', 'Dveloppement1485120004.png', '', '', '9', '', 'o', 'o');
INSERT INTO `article` VALUES ('15', 'Design', '(+228) 93 03 90 27', '1', '', 'Design1485119931.jpg', '', '', '9', '', 'o', 'o');
INSERT INTO `article` VALUES ('16', 'Gestion de projet', '(+228) 90 33 74 53', '3', '', 'Gestiondeprojet1485035878.jpg', '', '', '9', '', 'o', 'o');
INSERT INTO `article` VALUES ('17', 'Notre Vision', '', '2', '', null, '', '<div style=\"text-align: justify;\">Notre vision est la satisfaction totale de nos partenaires par une ma&icirc;trise de leurs besoins et la qualit&eacute; de nos services.</div>\r\n<div style=\"text-align: justify;\">En effet, notre objectif est de construire des relations solides et durables avec nos clients, bas&eacute;es sur la confiance mutuelle, le partenariat et l\'&eacute;change. Nous mettons l\'accent sur la compr&eacute;hension des m&eacute;tiers de nos clients dans le but d&rsquo;apporter des solutions adapt&eacute;es et sp&eacute;cifiques pouvant r&eacute;pondre &agrave; leurs attentes.</div>', '7', '', 'o', 'o');
INSERT INTO `article` VALUES ('18', 'Notre Mission', '', '3', '', null, '', '<p style=\"text-align: justify;\">La mission de&nbsp;<strong>MasterSolut</strong> est de vous fournir des services professionnels de la plus grande qualit&eacute;, afin de vous permettre de rencontrer pleinement vos objectifs. Notre esprit d&rsquo;&eacute;quipe et d&rsquo;int&eacute;grit&eacute; contribuent ainsi &agrave; d&eacute;velopper une nouvelle approche du secteur des TI.</p>\r\n<p style=\"text-align: justify;\">Accompagner les entreprises par l&rsquo;innovation de services &agrave; valeur ajout&eacute;e en s&rsquo;appuyant sur les TIC (Ordinateurs, les technologies, les Mobile phones, l&rsquo;internet, les tablettes, Interconnexion....)</p>', '7', '', 'o', 'o');
INSERT INTO `article` VALUES ('19', 'Nos Valeurs', '', '4', '', null, '', '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>', '7', '', 'n', 'o');
INSERT INTO `article` VALUES ('20', 'HÃ©bergement', 'fa linefont-layers hvr-icon-drop', '3', '', null, '', '<p style=\"text-align: justify;\">&nbsp;Votre site ou application web a des besoins mat&eacute;riels modestes et n\'a pas de criticit&eacute; particuli&egrave;re. Vous avez toutefois besoin d\'avoir quelqu\'un en ligne en cas de p&eacute;pin ou simplement pour un conseil.</p>\r\n<div>Nous pr&eacute;conisons dans ce cas nos offres d\'h&eacute;bergement standard avec support de priorit&eacute; normale</div>', '4', '', 'o', 'o');
INSERT INTO `article` VALUES ('21', 'Applications iPhone', 'fa-mobile ', '6', '', null, '', '<p style=\"text-align: justify;\">&nbsp;<b><font size=\"3\">Nouveau formats et diff&eacute;rents usages.</font></b></p>\r\n<div>Le d&eacute;veloppement mobile explose ces derni&egrave;res ann&eacute;es. Le mobile devient un support privil&eacute;gi&eacute; pour consulter des sites web ou des applications, surtout en mobilit&eacute;. Pour une marque, il est aujourd&rsquo;hui impensable de passer &agrave; c&ocirc;t&eacute; de ce nouveau format.</div>', '4', '', 'o', 'o');
INSERT INTO `article` VALUES ('22', 'Applications iPad', 'fa-tablet', '5', '', null, '', '<p style=\"text-align: justify;\">&nbsp;<b><font size=\"3\">Les tablettes entrent dans l&rsquo;entreprise.</font></b></p>\r\n<div>Les tablettes connaissent un d&eacute;veloppement fort en entreprise. Chacun a compris l&rsquo;utilit&eacute; et la simplicit&eacute; d&rsquo;usage. En r&eacute;union, dans le train ou lors d&rsquo;une d&eacute;monstration produit, les applications sur tablettes se pr&ecirc;tent id&eacute;alement &agrave; ces circonstances.</div>', '4', '', 'o', 'o');
INSERT INTO `article` VALUES ('23', 'Site mobile', 'fa-dribbble ', '4', '', null, '', '<p>&nbsp;<b><font size=\"3\">Un m&eacute;dia adapt&eacute; &agrave; tous les terminaux.</font></b></p>\r\n<div>Les internautes acc&egrave;dent de plus en plus au web depuis leur smartphone. Les nouveaux usages imposent de penser &agrave; un site accessible depuis le mobile. Si votre site n\'est pas optimis&eacute; mobile, c&rsquo;est un usager qui ne reviendra plus depuis son smartphone, mais peut &ecirc;tre &eacute;galement depuis son ordinateur</div>', '4', '', 'o', 'o');
INSERT INTO `article` VALUES ('24', 'Qui sommes nous?', '', '1', '', null, '', '<p style=\"text-align: justify;\"><strong>MasterSolut</strong>&nbsp; est une soci&eacute;t&eacute; de prestation des services &nbsp;et &nbsp;de commercialisation des produits &nbsp;informatiques bas&eacute;e au Togo. Nous offrons aux entreprises dans la sous-r&eacute;gion , notamment au Togo, au B&eacute;nin, Camerroun, et partout ailleurs, des solutions informatiques adapt&eacute;es &agrave; leur besoin.</p>\r\n<p style=\"text-align: justify;\">Notre objectif principal est d&rsquo;accompagner tout nos partenanires en mettant notre expertise &agrave; leur disposition pour la r&eacute;alisation de leur projet en mati&egrave;re de technologies de l&rsquo;information et de la communication, avec des outils innovants et fiables.</p>\r\n<div style=\"text-align: justify;\">&nbsp;</div>', '7', '', 'o', 'o');
INSERT INTO `article` VALUES ('25', 'Initiation Ã  l\'Informatique', '25 000F CFA', '1', '2 mois', 'InitiationenInformatique1485234532.jpg', '', '<p style=\"text-align: justify;\">Cette formation s\'adresse &agrave; toute personne d&eacute;butante voulant acqu&eacute;rir les bases de l\'informatique ou &ecirc;tre plus autonome dans l&rsquo;utilisation d&rsquo;un PC.</p>\r\n<p style=\"text-align: justify;\">Cette formation comprend&nbsp;: La ma&icirc;trise de l&rsquo;interface Windows, l&rsquo;utilisation d&rsquo;un traitement de texte avec Word, l&rsquo;introduction au tableur avec Excel, la gestion de mails avec Outlook, le maniement du navigateur Internet explorer, les principales fonctions de Powerpoint.</p>', '1', '', 'o', 'o');
INSERT INTO `article` VALUES ('26', 'Conception graphique', '60 000 FCFA', '2', '3 Mois', 'Conceptiongraphique1485239560.jpg', '', '', '2', '', 'o', 'o');
INSERT INTO `article` VALUES ('27', 'Web Design', '180 000F CFA', '3', '12 Mois', 'WebDesign1485239610.png', '', '', '2', '', 'o', 'o');
INSERT INTO `article` VALUES ('28', 'RÃ©daction du Business Plan', '30 000F CFA', '2', '1 Mois', 'RdactionduBusinessPlan1485241975.png', '', '<p style=\"text-align: justify;\">&nbsp;Ce cours permet de comprendre toutes les notions du plan d&rsquo;affaires (business case) et de r&eacute;diger ce document strat&eacute;gique de mani&egrave;re &agrave; s&rsquo;assurer d&rsquo;une bonne communication et du succ&egrave;s du projet. Le cours offre de nombreux exercices avec des techniques qui permettent de valider la qualit&eacute; et la pertinence des &eacute;l&eacute;ments du plan d&rsquo;affaires et de s&rsquo;assurer que les objectifs d&eacute;finis se transforment en b&eacute;n&eacute;fices &agrave; la livraison du projet.</p>', '3', '', 'o', 'o');
INSERT INTO `article` VALUES ('29', 'Entrpreneuriat NumÃ©rique', '80 000F CFA', '3', '3 Mois', 'EntrpreneuriatNumrique1485241851.jpg', '', '<p style=\"text-align: justify;\">&nbsp;Ces formations visent &agrave; susciter et d&eacute;velopper l&rsquo;esprit entrepreneurial des jeunes porteurs de projets et entrepreneurs ainsi qu&rsquo;&agrave; inscrire dans le secteur du num&eacute;rique, &agrave; l&rsquo;&eacute;chelle nationale et internationale, des petites structures innovantes, des entreprises &agrave; fort potentiel et des d&eacute;partements de grandes entreprises</p>', '3', '', 'o', 'o');

-- ----------------------------
-- Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id_config` int(5) NOT NULL AUTO_INCREMENT,
  `nom_site` text CHARACTER SET utf8,
  `url_site` text CHARACTER SET utf8,
  `code_google_map` text CHARACTER SET utf8,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tel_contact` varchar(255) NOT NULL,
  `info_adresse_site` longtext CHARACTER SET utf8,
  `visible_site` varchar(1) NOT NULL DEFAULT 'o',
  `logo_site` text CHARACTER SET utf8 COMMENT 'src_site',
  `favicon_site` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', 'MasterSolut', 'mastersolut.net', '', 'contact@mastersolut.com', '+228 90 33 74 53', 'AdidogomÃ© 04BP1040, LomÃ©-TOGO.', 'o', 'logo_MasterSolut1485006783.png', 'favicon1485006758.PNG');

-- ----------------------------
-- Table structure for `gest_menu`
-- ----------------------------
DROP TABLE IF EXISTS `gest_menu`;
CREATE TABLE `gest_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `lib_menu` varchar(255) NOT NULL,
  `lien_menu` varchar(255) NOT NULL,
  `indice_menu` int(11) NOT NULL,
  `visible` varchar(1) NOT NULL DEFAULT 'o',
  `icone_menu` varchar(255) NOT NULL,
  `id_page` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gest_menu
-- ----------------------------
INSERT INTO `gest_menu` VALUES ('1', 'Panel Menu', 'menu_smenu.php', '1', 'o', '', '2');
INSERT INTO `gest_menu` VALUES ('2', 'Panel Section-Page', 'section_liste.php', '1', 'o', '', '10');
INSERT INTO `gest_menu` VALUES ('3', 'Panel Section-Album', 'section_liste.php', '2', 'o', '', '10');
INSERT INTO `gest_menu` VALUES ('4', 'Panel NewsLetters', 'newsletters_liste.php', '1', 'o', '', '5');
INSERT INTO `gest_menu` VALUES ('5', 'Panel Actualite', 'news_liste.php', '1', 'o', '', '6');
INSERT INTO `gest_menu` VALUES ('6', 'Panel Album', 'album_liste.php', '1', 'o', '', '7');
INSERT INTO `gest_menu` VALUES ('7', 'Panel Configuration', 'config_site_liste.php', '1', 'o', '', '8');
INSERT INTO `gest_menu` VALUES ('8', 'Panel Utilisateur', 'utilisateur_liste.php', '1', 'o', '', '9');
INSERT INTO `gest_menu` VALUES ('9', 'Panel des abonn&eacute;s', 'liste_abonner.php', '2', 'o', '', '5');
INSERT INTO `gest_menu` VALUES ('11', 'Panel Vid&eacute;o', 'video_liste.php', '1', 'o', '', '3');

-- ----------------------------
-- Table structure for `gest_page`
-- ----------------------------
DROP TABLE IF EXISTS `gest_page`;
CREATE TABLE `gest_page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `titre_page` varchar(255) NOT NULL,
  `lib_page` varchar(20) NOT NULL,
  `cat_page` varchar(255) NOT NULL,
  `icone_page` varchar(255) DEFAULT NULL,
  `indice_page` int(11) NOT NULL,
  `visible` varchar(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gest_page
-- ----------------------------
INSERT INTO `gest_page` VALUES ('1', 'Acceuil', 'accueil', 'cs_admin', 'fa fa-home', '1', 'n');
INSERT INTO `gest_page` VALUES ('2', 'Menu', 'menu', 'cs_admin', 'fa fa-list', '3', 'o');
INSERT INTO `gest_page` VALUES ('3', 'Vid&eacute;o', 'video', 'cs_admin', 'fa fa-youtube-play', '7', 'o');
INSERT INTO `gest_page` VALUES ('4', 'Sous-Sous Menu', 'ss_menu', 'cs_admin', '', '3', 'n');
INSERT INTO `gest_page` VALUES ('5', 'NewsLetters', 'posts', 'cs_admin', 'fa fa-envelope-o', '4', 'o');
INSERT INTO `gest_page` VALUES ('6', 'News', 'news', 'cs_admin', 'fa fa-download', '5', 'o');
INSERT INTO `gest_page` VALUES ('7', 'Album', 'album', 'cs_admin', 'fa fa-file-text', '6', 'o');
INSERT INTO `gest_page` VALUES ('8', 'Configuration', 'config', 'cs_admin', 'fa fa-cog', '8', 'o');
INSERT INTO `gest_page` VALUES ('9', 'Utilisateur', 'user', 'cs_admin', 'fa fa-users', '9', 'o');
INSERT INTO `gest_page` VALUES ('10', 'Section', 'section', 'cs_admin', 'fa fa-arrows-alt', '2', 'o');

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT,
  `titre_menu` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `libelle_menu` text CHARACTER SET utf8,
  `position_menu` tinyint(2) DEFAULT NULL,
  `fichier_menu` varchar(255) DEFAULT NULL,
  `contenu_menu` longtext,
  `id_section` int(1) NOT NULL,
  `publier_menu` varchar(1) NOT NULL DEFAULT 'o',
  `affiche_acceuil` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `visible_menu` varchar(1) DEFAULT 'o',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'SOCIETE', '', '1', null, '', '2', 'o', 'societe', 'o');
INSERT INTO `menu` VALUES ('2', 'SERVICES', '', '2', null, '', '2', 'o', 'services', 'o');
INSERT INTO `menu` VALUES ('3', 'NOS FORMATIONS', '', '3', null, '', '2', 'o', 'formations', 'o');
INSERT INTO `menu` VALUES ('4', 'METHODOLOGIE DE MASTERSOLUT', 'Travaillons ensemble au succÃ¨s de vos applications web et mobile !', '1', null, '', '4', 'o', ' ', 'o');
INSERT INTO `menu` VALUES ('5', 'HÃ©bergement Web SSD', 'CHOISISSEZ VOTRE EDITION', '2', null, '', '4', 'o', ' ', 'o');

-- ----------------------------
-- Table structure for `nature`
-- ----------------------------
DROP TABLE IF EXISTS `nature`;
CREATE TABLE `nature` (
  `id_nature` int(11) NOT NULL AUTO_INCREMENT,
  `lib_nature` varchar(255) NOT NULL,
  `visible_nature` varchar(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`id_nature`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nature
-- ----------------------------

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id_news` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `titre_news` text NOT NULL,
  `publier_news` varchar(1) DEFAULT NULL,
  `contenu_news` longtext NOT NULL,
  `traitement_news` varchar(255) NOT NULL,
  `id_album` int(2) DEFAULT NULL,
  `libelle_news` varchar(255) DEFAULT NULL,
  `visible_news` varchar(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for `newsletters`
-- ----------------------------
DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `id_newsletters` int(5) NOT NULL AUTO_INCREMENT,
  `objet_newsletters` text CHARACTER SET utf8,
  `message_newsletters` longtext CHARACTER SET utf8 NOT NULL,
  `nombre_recu` int(11) NOT NULL,
  `date_newsletters` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible_newsletters` varchar(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`id_newsletters`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of newsletters
-- ----------------------------

-- ----------------------------
-- Table structure for `photo`
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `id_photo` int(10) NOT NULL AUTO_INCREMENT,
  `id_album` int(2) NOT NULL,
  `titre_photo` text CHARACTER SET utf8 NOT NULL,
  `libelle_photo` text CHARACTER SET utf8,
  `src_photo` text CHARACTER SET utf8 NOT NULL,
  `position_photo` int(2) DEFAULT NULL,
  `visible_photo` varchar(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of photo
-- ----------------------------
INSERT INTO `photo` VALUES ('1', '1', 'Une Ã©quipe professionnelle <br/>pour vos projets <br/>Informatiques et TÃ©lecoms', '', 'IMG_10121485303870.JPG', '1', 'o');
INSERT INTO `photo` VALUES ('2', '1', 'Nom de Domaine - HÃ©bergement Web SSD', '', 'images1485304916.jpg', '3', 'o');
INSERT INTO `photo` VALUES ('3', '1', 'DÃ©veloppement d\'applications <br/> web et mobiles', 'C\'est si facile de personnaliser un site web pour vous et vos partenaires.', '61481092191.jpg', '2', 'o');
INSERT INTO `photo` VALUES ('4', '2', 'LilÃ¨guÃ¨', 'www.lilegue.com', 'finale21485187774.png', '1', 'o');
INSERT INTO `photo` VALUES ('5', '2', 'Manwin24', 'www.manwin24.com', 'image11485186826.JPG', '2', 'o');
INSERT INTO `photo` VALUES ('6', '2', 'DiMaRex', 'www.dimarex.com', 'IMG-20170120-WA00101485186875.jpg', '3', 'o');
INSERT INTO `photo` VALUES ('7', '2', 'Etat Togolais', '', 'images1485187273.png', '4', 'o');
INSERT INTO `photo` VALUES ('8', '2', 'UniversitÃ© de LomÃ©', '', 'ul1485187410.jpg', '5', 'o');
INSERT INTO `photo` VALUES ('9', '2', 'FAIEJ', '', 'faiej1485187439.png', '6', 'o');

-- ----------------------------
-- Table structure for `section`
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `id_section` tinyint(6) NOT NULL AUTO_INCREMENT,
  `lib_section` varchar(255) NOT NULL,
  `fixed_section` varchar(100) NOT NULL,
  `desc_section` varchar(255) DEFAULT NULL,
  `type_section` varchar(50) NOT NULL,
  `visible_section` varchar(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`id_section`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES ('1', 'Menu Principal Horizontal', 'menu_h', '', 'page', 'n');
INSERT INTO `section` VALUES ('2', 'Menu Principal Horizontal', 'menu-horizontal', '', 'page', 'o');
INSERT INTO `section` VALUES ('3', 'Home Slider', 'home-slider-header', '', 'album', 'o');
INSERT INTO `section` VALUES ('4', 'Accueil', 'home', '', 'page', 'o');
INSERT INTO `section` VALUES ('5', 'Nos Partenaires', 'nos-partenaires', '', 'album', 'o');

-- ----------------------------
-- Table structure for `smenu`
-- ----------------------------
DROP TABLE IF EXISTS `smenu`;
CREATE TABLE `smenu` (
  `id_smenu` int(5) NOT NULL AUTO_INCREMENT,
  `id_menu` int(5) NOT NULL,
  `titre_smenu` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `fichier_smenu` varchar(255) DEFAULT NULL,
  `contenu_smenu` longtext,
  `libelle_smenu` text CHARACTER SET utf8,
  `service_accueil` varchar(2) DEFAULT NULL,
  `position_smenu` tinyint(2) DEFAULT NULL,
  `publier_smenu` varchar(1) DEFAULT NULL,
  `visible_smenu` varchar(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`id_smenu`,`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of smenu
-- ----------------------------
INSERT INTO `smenu` VALUES ('1', '3', 'INFORMATIQUE', 'INFORMATIQUE1485303160.png', '', 'fa linefont-screen-desktop', '', '1', 'o', 'o');
INSERT INTO `smenu` VALUES ('2', '3', 'INFOGRAPHIE', 'INFOGRAPHIE1485303683.png', '', 'fa linefont-camera', '', '2', 'o', 'o');
INSERT INTO `smenu` VALUES ('3', '3', 'ENTREPRENEURIAT', 'ENTREPRENEURIAT1485303200.png', '', 'fa fa-line-chart', '', '3', 'o', 'o');
INSERT INTO `smenu` VALUES ('4', '2', 'INFORMATIQUE', null, '<p style=\"text-align: center;\"><span style=\"font-size: medium;\"><span style=\"font-family: Arial;\">&nbsp;<b><strong>Nous d&eacute;veloppons des applications web &amp; mobiles.</strong></b></span></span></p>\r\n<p style=\"text-align: center;\"><em><span style=\"font-size: larger;\"><span style=\"font-family: Arial;\"><b>Qui vous donnent un temps d\'avance</b></span></span></em></p>', '', '', '1', 'n', 'o');
INSERT INTO `smenu` VALUES ('5', '2', 'Design', null, '<p>&nbsp;<b><font size=\"4\">Un design &agrave; votre image, singulier et &eacute;l&eacute;gant</font></b></p>', '', '', '2', 'n', 'o');
INSERT INTO `smenu` VALUES ('6', '2', 'INFOGRAPHIE', null, '', '', '', '3', 'n', 'n');
INSERT INTO `smenu` VALUES ('7', '1', 'Presentation', 'Presentation1485118686.jpg', '', '', '', '1', 'n', 'o');
INSERT INTO `smenu` VALUES ('8', '1', 'Nos Valeurs', 'NosValeurs1485118312.PNG', '<p class=\"sppb-image-content-text\" style=\"text-align: justify;\">Ces valeurs sont pour nous un manifeste auquel chacun de nos membres adh&eacute;re. Nous en avons la certitude car nous l\'avons construit ensemble, librement. Nous souhaitons dor&eacute;navant qu\'il d&eacute;passe les fronti&egrave;res de notre &eacute;quipe pour devenir la base des relations avec chacun de nos partenaires.</p>\r\n<div class=\"pie-charts row text-center\">\r\n<div class=\"chart-holder col-sm-4 col-md-4\"><span class=\"chart\" data-percent=\"100\">100% 																		</span>\r\n<p><strong>Passion</strong></p>\r\n</div>\r\n<div class=\"chart-holder col-sm-4 col-md-4\"><span class=\"chart\" data-percent=\"100\">100% 																		</span>\r\n<p><strong>Ouverture</strong></p>\r\n</div>\r\n<div class=\"chart-holder col-sm-4 col-md-4\"><span class=\"chart\" data-barcolor=\"#333\" data-percent=\"100\"> 																			100% 																		</span>\r\n<p><strong>Pertinence</strong></p>\r\n</div>\r\n<div class=\"chart-holder col-sm-4 col-md-4\"><span class=\"chart\" data-barcolor=\"#333\" data-percent=\"100\"> 																			100% 																		</span>\r\n<p><strong>Confiance</strong></p>\r\n</div>\r\n<div class=\"chart-holder col-sm-4 col-md-4\"><span class=\"chart\" data-barcolor=\"#333\" data-percent=\"100\"> 																			100% 																		</span>\r\n<p><strong>Pr&eacute;curseur</strong></p>\r\n</div>\r\n<div class=\"chart-holder col-sm-4 col-md-4\"><span class=\"chart\" data-barcolor=\"#333\" data-percent=\"100\"> 																			100% 																		</span>\r\n<p><strong>Responsabilit&eacute;</strong></p>\r\n</div>\r\n</div>', '', '', '2', 'n', 'o');
INSERT INTO `smenu` VALUES ('9', '1', 'RENCONTREZ NOTRE Ã‰QUIPE', null, '', '', '', '3', 'n', 'o');
INSERT INTO `smenu` VALUES ('10', '4', 'Analyse', null, '<p style=\"text-align: justify;\">Nous&nbsp;<b>analysons &nbsp;vos besoins</b>&nbsp;en d&eacute;finissant les services du syst&egrave;me et en consultant les utilisateurs du syst&egrave;me. On le planning et des d&eacute;lais valide avant le d&eacute;marrage du projet.</p>', '', '', '1', 'o', 'o');
INSERT INTO `smenu` VALUES ('11', '4', 'Design', null, '<p style=\"text-align: justify;\">Cette &eacute;tape de la conception permet de d&eacute;tailler le design g&eacute;n&eacute;ral de chaque &eacute;cran, de chaque composant actif et la gestuelle&nbsp;associ&eacute;e &agrave; leur utilisation.&nbsp;</p>', '', '', '2', 'o', 'o');
INSERT INTO `smenu` VALUES ('12', '4', 'DÃ©veloppement', null, '<p style=\"text-align: justify;\">Nos d&eacute;veloppeurs utilisent les frameworks&nbsp;des syst&egrave;mes pour consacrer plus de temps &agrave; faire leurs travail.&nbsp;Ils interviennent &agrave; toutes les &eacute;tapes du projet, pour &ecirc;tre plus efficace.</p>', '', '', '3', 'o', 'o');
INSERT INTO `smenu` VALUES ('13', '4', 'DÃ©ploiement', null, '<p style=\"text-align: justify;\">Nous distinguons une &eacute;quipe de test pour l\'implantation des diff&eacute;rentes parties et leur validation par des tests unitaires.&nbsp;Et v&eacute;rifie ainsi que les sp&eacute;cifications des besoins sont satisfaites.</p>', '', '', '4', 'o', 'o');
INSERT INTO `smenu` VALUES ('14', '5', 'MS  BASIC', null, '<ul class=\"pricng-features\" style=\"font-size:18px;\">\r\n    <li><strong>2 sites</strong></li>\r\n    <li><strong>Disque SSD de 1GB</strong></li>\r\n    <li><strong>2 MySQL</strong> databases</li>\r\n    <li><strong>Email</strong> : Illimit&eacute;</li>\r\n    <li><strong>Trafic&nbsp;</strong>: Illimit&eacute;</li>\r\n    <li><strong>24/7 Support</strong></li>\r\n</ul>\r\n<div class=\"cta-btn\"><a target=\"_blank\" href=\"commande-basic.html\" class=\"readon\">Commander</a></div>', 'IdÃ©al pour :\r\nParticuliers, dÃ©butants, les blogs et autres. Solution pour hÃ©berger les projets de taille moyenne.', '', '1', 'o', 'o');
INSERT INTO `smenu` VALUES ('15', '5', 'MS EXPERT', null, '<ul class=\"pricng-features\" style=\"font-size:18px;\">\r\n    <li><strong>Sites Illimit&eacute;s</strong></li>\r\n    <li><strong>Disque SSD de 10GB</strong></li>\r\n    <li><strong>MySQL Base</strong> : illimit&eacute;</li>\r\n    <li><strong>Email</strong> : Illimit&eacute;</li>\r\n    <li><strong>Trafic</strong> : Illimit&eacute;</li>\r\n    <li><strong>24/7 Support</strong></li>\r\n</ul>\r\n<div class=\"cta-btn\"><a target=\"_blank\" href=\"commande-expert.html\" class=\"readon\">Commander</a></div>', 'IdÃ©al pour :\r\nSociÃ©tÃ©s, institutions, mairies, cms, sites e-commerce.. Puissance renforcÃ©e pour les sites dynamique d\'envergure.', '', '3', 'o', 'o');
INSERT INTO `smenu` VALUES ('16', '5', 'MS ADVANCED', null, '<ul class=\"pricng-features\" style=\"font-size:18px;\">\r\n    <li><strong>20 Sites</strong></li>\r\n    <li><strong>Disque SSD de 5GB</strong></li>\r\n    <li><strong>20 MySQL</strong> databases</li>\r\n    <li><strong>Email</strong> : Illimit&eacute;</li>\r\n    <li><strong>Trafic</strong> : Illimit&eacute;</li>\r\n    <li><strong>24/7 Support</strong></li>\r\n</ul>\r\n<div class=\"cta-btn\"><a target=\"_blank\" href=\"commande-advanced.html\" class=\"readon\">Commander</a></div>', 'IdÃ©al pour :\r\nAssociations, clubs, artisans, pme, pmi, entreprises. Solution pour les sites pros de contenu dynamique.', '', '2', 'o', 'o');
INSERT INTO `smenu` VALUES ('17', '5', 'MS SUPER', null, '<ul class=\"pricng-features\" style=\"font-size:18px;\">\r\n    <li><strong>Sites Illimit&eacute;s</strong></li>\r\n    <li><strong>Disque SSD de 20GB</strong></li>\r\n    <li><strong>MySQL Base</strong> : illimit&eacute;</li>\r\n    <li><strong>Email</strong> : Illimit&eacute;</li>\r\n    <li><strong>Trafic</strong> : Illimit&eacute;</li>\r\n    <li><strong>24/7 Support</strong></li>\r\n</ul>\r\n<div class=\"cta-btn\"><a target=\"_blank\" href=\"commande-super.html\" class=\"readon\">Commander</a></div>', 'IdÃ©al pour :\r\nSociÃ©tÃ©s, experts, institutions, sites qui exigent des performances GARANTIES. Sites E-commerce de grosse taille...', '', '4', 'o', 'o');

-- ----------------------------
-- Table structure for `ssmenu`
-- ----------------------------
DROP TABLE IF EXISTS `ssmenu`;
CREATE TABLE `ssmenu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_smenu` int(5) NOT NULL,
  `titre` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `libelle` text CHARACTER SET utf8,
  `post` tinyint(2) NOT NULL,
  `position` tinyint(2) DEFAULT NULL,
  `etat` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_smenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ssmenu
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom_user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email_user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `adresse_user` varchar(255) NOT NULL,
  `photo_user` varchar(255) DEFAULT NULL,
  `login_user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type_user` varchar(255) NOT NULL,
  `etat_connecte` varchar(1) NOT NULL DEFAULT 'n',
  `visible_user` varchar(1) NOT NULL DEFAULT 'o',
  `jour` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'TSIVANYO', 'marc', 'marctsivanyo@gmail.com', 'LomÃ©-TOGO', null, '@dmin', 'administrateur', 'Administrateur', 'n', 'o', null);

-- ----------------------------
-- Table structure for `video`
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id_video` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `titre_video` text NOT NULL,
  `code_video` text CHARACTER SET utf8 NOT NULL,
  `position_video` varchar(1) NOT NULL,
  `publier_video` varchar(1) CHARACTER SET utf8 DEFAULT 'o',
  `visible_video` varchar(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of video
-- ----------------------------
