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
              Liste des NewsLetter<a id="dynamic-tables">s</a> 
            </div>
            <span class="tools">
                <a href="javascript:openwindows('newsletters_form.php',1500,1000,true)" class="btn btn-primary">
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
                    <th style="width:40%">
                      Objet
                    </th>
                    <th style="width:30%">
                      Date
                    </th>
                    <th style="width:10%">
                      Nombre recus
                    </th> 
                    <th style="width:20%" class="hidden-phone">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    //$i=1;
                	$tab_newsletters=$classnewsletters->liste_newsletters(0,"ORDER BY objet_newsletters ASC");
                    foreach($tab_newsletters as $newslettersValue){
                        $idnewsletters=$newslettersValue["id_newsletters"];
                        $objet_newsletters=stripslashes($newslettersValue["objet_newsletters"]);
                        $date_newsletters=stripslashes($newslettersValue["date_newsletters"]); 
                        $nombre_recu=stripslashes($newslettersValue["nombre_recu"]); 
                ?>
                  <tr>
                    <td>
                     <?php echo $objet_newsletters; ?>
                    </td>
                    <td>
                      <?php echo $date_newsletters; ?>
                    </td> 
                    <td>
                      <?php echo $nombre_recu; ?>
                    </td>  
                    <td> 
                      <a  data-original-title="" title="Modifier" href="javascript:openwindows('newsletters_form.php?mod=<?php echo $idnewsletters ?>',1500,1000,false)" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                      </a>
                      <a  data-original-title="" title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('newsletters_form.php?supp_newsletters=<?php echo $idnewsletters ?>',20,40,false)" class="btn btn-danger">
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