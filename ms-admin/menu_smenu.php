<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
 $idMenu=$_GET["menu_smenu"];
 $idSmenu=$_GET["smenu"];
 if(!$idMenu){ 
    include('menu_liste.php');
 }else{ 
    if($idSmenu){
        include('article_liste.php');
    }else{
        include('smenu_liste.php');
    }
    
 }
?>

