<?php 
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
     $id_menu=$_GET["menu"]; 
     if($id_menu){
        $tab_menu=$classpage_menu->this_menu($id_menu); 
        $lien_menu=$tab_menu["lien_menu"];
        if(!$lien_menu) $lien_menu='accueil1.php';
        include($lien_menu);
     }else{
        $thismenu=$classpage_menu->liste_menu_par_page($id_page,1,"ORDER BY indice_menu ASC");
        
        foreach($thismenu as $value){
            $lien_menu=$value["lien_menu"];
            if(!$lien_menu) $lien_menu='accueil1.php';
                include($lien_menu);
             } 
     }
    
?>