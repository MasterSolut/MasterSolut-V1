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
              Liste des New<a id="dynamic-tables">s</a> 
            </div>
            <span class="tools">
                <a href="javascript:openwindows('news_form.php',1500,800,true)" class="btn btn-primary">
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
                      Titre
                    </th>
                    <th style="width:30%">
                      Libell&eacute;
                    </th>
                    <th style="width:10%">
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
                	$tab_news=$classnews->liste_news(0,"ORDER BY titre_news ASC");
                    foreach($tab_news as $newsValue){
                        $idnews=$newsValue["id_news"];
                        $titrenews=stripslashes($newsValue["titre_news"]);
                        $libellenews=stripslashes($newsValue["libelle_news"]); 
                        $publiernews=$newsValue["publier_news"];   
                ?>
                  <tr class="<?php // echo $color ?>">
                    <td>
                     <?php echo $titrenews; ?>
                    </td>
                    <td>
                      <?php echo $libellenews; ?>
                    </td> 
                    <td class="hidden-phone">
                      <?php  
                        $checkbox="";
                        if($publiernews=="o"){
                            $checkbox= "checked='checkbox'";
                        }
                      ?>
                      <input type="checkbox" disabled="disabled" class="no-margin" <?php echo $checkbox ?>  /> 
                    </td>
                    <td> 
                      <a  data-original-title="" title="Modifier" href="javascript:openwindows('news_form.php?mod=<?php echo $idnews ?>',1500,800,true)" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                      </a>
                      <a  data-original-title="" title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('news_form.php?supp_news=<?php echo $idnews ?>',20,40,false)" class="btn btn-danger">
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