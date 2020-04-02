<?php
    define('FOLDER_ADMIN','ms-admin/');
    
	include(FOLDER_ADMIN.'config.php'); 
    $this_site=$classconfig->liste_config(1)->fetch();  
    $logo_ms=FOLDER_ADMIN.DOSSIER_UPLOAD.stripslashes($this_site["logo_site"]);
    $titre_site=stripslashes($this_site["nom_site"]);
    $mail_contact=stripslashes($this_site["email"]);
    $tel_contact=stripslashes($this_site["tel_contact"]);
    $code_google_map=stripslashes($this_site["code_google_map"]);
    $adresse=stripslashes($this_site["info_adresse_site"]);
    $favicon_logo=FOLDER_ADMIN.DOSSIER_UPLOAD.stripslashes($this_site["favicon_site"]);
    
    $idMenupage=$_GET["idmenu"];     
    if($idMenupage){
        $this_menu=$classmenu->this_menu($idMenupage);
        $titleMenu=stripcslashes($this_menu["titre_menu"]); 
        $PositionMenu=stripcslashes($this_menu["position_menu"]); 
        $fichierMenu=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($this_menu["fichier_menu"]); 
        $titleMenupage=stripcslashes($this_menu["titre_menu"])." -"; 
    }
    
    $idSousmenu=$_GET["idsmenu"];  
    if($idSousmenu){
        $this_smenu=$classSousmenu->this_smenu($idSousmenu);
        $titleSousmenu=stripcslashes($this_smenu["titre_smenu"]); 
        $contenuSousmenu=stripcslashes($this_smenu["contenu_smenu"]);  
        $imageSousformules=FOLDER_ADMIN.DOSSIER_FICHIER.stripslashes($this_smenu["fichier_smenu"]);
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-gb" lang="en-fr" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <?php include("header.php"); ?>
    
<body class="site com-sppagebuilder view-page no-layout no-task itemid-437 en-gb ltr  sticky-header layout-fluid">
    <div class="body-innerwrapper">
        <div id="startOfPage"></div>
           
        <?php include("menu_top_bar.php"); ?>
   	
        <?php include("controllers.php"); ?>
                                  
    <div class="itemBackToTop" class="col-sm-12 col-md-12"><br/>
		<a  href="?#startOfPage"  >
			<i class="fa fa-arrow-up img-circle"></i>		</a>
	</div>
    <?php //include("bas_page.php"); ?>      
    <footer id="sp-footer">
        <div class="container">
            <div class="row">
                <div id="sp-footer1" class="col-sm-8 col-md-8">
                    <div class="sp-column ">
                        <span class="sp-copyright"> © 2017 MasterSolut. All Rights Reserved. Designed By <strong>MasterSolut</strong></span>
                    </div>
                </div>
                <div id="sp-footer2" class="col-sm-4 col-md-4">
                    <div class="sp-column ">
                        <ul class="social-icons">
                            <li><a target="_blank" href="https://www.facebook.com/mastersolut"><i class="fa fa-facebook "></i></a></li>
                            <li><a target="_blank" href="https://twitter.com/mastersoluts"><i class="fa fa-twitter "></i></a></li> 
                        </ul>
                    </div>
                </div> 
            </div>
        </div>
    </footer>
    <div class="offcanvas-menu">
        <a href="#" class="close-offcanvas"><i class="fa fa-remove"></i></a>
        <div class="offcanvas-inner">
            <div class="sp-module "><h3 class="sp-module-title">Menu</h3> </div>
            <div class="sp-module ">
                <div class="sp-module-content">
                    <ul class="nav menu">
                        <li class="item-437">
                            <a href="accueil" >ACCUEIL</a>                             
                        </li>
                        <?php 
                            $mega_active=$_GET["idmenu"]; 
                            $tabMenuTop=$classmenu->liste_menu_section_fixed("menu-horizontal",0,'order by position_menu ASC'); 
                            foreach($tabMenuTop as $tabmeMenuTopvalues){
                                $idMenu=$tabmeMenuTopvalues["id_menu"]; 
                                $titreMenu1=stripslashes($tabmeMenuTopvalues["titre_menu"]); 
                                $libelleMenu=stripslashes($tabmeMenuTopvalues["libelle_menu"]); 
                                $hrefmenu=$classutilitaire->format_url($titreMenu1).'-'.$idMenu.'.html'; 
                                $tabsousmenu=$classSousmenu->liste_smenu_by_menu_action_publier($idMenu,0,'order by position_smenu ASC');
                                if($tabsousmenu->rowCount()>0){ 
                        ?>  
                         
                        <li class="item-502 current <?php if($mega_active==$idMenu) echo ('active')?> deeper parent ">
                            <a  href="javascript:void(0)" title="<?php echo $titreMenu1 ?>"><?php echo $titreMenu1 ?></a>
                            <ul class="nav-child unstyled small">
                                <?php      
                                    foreach($tabsousmenu as $tabsousmenuvalues){  
                                        $idSmenu=$tabsousmenuvalues["id_smenu"];
                                        $titreSmenu=stripslashes($tabsousmenuvalues["titre_smenu"]);
                                        $libelleSmenu=stripslashes($tabsousmenuvalues["libelle_smenu"]);
                                        $titreformatUrl=$classutilitaire->format_url($titreSmenu); 
                                        $hrefsmenu=$classutilitaire->format_url($titreMenu1).'-'.$idMenu.'-'.$idSmenu.'-'.$titreformatUrl.'.html';
                                ?>  
                                    <li class="item-589 <?php if($idSousmenu==$idSmenu) echo ('active')?>">
                                        <a href="<?php echo $hrefsmenu ?>" title="<?php echo $titreSmenu ?>"><?php echo $titreSmenu ?></a>
                                    </li>
                                <?php } ?> 
                            </ul>
                        </li>
                        <?php }else{ ?>
                        
                        <li class="item-560"> 
                            <a href="<?php echo $hrefmenu ?>" title="<?php echo $titreMenu1 ?>"><?php echo $titreMenu1 ?></a>
                        </li>   
                        <?php } }?>
                        <li class="item-562"><a href="contact" title="Nous Contacter"> CONTACT</a></li>
                    </ul>
                </div>
            </div> 
        </div>
    </div>
</div>
        
</body>
</html>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>