<p style="font-size:+3; color:#F18989;">
	<section id="sp-slideshow">
		<div class="row">
			<div id="sp-slide" class="col-sm-12 col-md-12">
				<div class="sp-column ">
					<div class="sp-module ">
						<div class="sp-module-content">
							<!-- START REVOLUTION SLIDER 4.6 b1 fullwidth mode -->
							<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:500px;">
								<div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:500px;height:500px;">
									<ul>
                                        <?php
                                    	   $tab_slider=$classalbum->liste_album_section_fixed("home-slider-header","album",1)->fetch();                
                                            $idSectionSlider=$tab_slider["id_album"]; 
                                            $tabPhotosSlider=$classphoto->liste_photo_by_album_publier($idSectionSlider,0,"ORDER BY position_photo ASC");
                                            foreach($tabPhotosSlider as $tabPhotosSliderValues){
                                            $titrePhoto=stripslashes($tabPhotosSliderValues["titre_photo"]);
                                            $libellePhoto=stripslashes($tabPhotosSliderValues["libelle_photo"]);
                                            $srcPhoto=FOLDER_ADMIN.DOSSIER_ALBUM.$tabPhotosSliderValues["src_photo"];
                                        ?>  
										<li data-transition="parallaxtotop,parallaxtobottom" data-slotamount="7" data-masterspeed="300"   data-saveperformance="off" data-title="Slide">
											<!-- MAIN IMAGE -->
											<img src="<?php echo $srcPhoto ?>" alt="<?php echo $titrePhoto ?>" title="<?php echo $titrePhoto ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"/>
											<!-- LAYERS -->
											<!-- LAYER NR. 1 -->
											 
											<div class="tp-caption large_bold_black tp-fade tp-resizeme" data-x="30" data-y="130" data-speed="300" data-start="0" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1"
											data-endelementdelay="0.1" data-endspeed="300" style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">
												<h1 style="color: #539e96;"><?php echo $titrePhoto ?> </h1>
											</div>
											<!-- LAYER NR. 2 -->
											<div class="tp-caption medium_light_black tp-fade tp-resizeme" data-x="30" data-y="center" data-voffset="0" data-speed="300" data-start="0" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
											data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" data-captionhidden="on" style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
												<h6>
													<?php echo $libellePhoto ?>
												</h6>
												<div class='frontcorner'> </div>
												<div class='backcorner'> </div>
											</div> 
										</li>
                                        <?php }  ?>  
									</ul>
									<div class="tp-bannertimer tp-bottom" style="display:none; visibility: hidden !important;"> </div>
								</div>
								<script type="text/javascript">
									
                				/******************************************
                					-	PREPARE PLACEHOLDER FOR SLIDER	-
                				******************************************/
                								
                				 
                						var setREVStartSize = function() {
                							var	tpopt = new Object(); 
                								tpopt.startwidth = 1170;
                								tpopt.startheight = 500;
                								tpopt.container = jQuery('#rev_slider_1_1');
                								tpopt.fullScreen = "off";
                								tpopt.forceFullWidth="off";
                
                							tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
                						};
                						
                						/* CALL PLACEHOLDER */
                						setREVStartSize();
								
				
                            				var tpj=jQuery;				
                            				tpj.noConflict();				
                            				var revapi1;
                            				
                            				
                            				
                            				tpj(document).ready(function() {
                            				
                            					
                            								
                            				if(tpj('#rev_slider_1_1').revolution == undefined)
                            					revslider_showDoubleJqueryError('#rev_slider_1_1');
                            				else
                            				   revapi1 = tpj('#rev_slider_1_1').show().revolution(
                            					{
                            						dottedOverlay:"none",
                            						delay:9000,
                            						startwidth:1170,
                            						startheight:500,
                            						hideThumbs:0,
                            						
                            						thumbWidth:100,
                            						thumbHeight:50,
                            						thumbAmount:3,
                            													
                            						simplifyAll:"off",						
                            						navigationType:"bullet",
                            						navigationArrows:"solo",
                            						navigationStyle:"preview4",						
                            						touchenabled:"on",
                            						onHoverStop:"on",						
                            						nextSlideOnWindowFocus:"off",
                            						
                            						swipe_threshold: 75,
                            						swipe_min_touches: 1,
                            						drag_block_vertical: false,
                            																		
                            																		
                            						keyboardNavigation:"off",
                            						
                            						navigationHAlign:"center",
                            						navigationVAlign:"bottom",
                            						navigationHOffset:0,
                            						navigationVOffset:20,
                            
                            						soloArrowLeftHalign:"left",
                            						soloArrowLeftValign:"center",
                            						soloArrowLeftHOffset:20,
                            						soloArrowLeftVOffset:0,
                            
                            						soloArrowRightHalign:"right",
                            						soloArrowRightValign:"center",
                            						soloArrowRightHOffset:20,
                            						soloArrowRightVOffset:0,
                            								
                            						shadow:0,
                            						fullWidth:"on",
                            						fullScreen:"off",
                            
                            						spinner:"spinner0",
                            						
                            						stopLoop:"off",
                            						stopAfterLoops:-1,
                            						stopAtSlide:-1,
                            
                            						shuffle:"off",
                            						
                            						autoHeight:"off",						
                            						forceFullWidth:"off",						
                            												
                            												
                            						hideTimerBar:"on",						
                            						hideThumbsOnMobile:"off",
                            						hideNavDelayOnMobile:1500,
                            						hideBulletsOnMobile:"off",
                            						hideArrowsOnMobile:"off",
                            						hideThumbsUnderResolution:0,
                            						
                            												hideSliderAtLimit:0,
                            						hideCaptionAtLimit:0,
                            						hideAllCaptionAtLilmit:0,
                            						startWithSlide:0,
                            						isJoomla: true
                            					});
                            					
                            					
                            					
                            									
                            				});	/*ready*/
									
			
								</script>
							</div>
							<!-- END REVOLUTION SLIDER -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="sp-main-body">
		<div class="row">
			<div id="sp-component" class="col-sm-12 col-md-12">
				<div class="sp-column ">
					<div id="system-message-container">
					</div>
					<div id="sp-page-builder" class="sp-page-builder  page-2">
						<div class="page-content">
							<section class="sppb-section " style="">
								<div class="sppb-container">
									<div class="sppb-row">
										<?php  
	                                        $thismenus=$classmenu->this_menu_on_home("services"); 
	                                            $idMenu=$thismenus["id_menu"]; 
	                                            /*$titreSsMenu=$tabSmenu["titre_smenu"];
	                                            $contenusMenu=$tabSmenu["contenu_smenu"];
								                $titleMenu=stripcslashes($this_menu["titre_menu"]);
								                $libMenu=stripcslashes($this_menu["libelle_menu"]);*/

								                $tabSmenu=$classSousmenu->this_smenu_menu_by_position($idMenu,1,"o");
                                            	$idSMenu=$tabSmenu["id_smenu"];
	                                            $tabArticle=$classarticle->liste_article_by_smenu_action_publier($idSMenu,6,"order by position_article"); 
		                                            if($tabArticle->rowCount()>0){
		                                                foreach($tabArticle as $tabArticleValue){
		                                                    $titreArticle=stripcslashes($tabArticleValue["titre_article"]);
		                                                    $libArticle=stripcslashes($tabArticleValue["libelle_article"]);
		                                                    $autresArticle=stripcslashes($tabArticleValue["autres_article"]);
		                                                    $contenuArticle=stripcslashes($tabArticleValue["contenu_article"]);
		                                                    
		                                                    $contenuArticleCoupe=$classutilitaire->coupeTexte($contenuArticle,100);  
		                                                    $fichierArticle=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabArticleValue["fichier_article"]); 
	                                    ?> 
										<div class="sppb-col-sm-4" style="padding-bottom: 30px;">
											<div class="sppb-addon-container" style="">
												<div class="sppb-addon sppb-addon-feature sppb-text-center ">
													<div class="sppb-addon-content">
														<div class="sppb-icon">
															<span style="display:inline-block;text-align:center;;">
																<i class="fa <?php echo $libArticle ?>" style="font-size:42px;width:42px;height:42px;line-height:42px;">
																</i>
															</span>
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

										<?php   
												}
                                            }else{
                                               echo "<h3>AUCUNE INFORMATION DISPONIBLE</h3>";
                                            }  
                                       ?>   
									</div>
								</div>
							</section>  
							<section class="sppb-section no-padding-top" style="">
								<div class="sppb-container">
									<div class="sppb-row">
										<div class="sppb-col-sm-6">
											<div class="sppb-addon-container" style="">
												<div class="sppb-addon sppb-addon-cta " style="">
													<div class="align-bottom">
														<h2 class="sppb-cta-title" style="">
															Bienvenue sur
															<strong>
																MASTERSOLUT
															</strong> 
														</h2>
														<?php 
															$thismenus=$classmenu->this_menu_on_home("societe"); 
						                                            $idMenuSociete=$thismenus["id_menu"]; 

						                                             $tabSmenu=$classSousmenu->this_smenu_menu_by_position($idMenuSociete,1,"o");
					                                            	$idSMenuPres=$tabSmenu["id_smenu"];
						                                            $titresMenu=$tabSmenu["titre_smenu"]; 
                                                					$image=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabSmenu["fichier_smenu"]); 
														?>
														<p class="sppb-cta-text">
															<img class="sppb-img-responsive" src="<?php echo $image ?>" style=" width: 100%; height: 90%;"	alt="<?php echo $titreSsMenu ?>" title="<?php echo $titreSsMenu ?>"/> 
														</p> 
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
													                /*$titleMenu=stripcslashes($this_menu["titre_menu"]);
													                $libMenu=stripcslashes($this_menu["libelle_menu"]);*/ 
						                                            $tabArticle=$classarticle->liste_article_by_smenu_action_publier($idSMenuPres,6,"order by position_article"); 
							                                            if($tabArticle->rowCount()>0){
							                                                foreach($tabArticle as $tabArticleValue){
							                                                    $titreArticle=stripcslashes($tabArticleValue["titre_article"]);
							                                                    $libArticle=stripcslashes($tabArticleValue["libelle_article"]);
							                                                    $autresArticle=stripcslashes($tabArticleValue["autres_article"]);
							                                                    $contenuArticle=stripcslashes($tabArticleValue["contenu_article"]);
							                                                    
							                                                    $contenuArticleCoupe=$classutilitaire->coupeTexte($contenuArticle,100);  
							                                                    $fichierArticle=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabArticleValue["fichier_article"]); 
						                                    ?> 
															<div class="sppb-panel sppb-panel-default">
																<div class="sppb-panel-heading">
																	<h2 class="sppb-panel-title">
																		<i class="fa fa-plus">
																		</i>
																		<?php echo $titreArticle ?>
																	</h2>
																</div>
																<div class="sppb-panel-collapse">
																	<div class="sppb-panel-body" style="text-align: justify;">
																		<?php echo $contenuArticleCoupe ?>
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
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<?php 
								$tabSmenuValeurs=$classSousmenu->this_smenu_menu_by_position($idMenuSociete,2,"o");
                                	$idValeurs=$tabSmenuValeurs["id_smenu"];
                                    $titresMenu=$tabSmenuValeurs["titre_smenu"]; 
                                    $contenuValeurs=stripcslashes($tabSmenuValeurs["contenu_smenu"]); 
                					$image=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($tabSmenuValeurs["fichier_smenu"]);
							?>
							<section class="sppb-section section-dark section-parallax" style="color: rgb(255, 255, 255); background-image: url(&quot;assets/images/background/nos_valeurs.jpg&quot;); background-repeat: no-repeat; background-size: cover; background-attachment: inherit; background-position: 50% -92.9797px;"
							data-stellar-background-ratio="0.3">
								<div class="sppb-container">
									<div class="sppb-section-title sppb-text-center">
										<h3 class="sppb-title-heading" style="">
											<?php echo $titresMenu ?>
										</h3>
									</div>
									<div class="sppb-row">
										<div class="sppb-col-md-12 sppb-col-sm-12 sppb-xs-12">
											<div class="sppb-addon-container" style="">
												<div class="sppb-text-center sp-pie-chart-addon ">
													<?php echo $contenuValeurs ?> 
												</div>
											</div>
										</div> 
									</div>
								</div>
							</section> 
							<section class="sppb-section " style="">
								<div class="sppb-container">
									<div class="sppb-section-title sppb-text-center">
										<?php 
											$tab_section=$classsection->liste_section_fixed("home"); 
	            							$idSection=$tab_section["id_section"];

	            							$thisproces=$classmenu->this_menu_section_position($idSection,1); 
	            								$idMenuProces=$thisproces["id_menu"]; 
	                                            $titreProces=stripslashes($thisproces["titre_menu"]); 
	                                            $libelleMenu=stripslashes($thisproces["libelle_menu"]); 
										?> 
										<h2 class="sppb-title-heading" style="">
											<?php echo $titreProces; ?>
										</h2>
									</div>
									<div class="sppb-row">
										<div class="sppb-col-sm-12">
											<div class="sppb-addon-container" style="">
												<div class="sppb-addon sppb-addon-process ">
													<div class="sppb-addon-content">
														<div class="sppb-process ">

														<?php  
															$tabsProces=$classSousmenu->liste_smenu_by_menu_action_publier($idMenuProces,0,"order by position_smenu"); 
															foreach ($tabsProces as $Procesvalue) {
																 
                                                            $titresProces=stripslashes($Procesvalue["titre_smenu"]);
                                                            $positionProces=stripslashes($Procesvalue["position_smenu"]);
                                                            $contenusProces=stripslashes($Procesvalue["contenu_smenu"]); 
														?> 
															<div class="sppb-process-item sppb-col-md-3">
																<div class="sppb-addon-content">
																	<div class="sppb-media">
																		<div class="sppb-text-center">
																			<span class="process">
																				<?php echo $positionProces; ?>
																			</span>
																		</div>
																		<div class="sppb-media-body sppb-text-center">
																			<h3 class="sppb-process-title">
																				<?php echo $titresProces; ?>
																			</h3>
																			<p>
																				<?php echo $contenusProces; ?>
																			</p>
																		</div>
																	</div>
																</div>
															</div> 
															<?php } ?> 
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<section class="sppb-section no-padding-top" style="">
								<div class="sppb-container">
									<div class="sppb-row">
										<div class="sppb-col-sm-12">
											<div class="sppb-addon-container" style="">
												<div class="sppb-addon sppb-addon-tab ">
													<div class="sppb-addon-content sppb-tab">
													<?php 
														$thismenuFormation=$classmenu->this_menu_on_home("formations"); 
			                                            $idMenu=$thismenuFormation["id_menu"];  
										                $titleMenu=stripcslashes($thismenuFormation["titre_menu"]);
										                $libMenu=stripcslashes($thismenuFormation["libelle_menu"]);
													?>
														<div class="sppb-section-title sppb-text-center">
															<h3 class="sppb-title-heading" style="">
																<?php echo $titleMenu ?>
															</h3>
														</div> 
														<ul class="sppb-nav sppb-nav-tabs" role="tablist">
															<?php 
																$tabsForma=$classSousmenu->liste_smenu_by_menu_action_publier($idMenu,0,"order by position_smenu"); 
															foreach ($tabsForma as $formaValue) {
																 
                                                            $titreForma=stripslashes($formaValue["titre_smenu"]);
                                                            $libelleForma=stripslashes($formaValue["libelle_smenu"]);
                                                            $positionForma=stripslashes($formaValue["position_smenu"]);
                                                            $contenuForma=stripslashes($formaValue["contenu_smenu"]);  
															?> 
															<li class="<?php if($positionForma==1) echo "active" ?> ">
																<a role="tab" data-toggle="sppb-tab"><i class="<?php echo $libelleForma ?>"></i>  <span class="sppb-addon-tab-title"><?php echo $titreForma ?></span></a>
															</li> 
															<?php } ?>
														</ul>
														<div class="sppb-tab-content">
															<?php 
																$tabsForma=$classSousmenu->liste_smenu_by_menu_action_publier($idMenu,0,"order by position_smenu"); 
															foreach ($tabsForma as $formaValue) { 
                                                            $idForma=stripslashes($formaValue["id_smenu"]); 
                                                            $position=stripslashes($formaValue["position_smenu"]); 
							                                $fichierForma=FOLDER_ADMIN.DOSSIER_FICHIER.stripcslashes($formaValue["fichier_smenu"]);   
															?> 

																<div class="sppb-tab-pane sppb-fade <?php if($position==1) echo "active"; ?> in">
																	<div class="sppb-media">
																		<div class="pull-left">
																			<img class="sppb-img-responsive" alt=" " src="<?php echo $fichierForma ?>" width="500" />
																		</div> 
																		<?php 
																			$tabArticle=$classarticle->liste_article_by_smenu_action_publier($idForma,0,"order by position_article"); 
								                                            if($tabArticle->rowCount()>0){
								                                                foreach($tabArticle as $tabArticleValue){
								                                                    $titreArticle=stripcslashes($tabArticleValue["titre_article"]);
								                                                    $libArticle=stripcslashes($tabArticleValue["libelle_article"]);
								                                                    $autresArticle=stripcslashes($tabArticleValue["autres_article"]);
																		?>
																			<h3> 
																					<strong><i class="fa fa-hand-o-right"></i></strong>
																					<?php echo $titreArticle  ?>
																			</h3>
																			<br/><br/>
																		<?php } 
                                                                        }else{
        					                                               echo "<h3>AUCUNE INFORMATION DISPONIBLE</h3>";
        					                                            } 
                                                                ?> 
																	</div>
																</div>
															<?php } 
																
					                                        ?>    
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section> 
										<section class="sppb-section section-bg" style="">
										<div class="sppb-container">
											<?php 
												$tab_section=$classsection->liste_section_fixed("home"); 
		            							$idSection=$tab_section["id_section"];

		            							$thisHosting=$classmenu->this_menu_section_position($idSection,2); 
		            								$idMenuHosting=$thisHosting["id_menu"]; 
		                                            $titreHosting=stripslashes($thisHosting["titre_menu"]); 
		                                            $libelleMenuHosting=stripslashes($thisHosting["libelle_menu"]); 
											?> 
											<div class="sppb-section-title sppb-text-center">
												<h3 class="sppb-title-heading" style="">
													<?php echo $titreHosting ?>
												</h3>
												<p>
													<?php echo $libelleMenuHosting ?> 
												</p>
											</div>
											<div class="sppb-row">
												<div class="sppb-col-sm-12">
													<div class="sppb-addon-container" style="">
														<div class="sppb-addon sppb-addon-pricing sppb-text-center ">
															<div class="sppb-addon-content">
																<div class="sppb-row">
																	<?php  
																		$tabsHosting=$classSousmenu->liste_smenu_by_menu_action_publier($idMenuHosting,0,"order by position_smenu"); 
																		foreach ($tabsHosting as $Hostingvalue) {
																			 
			                                                            $titresHosting=stripslashes($Hostingvalue["titre_smenu"]);
			                                                            $libellesHosting=stripslashes($Hostingvalue["libelle_smenu"]);
			                                                            $positionHosting=stripslashes($Hostingvalue["position_smenu"]);
			                                                            $contenusHosting=stripslashes($Hostingvalue["contenu_smenu"]); 
																	?> 

																	<div class="sppb-col-xs-12 sppb-col-sm-6 sppb-col-md-3">
																		<div class="sppb-addon-pricing-container">
																			<h2 style="color: #5faba3; padding-top: 20px;">
																				<?php echo $titresHosting ?>
																			</h2>
																			<div class="price">
																				<span class="pricing-currency">
																					<?php echo $libellesHosting ?> 
																				</span>		 	 
																			</div>
																			 <?php echo $contenusHosting ?>
																		</div>
																	</div>
																	<?php } ?>
  
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</p>