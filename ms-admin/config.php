<?php  
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    session_start();
    ini_set("display_errors", "0");
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('UTC');
    define('ADMIN','Administrateur');
    define('SIMPLE_USER','Simple utilisateur'); 
    define('DOSSIER_UPLOAD','photo_site/');
    define('DOSSIER_ALBUM','photo_album/');
    define('DOSSIER_FICHIER','fichier/');
    define('DOSSIER_IMAGES','images/');
	include('class/database.php'); 
	include('class/class_gest_page.php');
	include('class/class_menu.php');
	include('class/class_utilitaires.php');
	include('class/class_newsletters.php');
	include('class/class_news.php');
	include('class/class_user.php');
	include('class/class_config.php');
	include('class/class_smenu.php');
	include('class/class_album.php');
	include('class/class_photo.php');
	include('class/class_section.php');
	include('class/class_article.php');
	include('class/class_video.php');
	include('class/class_ouvrage.php');
	include('class/class_nature.php');
?>