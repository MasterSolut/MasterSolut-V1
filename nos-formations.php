<?php include( 'top-contains.php') ?>

	<section id="sp-main-body">
		<div class="row">
			<div id="sp-component" class="col-sm-12 col-md-12">
				<div class="sp-column">
					<div id="sp-page-builder" class="sp-page-builder  page-13">
						<div class="page-content">
							<section class="sppb-section section-bg" style=""> 
                                <div class="sppb-section-title sppb-text-center">
                                    <h3 class="sppb-title-heading" style=""><?php echo $titleSousmenu ?></h3>
                                </div> 
								<div class="sppb-container">
									<div class="sppb-row"> 
                                         <?php
                                            	$tabArticle=$classarticle->liste_article_by_smenu_action_publier($idSousmenu,0,"order by position_article"); 
                                                if($tabArticle->rowCount()>0){
                                                    foreach($tabArticle as $tabArticleValue){
                                                        $titreArticle=stripcslashes($tabArticleValue["titre_article"]);
                                                        $libArticle=stripcslashes($tabArticleValue["libelle_article"]);
                                                        $autresArticle=stripcslashes($tabArticleValue["autres_article"]);
                                                        $contenuArticle=stripcslashes($tabArticleValue["contenu_article"]);
                                                        //$contenuArticleCoupe=$classutilitaire->coupeTexte($contenuArticle,20);
                                                        //$imageArticle=FOLDER_ADMIN." ".DOSSIER_IMAGES.stripcslashes($tabArticleValue["image_article"]); 
                                                        $fichierArticle=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabArticleValue["fichier_article"]); 
                                         ?>   
    										<div class="sppb-col-md-4 sppb-col-sm-6 sppb-xs-12">
    											<div class="sppb-addon-container" style="">
    												<div class="sppb-videopopup-addon sppb-addon">
    													<div class="sppb-videopopup" style="background-image:url(<?php echo $fichierArticle; ?>);background-repeat:no-repeat;">
                                                             <div class="col-md-4 text-right">
                                                                <a href="javascritp:void(0)" class="hvr-bounce-to-right sppb-btn sppb-btn-primary sppb-btn- " role="button">
                                                                    <i class="fa fa-calendar-o"></i><?php echo $autresArticle; ?>
                                                                </a>
                                                            </div> 
    													</div>
    													<div class="sppb-videopopup-content">
    														<h3 class="sppb-videopopup-title">
    															<?php echo $titreArticle; ?>
    														</h3>
    														<div class="videopopup-text" style="<?php if($contenuArticle) echo 'height: 250px;' ?> color: black;">
    															 <?php echo $contenuArticle; ?>
                                                            </div>
    														 <br/> 
                                                               <!-- <button class="btn btn-sm btn-primary" style="background-color: white; border: 2px solid #51423A; color: #539E96;">
                                                                   <i class="fa fa-calendar-o"></i><?php echo $autresArticle; ?>
                                                                </button> -->  
    													</div>
    												</div>
    											</div>
    										</div>
                                            <?php  }
                                                    }else{
                                                       echo "<h3>AUCUNE INFORMATION DISPONIBLE</h3>";
                                                    } 
                                               ?> 
									</div>
								</div>
							</section> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>