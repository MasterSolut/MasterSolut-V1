<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */ 
    $this_menu=$classmenu->this_menu($idMenu);
    $titreMenu=stripslashes($this_menu["titre_menu"]); 
?>  
   <!-- Row Start -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              Liste des sous  menu de <?php echo $titreMenu; ?></a> 
            </div>
            <span class="tools">
                <a href="javascript:openwindows('smenu_form.php?menu=<?php echo $idMenu ?>',1500,1000,false)" class="btn btn-primary">
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
                    <th style="width:15%">
                      Titre
                    </th>
                    <th style="width:15%">
                      Lien-Fixe
                    </th>
                    
                    <th style="width:10%">
                      Position
                    </th>
                    <th style="width:10%">
                      Afficher in menu
                    </th>
                    <th style="width:10%">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                	$tab_smenu=$classSousmenu->liste_smenu_by_menu($idMenu,0,"ORDER BY position_smenu ASC");                    
                    foreach($tab_smenu as $smenuValue){ 
                        $idsmenu=$smenuValue["id_smenu"];
                        $titresmenu=stripslashes($smenuValue["titre_smenu"]);
                        $libellesmenu=stripslashes($smenuValue["libelle_smenu"]); 
                        $positionsmenu=$smenuValue["position_smenu"];
                        $publiersmenu=$smenuValue["publier_smenu"]; 
                        
                        /*$thisPage=$classpage->this_page($smenuValue["page_smenu"]);
                        $pageSMenu=$thisPage["titre_page"];
                        
                        $thisNews=$classnews->this_news($smenuValue["news_smenu"]);
                        $newssmenu=$thisNews["titre_news"]; */
                ?>
                  <tr>
                    <td style="color: blue; text-decoration: underline;">
                        <a title="Ajouter des articles" href="?page=<?php echo $_GET["page"] ?>&menu_smenu=<?php echo $_GET["menu_smenu"] ?>&smenu=<?php echo $idsmenu ?>"  >
                             <?php echo $titresmenu; ?> 
                        </a> 
                    </td>
                    <td>
                      <?php echo $libellesmenu; ?>
                    </td>
                     
                    <td class="hidden-phone">
                      <?php echo $positionsmenu; ?>
                    </td>
                    <td class="hidden-phone">
                      <?php  
                        $checkbox="";
                        if($publiersmenu=="o"){
                            $checkbox= "checked='checkbox'";
                        }
                      ?> 
                      <input type="checkbox" disabled="disabled" class="no-margin" <?php echo $checkbox ?>  /> 
                    </td>
                    <td>
                       <a  data-original-title="" title="Ajouter un sous smenu" href="?page=<?php echo $_GET["page"] ?>&menu_smenu=<?php echo $_GET["menu_smenu"] ?>&smenu=<?php echo $idsmenu ?>" class="btn btn-info">
                            <i class="fa fa-arrow-down"></i>
                      </a>
                      <a  data-original-title="" title="Modifier" href="javascript:openwindows('smenu_form.php?menu=<?php echo $idMenu ?>&mod=<?php echo $idsmenu ?>',1500,1000,false)" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                      </a>
                      <a  data-original-title="" title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('smenu_form.php?supp_smenu=<?php echo $idsmenu ?>',20,40,false)" class="btn btn-danger">
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