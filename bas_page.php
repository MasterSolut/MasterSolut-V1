			<section id="sp-bottom">
				<div class="container">
					<div class="row">
						<div id="sp-bottom1" class="col-sm-6 col-md-4">
							<div class="sp-column ">
								<div class="sp-module ">
									<h3 class="sp-module-title">
										Partenaires & Clients
									</h3>
									<div class="sp-module-content">
										<div class="custom">  
                                         <?php
                                        	$nospartenaires=$classalbum->liste_album_section_fixed("nos-partenaires","album",1)->fetch();                
                                            $idnospartenaires=$nospartenaires["id_album"]; 
                                            $libnospartenaires=stripslashes($nospartenaires["lib_section"]);                          	
                                            ?>    
    													<div class="showcase">
                                                        <?php
                                                        	$tabpartenaires=$classphoto->liste_photo_by_album_publier($idnospartenaires,0,"ORDER BY position_photo ASC");
                                                            foreach($tabpartenaires as $tabpartenairesValues){
                                                               $titrepartenaires=stripslashes($tabpartenairesValues["titre_photo"]);
                                                               $lienpartenaires=stripslashes($tabpartenairesValues["libelle_photo"]);
                                                               $href="javascript:void(0)";
                                                               if ($lienpartenaires) {
                                                                   $href="http://".$lienpartenaires;
                                                               }
                                                               $srcpartenaires=FOLDER_ADMIN.DOSSIER_ALBUM.$tabpartenairesValues["src_photo"];
                                                        ?>
    														<div class="showcase-image">
    															<a target="_blank"  href="<?php echo $href ?>" >
                                                                    <img class="sppb-img-responsive" src="<?php echo $srcpartenaires ?>" title="<?php echo $titrepartenaires ?>" alt="<?php echo $titrepartenaires ?>" style="width: 100%; height: 200px;" />
                                                                </a>
    														</div>  
                                                            <?php } ?>   
    													</div> 
    												</div>
									</div>
								</div>
							</div>
						</div>
						<div id="sp-bottom2" class="col-sm-6 col-md-4">
							<div class="sp-column ">
								<div class="sp-module ">
									<h3 class="sp-module-title">
										Contact
									</h3>
									<div class="sp-module-content">
										<div class="latestnews">
											 
											<div> 
												 <i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo $tel_contact ?>
											</div>
											<div >
												<i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo $mail_contact ?>
											</div>
											<div >
												<i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $adresse ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="sp-bottom3" class="col-sm-6 col-md-4">
							<div class="sp-column ">
								<div class="sp-module ">
									<h3 class="sp-module-title">
										R&eacute;seaux sociaux
									</h3>  
			                            <div style="width: 100%; heigth: 100%;" class="fb-page" data-href="https://www.facebook.com/mastersolut" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
			                                <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/mastersolut"><a target="_blank" href="https://www.facebook.com/mastersolut">MasterSolut</a></blockquote>
			                                </div>
			                            </div>  
								</div>
								<div class="sp-module ">
									<div class="sp-module-content">
										<div id="sp-tweet-id116">
											<div class="sp-tweet">
												<div class="sp-tweet-item">
													<div class="pull-left sp-tweet-avatar ">
														<a href="https://twitter.com/mastersoluts" class="twitter-follow-button"  data-show-count="false" data-lang="fr" data-size="large">Suivre MasterSolut</a>  
													</div> 
												</div>
												<!-- <div class="sp-tweet-item">
													<div class="pull-left sp-tweet-avatar ">
														<a target="_blank" href="http://twitter.com/envato">
														<i class="fa fa-twitter fa-3x"></i>
														</a>
													</div>
													<div class="sp-tweet-body">
														<span>
															<a target="_blank" href="http://twitter.com/mastersoluts">MasterSolut</a>
														</span>
														 
													</div>
												</div> -->
											</div>
											<div class="sp-tweet-clr">
											</div> 
										</div>
										<script type="text/javascript">
											
        jQuery(function($) {
            $(document).ready(function(){
                $('#sp-tweet-id116').sptweetSlide({
                    'morphDuration':300,
                    'animationPeriodicalTime':8000                });
            }); 
        });
        
										</script>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
<div id="fb-root"></div>
