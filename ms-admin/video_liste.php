<?php  
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Juin 2016
 */ 
?>    
<!-- Row Start -->
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          Liste des Video<a id="dynamic-tables">s</a> 
        </div>
        <span class="tools">
            <a href="javascript:openwindows('video_form.php',800,400,true)" class="btn btn-primary">
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
                <th style="width:40%">
                  Lien Youtube
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
            	$tab_video=$classvideo->liste_video(0,"ORDER BY position_video ASC");
                foreach($tab_video as $videoValue){
                    $idvideo=$videoValue["id_video"];
                    $titrevideo=stripslashes($videoValue["titre_video"]);
                    $codevideo=stripslashes($videoValue["code_video"]);  
                    $publiervideo=$videoValue["publier_video"];   
            ?>
              <tr>
                <td> 
                    <?php echo $titrevideo; ?> 
                </td>
                <td>
                   <?php echo $codevideo; ?>
                </td>  
                <td class="hidden-phone">
                  <?php  
                    $checkbox="";
                    if($publiervideo=="o"){
                        $checkbox= "checked='checkbox'";
                    }
                  ?>
                  <input type="checkbox" disabled="disabled" class="no-margin" <?php echo $checkbox ?>  /> 
                </td>
                <td> 
                  <a title="Modifier" href="javascript:openwindows('video_form.php?mod=<?php echo $idvideo ?>',1000,400,false)" class="btn btn-warning">
                        <i class="fa fa-pencil"></i>
                  </a>
                  <a title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('video_form.php?supp_video=<?php echo $idvideo ?>',20,40,false)" class="btn btn-danger">
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
 