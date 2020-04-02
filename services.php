<?php
	include('top-contains.php')
?>
<section id="sp-main-body">
	<div class="row">
		<div id="sp-component" class="col-sm-12 col-md-12">
			<div class="sp-column ">
				<div id="system-message-container">
				</div>
				<div id="sp-page-builder" class="sp-page-builder  page-13">
					<div class="page-content">
					           <section class="sppb-section " style="padding:100px 0px;">
								<div class="sppb-container">
									<div class="sppb-row">
                                    <?php 
                                        $tabSmenu=$classSousmenu->this_smenu_menu_by_position($idMenupage,1,"o"); 
                                            $idSsMenu=$tabSmenu["id_smenu"];
                                            $titreSsMenu=$tabSmenu["titre_smenu"];
                                            $contenusMenu=$tabSmenu["contenu_smenu"];
                                    ?>
                                    <div class="sppb-section-title sppb-text-center">
                                        <h2 class="sppb-title-heading" style="">
                                            <strong><?php echo $titreSsMenu ?></strong> 
                                        </h2>
                                        <p style="text-align: center;">
                                            <?php echo $contenusMenu ?>
                                        </p>
                                    </div>
                                     <?php   
                                            $tabArticle=$classarticle->liste_article_by_smenu_action_publier($idSsMenu,0,"order by position_article"); 
                                            if($tabArticle->rowCount()>0){
                                                foreach($tabArticle as $tabArticleValue){
                                                    $titreArticle=stripcslashes($tabArticleValue["titre_article"]);
                                                    $libArticle=stripcslashes($tabArticleValue["libelle_article"]);
                                                    $autresArticle=stripcslashes($tabArticleValue["autres_article"]);
                                                    $contenuArticle=stripcslashes($tabArticleValue["contenu_article"]);
                                                    
                                                    $contenuArticleCoupe=$classutilitaire->coupeTexte($contenuArticle,100);  
                                                    $fichierArticle=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabArticleValue["fichier_article"]); 
                                     ?>    
										<div class="sppb-col-sm-4" style="padding-bottom:50px;">
											<div class="sppb-addon-container" style="">
												<div class="sppb-addon sppb-addon-feature sppb-text-left ">
													<div class="sppb-addon-content">
														<div class="sppb-media">
															<div class="pull-left">
																<div class="sppb-icon">
																	<span style="display:inline-block;text-align:center;;">
																		<i class="fa <?php echo $libArticle ?> hvr-icon-drop" style="font-size:36px;width:36px;height:36px;line-height:36px;">
																		</i>
																	</span>
																</div>
															</div>
															<div class="sppb-media-body">
																<h3 class="sppb-feature-box-title sppb-media-heading" style="">
																	<?php echo $titreArticle ?>
																</h3>
																<div class="sppb-addon-text" style="text-align: justify;"> 
                                                                    <?php echo $contenuArticleCoupe ?></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
                                        <?php  }
                                            }else{
                                               echo "<h3>AUCUNE INFORMATION DISPONIBLE</h3>";
                                            } 
                                            //}
                                       ?>  
									 
									</div>
								</div>
							</section>
						<section class="sppb-section section-bg">
							<div class="sppb-container">
								<div class="sppb-row">      
                                        <?php 
                                            $tabSmenu=$classSousmenu->this_smenu_menu_by_position($idMenupage,2,"o"); 
                                                $idSsMenu=$tabSmenu["id_smenu"];
                                                $titreSsMenu=$tabSmenu["titre_smenu"];
                                                $contenusMenu=$tabSmenu["contenu_smenu"];
                                        ?>
                                        <div class="sppb-section-title sppb-text-center">
                                            <h2 class="sppb-title-heading" style="">
                                                <strong><?php echo $titreSsMenu ?></strong> 
                                            </h2>
                                            <p style="text-align: center;">
                                                <?php echo $contenusMenu ?>
                                            </p>
                                        </div>           
                                    <?php  
                                        	
                                            
                                            $tabArticle=$classarticle->liste_article_by_smenu_action_publier($idSsMenu,0,"order by position_article"); 
                                            if($tabArticle->rowCount()>0){
                                                foreach($tabArticle as $tabArticleValue){
                                                    $titreArticle=stripcslashes($tabArticleValue["titre_article"]);
                                                    $libArticle=stripcslashes($tabArticleValue["libelle_article"]);
                                                    $autresArticle=stripcslashes($tabArticleValue["autres_article"]);
                                                    $contenuArticle=stripcslashes($tabArticleValue["contenu_article"]);
                                                    $contenuArticleCoupe=$classutilitaire->coupeTexte($contenuArticle,100);  
                                                    $fichierArticle=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabArticleValue["fichier_article"]); 
                                     ?>    
    									<div class="sppb-col-sm-4">
    										<div class="sppb-addon-container" style="">
    											<div class="sppb-addon sppb-addon-feature sppb-text-left ">
    												<div class="sppb-addon-content">
    													<div class="sppb-addon-feature-img" style=";">
    														<img style="width: 300px; height: 200px;" class="sppb-img-responsive" src="<?php echo $fichierArticle ?>" alt=""/>
    													</div>
    													<h3 class="sppb-feature-box-title" style="">
    														<?php echo $titreArticle ?>
    													</h3>
    													<div class="sppb-addon-text" style="text-align: justify;">
    														<?php echo $contenuArticleCoupe ?>
    													</div>
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