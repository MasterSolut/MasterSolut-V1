<?php include( 'top-contains.php') ?>
	<section id="sp-main-body">
		<div class="row">
			<div id="sp-component" class="col-sm-12 col-md-12">
				<div class="sp-column ">
					<div id="system-message-container">
					</div>
					<div id="sp-page-builder" class="sp-page-builder  page-12">
						<div class="page-content">
							<section class="sppb-section " style="">
								<div class="sppb-container">
									<div class="sppb-row">
										<div class="sppb-col-sm-6">
                                            <?php  
                                            	$tabSmenu=$classSousmenu->this_smenu_menu_by_position($idMenupage,1,"o"); 
                                                $idSsMenu=$tabSmenu["id_smenu"];
                                                $titreSsMenu=$tabSmenu["titre_smenu"];
                                                $image=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabSmenu["fichier_smenu"]); 
                                            ?>   
											<div class="sppb-addon-container" style="" data-sppb-wow-duration="300ms">
												<div class="sppb-addon sppb-addon-single-image sppb-text-center ">
													<div class="sppb-addon-content"> 
														<img class="sppb-img-responsive" src="<?php echo $image ?>" style=" width: 100%; height: 100%;"	alt="<?php echo $titreSsMenu ?>" title="<?php echo $titreSsMenu ?>"/> 
													</div>
												</div>
											</div>
										</div>
										<div class="sppb-col-sm-6">
											<div class="sppb-addon-container" style="">
												<div class="sppb-addon sppb-addon-accordion ">
													<div class="sppb-addon-content">
														<div class="sppb-panel-group ">
                                                            <?php  
                                                                 
                                                                    $tabArticle=$classarticle->liste_article_by_smenu_action_publier($idSsMenu,0,"order by position_article"); 
                                                                    if($tabArticle->rowCount()>0){
                                                                        foreach($tabArticle as $tabArticleValue){
                                                                            $titreArticle=stripcslashes($tabArticleValue["titre_article"]);
                                                                            $libArticle=stripcslashes($tabArticleValue["libelle_article"]);
                                                                            $autresArticle=stripcslashes($tabArticleValue["autres_article"]);
                                                                            $contenuArticle=stripcslashes($tabArticleValue["contenu_article"]);  
                                                                            $fichierArticle=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabArticleValue["fichier_article"]); 
                                                             ?>   
                                                        
															<div class="sppb-panel sppb-panel-default">
																<div class="sppb-panel-heading">
																	<h2 class="sppb-panel-title">
																		<i class="fa fa-plus"> </i> 
                                                                        <?php echo $titreArticle ?>
																	</h2>
																</div>
																<div class="sppb-panel-collapse">
																	<div class="sppb-panel-body">
                                                                        <?php echo $contenuArticle ?>
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
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<section class="sppb-section section-bg no-margin has-arrow" style="">
								<div class="sppb-row">
									<div class="sppb-col-sm-12">
										<div class="sppb-addon-container" style="">
											<div class="sppb-addon sppb-addon-image-content aligment-left clearfix ">
                                            <?php  
                                            	$tabSmenu=$classSousmenu->this_smenu_menu_by_position($idMenupage,2,"o"); 
                                                $idSsMenu=$tabSmenu["id_smenu"];
                                                $titreSsMenu=$tabSmenu["titre_smenu"];
                                                $contenuArticle=$tabSmenu["contenu_smenu"];
                                                $image=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabSmenu["fichier_smenu"]); 
                                            ?>
												<div  class="sppb-image-holder"> 
													<img class="sppb-img-responsive" style="width: 100%; height: 90%; padding-top: 100px;" src="<?php echo $image ?>" alt="" title="<?php echo $titreArticle?>"/> 
												</div>
												<div class="sppb-container">
													<div class="sppb-row">
														<div class="sppb-col-sm-6 sppb-col-sm-offset-6">
															<div class="sppb-content-holder">
                                                                 
																<h3 class="sppb-image-content-title" style="">
																	<?php echo $titreSsMenu ?>
																</h3>
                                                                    <?php echo $contenuArticle ?> 
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							</section>
							<section class="sppb-section " style="">
								<div class="sppb-container">
									<div class="sppb-section-title sppb-text-center">
										<h3 class="sppb-title-heading" style="">
											
                                         <?php  
                                        	$tabSmenu=$classSousmenu->this_smenu_menu_by_position($idMenupage,3,"o"); 
                                            $idSsMenu=$tabSmenu["id_smenu"];
                                            $titreSsMenu=stripcslashes($tabSmenu["titre_smenu"]);
                                            echo $titreSsMenu;
                                          ?>    
										</h3>
									</div>
									<div class="sppb-row">
                                    
                                    
                                     <?php   
                                            $tabArticle=$classarticle->liste_article_by_smenu_action_publier($idSsMenu,3,"order by position_article"); 
                                            if($tabArticle->rowCount()>0){
                                                foreach($tabArticle as $tabArticleValue){
                                                    $titreArticle=stripcslashes($tabArticleValue["titre_article"]);
                                                    $libArticle=stripcslashes($tabArticleValue["libelle_article"]);
                                                    $autresArticle=stripcslashes($tabArticleValue["autres_article"]);
                                                    $contenuArticle=stripcslashes($tabArticleValue["contenu_article"]);
                                                    $contenuArticleCoupe=$classutilitaire->coupeTexte($contenuArticle,20);  
                                                    $fichierArticle=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabArticleValue["fichier_article"]); 
                                     ?>    
										<div class="sppb-col-sm-4">
											<div class="sppb-addon-container" style="">
												<div class="sppb-addon sp-person-addon">
													<div class="sppb-member-image-holder">
														<img class="sppb-img-responsive" style="width: 100%; height: 200px;" src="<?php echo $fichierArticle?>" alt="" title="<?php echo $titreArticle?>"/>
													</div>
													<div class="sppb-member-details-holder">
														<h3 class="sppb-member-title">
															<?php echo $titreArticle?>
														</h3>
														<h5 class="sppb-member-role ">
															<?php echo $libArticle?>
														</h5> 
													</div>
												</div>
											</div>
										</div>
                                        
                                        <?php  
                                            }
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