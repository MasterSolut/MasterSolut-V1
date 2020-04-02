<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */  
    $tab_abonner=$classsection->liste_abonner(0,"ORDER BY id DESC");
    $effectifs=$tab_abonner->rowCount();
?>    
   <!-- Row Start -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              Liste des Abonn&eacute;<a id="dynamic-tables">s</a> 
            </div>
            <span class="tools">
                Effectif:<?php echo $effectifs?> 
            </span> 
          </div>
          <div class="widget-body">
            <div id="dt_example" class="example_alt_pagination">
              <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table"> 
                <thead>
                  <tr> 
                    <th style="width:40%">
                      Email
                    </th>
                    <th style="width:30%">
                      Date
                    </th> 
                    <th style="width:20%" class="hidden-phone">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                	$tab_newsletters=$classnewsletters->liste_newsletters(0,"ORDER BY objet_newsletters ASC");
                    foreach($tab_abonner as $tab_abonnerValue){
                        $idnewsletters=$tab_abonnerValue["id"];
                        $emailnewsletters=$tab_abonnerValue["email"];
                        $date_time=stripslashes($tab_abonnerValue["date"]);
                        list($date, $time) = explode(" ", $date_time);
                        $date_newsletters=$classutilitaire->datesql_to_frenchdate (stripslashes($tab_abonnerValue["date"]))."  ".$time;
                        //$date_newsletters=stripslashes($tab_abonnerValue["date"]); 
                ?>
                  <tr>
                    <td>
                     <?php echo $emailnewsletters; ?>
                    </td>
                    <td>
                      <?php echo $date_newsletters; ?>
                    </td>   
                    <td>  
                      <a  data-original-title="" title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('supprimer_abonner.php?supp_abonner=<?php echo $idnewsletters ?>',20,40,false)" class="btn btn-danger">
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