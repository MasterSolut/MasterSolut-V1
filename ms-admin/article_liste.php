<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */  
    $thissmenu=$classSousmenu->this_smenu($idSmenu);
    $titreSMenu=stripslashes($thissmenu["titre_smenu"]); 
?>  
   <!-- Row Start -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              Liste des articles du sous menu <strong> <u> <?php echo $titreSMenu; ?> </u></strong></a> 
            </div>
            <span class="tools">
                <a href="?page=<?php echo $_GET["page"] ?>&menu_smenu=<?php echo $_GET["menu_smenu"] ?>" class="btn btn-warning">
                      <span class="fa fa-arrow-left"></span>
                        Retour
                </a>
                <a href="javascript:openwindows('article_form.php?smenu=<?php echo $idSmenu ?>',1500,1000,false)" class="btn btn-primary">
                      <span class="fa fa-plus"></span>
                        Nouveau
                </a>
            </span> 
          </div>
          <div class="widget-body">
            <div id="dt_example" class="example_alt_pagination">
              <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table"> 
                <thead>
                  <tr> 
                    <th style="width:20%">
                      Titre
                    </th>
                    <th style="width:35%">
                      Libell&eacute;
                    </th>
                  <?php 
                        $titrebip=$classutilitaire->format_url($titreSMenu);  
                        if($titrebip=="en-cours"){ 
                  ?> 
                    <th style="width:15%">
                      R&eacute;alis&eacute;?
                    </th> 
                <?php } ?> 
                    
                    <th style="width:5%">
                      Position
                    </th>
                    <th style="width:5%">
                      Publier
                    </th>
                    <th style="width:10%">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                	$tab_article=$classarticle->liste_article_by_smenu($idSmenu,0,"ORDER BY id_smenu,position_article ASC");
                    foreach($tab_article as $articleValue){
                        $idarticle=$articleValue["id_article"];
                        $titrearticle=stripslashes($articleValue["titre_article"]);
                        $libellearticle=stripslashes($articleValue["libelle_article"]); 
                        $positionarticle=$articleValue["position_article"];
                        $publierarticle=$articleValue["publier_article"];  
                        $projetarticle=$articleValue["projets_article"];  
                        $visibleAcceuil=$articleValue["visible_accueil"];
                ?>
                  <tr>
                    <td>
                        <?php echo $titrearticle; ?>
                    </td>
                    <td>
                      <?php echo $libellearticle; ?>
                    </td>
                    
                    <?php 
                        $titrebip=$classutilitaire->format_url($titreSMenu);  
                        if($titrebip=="en-cours"){ 
                    ?> 
                        <td class="hidden-phone">
                          <?php echo $projetarticle; ?>
                        </td>
                    <?php } ?>
                     
                    <td class="hidden-phone">
                      <?php echo $positionarticle; ?>
                    </td>
                    <td class="hidden-phone">
                      <?php  
                        $checkbox="";
                        if($publierarticle=="o"){
                            $checkbox= "checked='checkbox'";
                        }
                      ?> 
                      <input type="checkbox" disabled="disabled" class="no-margin" <?php echo $checkbox ?>  /> 
                    </td>
                    <td> 
                      <a  data-original-title="" title="Modifier" href="javascript:openwindows('article_form.php?smenu=<?php echo $idSmenu ?>&mod=<?php echo $idarticle ?>',1500,1000,false)" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                      </a>
                      <a  data-original-title="" title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('article_form.php?supp_article=<?php echo $idarticle ?>',20,40,false)" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>
                      </a>
                    </td>
                  </tr>
                 <?php  
                    }
                ?>
                </tbody>
              </table>
              <div class="clearfix">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Row End -->