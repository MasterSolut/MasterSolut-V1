        <section id="sp-top-bar"  >
            <div class="container">
                <div class="row" >
                    <div id="sp-top1" class="col-xs-9 col-sm-6 col-md-6">
                        <div class="sp-column ">
                            <div class="sp-module ">
                                <div class="sp-module-content">
                                    <div class="custom">
                                       <p>Bienvenue chez  <?php echo $titre_site ?> | Votre partenaire informatique...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="col-sm-2 col-md-2 col-xs-3">
                        <div class="sp-column ">
                            <ul class="social-icons" style="">
                                <li><a  target="_blank" href="https://www.facebook.com/mastersolut"><i class="fa fa-facebook "></i></a></li>
                                <li><a target="_blank" href="https://twitter.com/mastersoluts"><i class="fa fa-twitter "></i></a></li> 
                            </ul>
                        </div>
                    </div>
                    
                    <div id="sp-top2" class="col-sm-4 col-md-4 col-xs-12">
                        <div class="sp-column ">
                            <ul class="sp-contact-info">
                                <li class="sp-contact-phone">
                                    <i class="fa fa-phone"></i> 
                                    <a href="tel:<?php echo $tel_contact ?>"><?php echo $tel_contact ?></a>
                                </li>
                                <li class="sp-contact-email">
                                    <i class="fa fa-envelope"></i> 
                                    <a href="mailto:<?php echo $mail_contact ?>"><?php echo $mail_contact ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <header id="sp-header">
            <div class="container">
                <div class="row">
                    <div id="sp-logo" class="col-xs-8 col-sm-3 col-md-3">
                        <div class="sp-column ">
                            <a class="logo" href="accueil">
                                <h1>
                                    <img class="sp-default-logo" src="<?php echo $logo_ms ?>" alt="Bienvenue sur le site de <?php echo $titre_site ?>" title="Bienvenue sur le site de <?php echo $titre_site ?>" style="width: 200px; height: 80px;"/>
                                    
                                </h1>
                            </a>
                        </div>
                    </div>
                    <div id="sp-menu" class="col-xs-4 col-sm-9 col-md-9">
                        <div class="sp-column ">			
                            <div class='sp-megamenu-wrapper'>
				                <a id="offcanvas-toggler" href="#"><i class="fa fa-bars"></i></a>
                				<ul class="sp-megamenu-parent menu-fade hidden-xs hidden-sm">
                                    <li class="sp-menu-item sp-has-child current-item <?php if(!$_GET["idmenu"] && !$_GET["page"]) echo ('active')?>">
                                        <a href="accueil" >Accueil</a> 
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
                                    <li class="sp-menu-item sp-has-child <?php if($mega_active==$idMenu) echo ('active')?>">
                                        <a  href="javascript:void(0)" title="<?php echo $titreMenu1 ?>"><?php echo $titreMenu1 ?></a>
                                        <div class="sp-dropdown sp-dropdown-main sp-menu-right" style="width: 240px;">
                                            <div class="sp-dropdown-inner">
                                                <ul class="sp-dropdown-items">
                                                    <?php      
                                                        foreach($tabsousmenu as $tabsousmenuvalues){  
                                                            $idSmenu=$tabsousmenuvalues["id_smenu"];
                                                            $titreSmenu=stripslashes($tabsousmenuvalues["titre_smenu"]);
                                                            $libelleSmenu=stripslashes($tabsousmenuvalues["libelle_smenu"]);
                                                            $titreformatUrl=$classutilitaire->format_url($titreSmenu); 
                                                            $hrefsmenu=$classutilitaire->format_url($titreMenu1).'-'.$idMenu.'-'.$idSmenu.'-'.$titreformatUrl.'.html';
                                                    ?>  
                                                        <li class="sp-menu-item <?php if($idSousmenu==$idSmenu) echo ('active')?>">
                                                            <a  href="<?php echo $hrefsmenu ?>" title="<?php echo $titreSmenu ?>"><?php echo $titreSmenu ?></a>
                                                        </li>
                                                    <?php } ?> 
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <?php }else{ ?>
                                    
                                    <li class="sp-menu-item <?php if($mega_active==$idMenu) echo ('active')?>">
                                        <a href="<?php echo $hrefmenu ?>" title="<?php echo $titreMenu1 ?>"><?php echo $titreMenu1 ?></a>
                                    </li>
                                    <?php } }?>
                                 
                                    <li class="sp-menu-item <?php if($_GET["page"]=="contact") echo ('active')?>"><a href="contact" title="Nous Contacter"> Contact</a></li>
                                </ul>			
                            </div>
                		</div>
                    </div>
                  </div>
            </div>
        </header>

     <section id="sp-page-title">
        <div class="row">
            <div id="sp-title" class="col-sm-12 col-md-12">
                <div class="sp-column "></div>
            </div>
        </div>
      </section>
