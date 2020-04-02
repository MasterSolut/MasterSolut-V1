<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    $idalbum=$_GET["album"];
    if(!$idalbum){
?>    
<!-- Row Start -->
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          Liste des Album<a id="dynamic-tables">s</a> 
        </div>
        <span class="tools">
            <a href="javascript:openwindows('album_form.php',800,400,true)" class="btn btn-primary">
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
                  Libell&eacute;
                </th>
                <th style="width:10%">
                  Section
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
            	$tab_album=$classalbum->liste_album(0,"ORDER BY titre_album ASC");
                foreach($tab_album as $albumValue){
                    $idalbum=$albumValue["id_album"];
                    $titrealbum=stripslashes($albumValue["titre_album"]);
                    $libellealbum=stripslashes($albumValue["libelle_album"]); 
                    $fixealbum=stripslashes($albumValue["fixe_album"]); 
                    $publieralbum=$albumValue["publier_album"];  
                    
                    $this_section=$classsection->this_section($albumValue["id_section"]); 
                    $libSection=stripslashes($this_section["lib_section"]); 
            ?>
              <tr>
                <td >
                    <a style="color: blue;" href="?page=<?php echo $_GET["page"];?>&album=<?php echo $idalbum;?>" title="Visualiser ces photos">
                        <?php echo $titrealbum; ?>
                    </a>
                </td>
                <td>
                  <?php echo $libellealbum; ?>
                </td> 
                <td>
                  <?php echo $libSection; ?>
                </td> 
                <td class="hidden-phone">
                  <?php  
                    $checkbox="";
                    if($publieralbum=="o"){
                        $checkbox= "checked='checkbox'";
                    }
                  ?>
                  <input type="checkbox" disabled="disabled" class="no-margin" <?php echo $checkbox ?>  /> 
                </td>
                <td> 
                  <a title="Modifier" href="javascript:openwindows('album_form.php?mod=<?php echo $idalbum ?>',1000,400,false)" class="btn btn-warning">
                        <i class="fa fa-pencil"></i>
                  </a>
                  <a title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('album_form.php?supp_album=<?php echo $idalbum ?>',20,40,false)" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                  </a>
                  <a title="Photos" href="javascript:openwindows('photo_form.php?album=<?php echo $idalbum ?>',1500,1000,false)" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i>
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
<?php  
    }else{
         $this_album=$classalbum->this_album($idalbum); 
         $titre=stripslashes($this_album["titre_album"]);
?>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              Les photos de l'album <?php echo $titre ?>
              
            </div>
            <span class="tools">
            <a href="javascript:openwindows('photo_form.php?album=<?php echo $idalbum ?>',1500,1000,false)" class="btn btn-primary">
                  <span class="fa fa-picture-o"></span>
                    Ajouter
            </a>
        </span> 
          </div>
          <div class="widget-body clearfix">
            <div class="row">
                <?php
                    $tabPhoto=$classphoto->liste_photo_by_album($idalbum);
                    if($tabPhoto->rowCount()>0){
                    foreach($tabPhoto as $photoValue){
                        $titre_photo=stripslashes($photoValue["titre_photo"]);
                        $src_photo=DOSSIER_ALBUM.stripslashes($photoValue["src_photo"]); 
                ?>
                  <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <img data-src="holder.js/300x200" alt="300x200" title="<?php echo $titre_photo ?>" src="<?php echo $src_photo ?>" style="width: 100px; height: 100px;"/>
                      <div class="caption">
                        <h5><?php echo $titre_photo ?></h5> 
                        <p><a title="Modifer" data-original-title="" href="javascript:openwindows('photo_form.php?album=<?php echo $idalbum ?>&mod=<?php echo $photoValue["id_photo"] ?>',1000,400,false)" class="btn btn-warning" role="button"><i class="fa fa-pencil"></i></a> 
                            <a title="Supprimer" data-original-title="" href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('photo_form.php?supp_photo=<?php echo $photoValue["id_photo"] ?>',20,40,false)" class="btn btn-danger" role="button"><i class="fa fa-times"></i></a>
                        </p>
                      </div>
                    </div>
                  </div>
                 <?php    
                    } 
                    }else{
                        echo "<div class='alert alert-block alert-danger  fade in'>AUCUNE PHOTO DISPONIBLE</div>";
                    }
                ?>   
            </div>
          </div>
        </div>
      </div>
    </div> 
<?php  
    }
?>



