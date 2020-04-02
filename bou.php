        <section id="sp-main-body">
    		<div class="row">
    			<div id="sp-component" class="col-sm-12 col-md-12">
    				<div class="sp-column ">
    					<div id="system-message-container">
    					</div>
    					<div id="sp-page-builder" class="sp-page-builder  page-2">
    						<div class="page-content">
       			                  <section class="sppb-section section-dark" style="background-color: #539e96/*#EDEDED*/; ">
    								<div class="sppb-container">
                                         <?php
                                        	$nospartenaires=$classalbum->liste_album_section_fixed("nos-partenaires","album",1)->fetch();                
                                            $idnospartenaires=$nospartenaires["id_album"]; 
                                            $libnospartenaires=stripslashes($nospartenaires["lib_section"]);                          	
                                            ?>       
    									<div class="sppb-section-title sppb-text-center">
    										<h3 class="sppb-title-heading"><?php echo $libnospartenaires ?></h3>
    									</div> 
    									<div class="sppb-row">
    										<div class="sppb-col-sm-12">
    											<div class="sppb-addon-container">
    												<div class="sppb-addon sppb-addon-client-showcase text-center">
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
    							</section> 
        		              </div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</section> 