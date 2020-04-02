<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */ 
?>  
   <!-- Row Start -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              Liste des menu<a id="dynamic-tables">s</a> 
            </div>
            <span class="tools">
                <a href="javascript:openwindows('menu_form.php',1800,1400,false)" class="btn btn-primary">
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
                    <th style="width:30%">
                      Titre
                    </th>
                    <th style="width:20%">
                      Section
                    </th>
                    <th style="width:10%">
                      Visible sur Acceuil:
                    </th> 
                    <th style="width:10%" style="text-align: center;" class="hidden-phone">
                      Position
                    </th>
                    <th style="width:10%" class="hidden-phone">
                      Publier
                    </th>
                    <th style="width:20%" class="hidden-phone">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    //$i=1;
                	$tab_menu=$classmenu->liste_menu(0,"ORDER BY id_section,position_menu ASC");
                    foreach($tab_menu as $menuValue){
                        $idMenu=$menuValue["id_menu"];
                        $titreMenu=stripslashes($menuValue["titre_menu"]);
                        $libelleMenu=stripslashes($menuValue["libelle_menu"]);
                        
                        //$thisNews=$classnews->this_news($menuValue["plugins_menu"]);
                        //$newsMenu=$thisNews["titre_news"]; 
                        $positionMenu=$menuValue["position_menu"];
                        $publierMenu=$menuValue["publier_menu"];
                        
                        $visibleAcceuil=$menuValue["affiche_acceuil"];
                        
                        $this_section=$classsection->this_section($menuValue["id_section"]); 
                        $libSection=stripslashes($this_section["lib_section"]);  
                ?>
                  <tr >
                    <td style="color: blue; text-decoration: underline;">
                        <a title="Ajouter des sous menus" href="?page=<?php echo $_GET["page"] ?>&menu_smenu=<?php echo $idMenu ?>">
                             <?php echo $titreMenu; ?> 
                        </a> 
                    </td>
                    <td>
                      <?php echo $libSection; ?>
                    </td>
                    <td style="text-align: center;">
                      <?php echo $visibleAcceuil; ?>
                    </td>
                    
                    <td class="hidden-phone" style="text-align: center;">
                      <?php echo $positionMenu; ?>
                    </td>
                    <td class="hidden-phone">
                      <?php  
                        $checkbox="";
                        if($publierMenu=="o"){
                            $checkbox= "checked='checkbox'";
                        }
                      ?>
                      <input type="checkbox" disabled="disabled" class="no-margin" <?php echo $checkbox ?>  /> 
                    </td>
                    <td>
                       <a  data-original-title="" title="Ajouter un sous menu" href="?page=<?php echo $_GET["page"] ?>&menu_smenu=<?php echo $idMenu ?>" class="btn btn-info">
                            <i class="fa fa-arrow-down"></i>
                      </a>
                      <a  data-original-title="" title="Modifier" href="javascript:openwindows('menu_form.php?mod=<?php echo $idMenu ?>',1800,1400,false)" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                      </a>
                      <a  data-original-title="" title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('menu_form.php?supp_menu=<?php echo $idMenu ?>',20,40,false)" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>
                      </a>
                    </td>
                  </tr>
                 <?php 
                    $i++;
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