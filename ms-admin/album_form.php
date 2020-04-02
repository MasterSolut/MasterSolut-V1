<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include('config.php'); 
    include('./include_top.php');
    
    if(isset($_GET['supp_album'])){
             $classalbum->supprimer_album
             ($_GET['supp_album']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
    }else{ 
            if(isset($_GET['mod'])) $mod=$_GET['mod'];
        if($_POST['titre_album'] && $_POST['libelle_album']){ 
            if(isset($_FILES["logo_album"]))
        	{
        	   $SQLfichier_name='';
        		$fichier =$_FILES["logo_album"];				 
        		if($fichier['size'] != 0)
        		{ 
        			$fichier_name = $fichier['name'];
        			list($name,$extension) = explode(".",$fichier_name); 
        			$type = $fichier['type'];
                    $fichier_name="logo_".$_POST['nom_album'].time().".".$extension;            			 
        			$upload_dir = DOSSIER_UPLOAD; 
        			if(move_uploaded_file($fichier['tmp_name'], $upload_dir.$fichier_name))
        			{
        				$reussie= true;
                        $SQLfichier_name=$fichier_name; 
        			}
        			else
        			{
        				echo "<p>";
                        echo "Erreur de chargement du fichier";
                        echo "</p>";
        				$fichier_name ='';
        			}
        		}
        	} 
            
            $options=array("titre_album"=>addslashes($_POST['titre_album']), 
                           "libelle_album"=>addslashes($_POST['libelle_album']), 
                           "id_section"=>addslashes($_POST['id_section']),
                           "position_album"=>addslashes($_POST['position_album']),  
                           "frontal_album"=>addslashes($_POST['frontal_album']),
                           "publier_album"=>addslashes($_POST['publier_album']),
                           "id_album"=>$_POST['mod']); 
            if(intval($_POST['mod'])>1){ 
              $etatMAJ=$classalbum->modification_album($options);
            }else{
              $etatMAJ=$classalbum->insertion_album($options); 
            }
            
            if($etatMAJ){  
                $notification=$classutilitaire->notification('fa fa fa-exclamation-circle fa-lg', 'alert alert-block alert-info fade in','op&eacute;ration effectu&eacute;e avec succ&egrave;s'); 
            }else{ 
                $notification=$classutilitaire->notification('fa fa-times-circle fa-lg', 'alert alert-block alert-danger fade in no-margin','Aucune op&eacute;ration effectu&eacute;e.');  
            }    
            
            echo '<script type="text/javascript">
                         opener.location.reload();
                        </script>';  
            $mod=$_POST['mod'];
        }
        if($_GET['mod']){
            $this_album=$classalbum->this_album($_GET['mod']); 
        }   
?>  
<div class="dashboard-wrapper">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              <h4 class="modal-title">Enregistrement </h4>
            </div>
          </div>
          <div class="widget-body">
            <?php echo $notification ?> 
            <form class="form-horizontal no-margin" id="edit" method="post" enctype="multipart/form-data">
                <div class="modal-body"> 
                  <div class="form-group">
                    <label for="titre" class="col-sm-2 control-label">Titre <span  style="color: red;">*</span> </label>
                    <div class="col-sm-4">
                      <input required="" type="text" class="form-control" name="titre_album" value="<?php echo stripslashes($this_album["titre_album"]) ?>"  placeholder="Titre "/> 
                      <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                    </div> 
                    <label for="url" class="col-sm-2 control-label">Libelle <span  style="color: red;">*</span></label>
                    <div class="col-sm-4">
                      <input required="" type="text" class="form-control" name="libelle_album" value="<?php echo stripslashes($this_album["libelle_album"]) ?>"  placeholder="Libelle"/>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="fixe_album" class="col-sm-2 control-label">Fixe-album </label>
                    <div class="col-sm-4">
                        <select  name="id_section" class="form-control"> 
                          <option selected="selected" value=" ">- Section -</option>
                          <?php 
                             $tabsection=$classsection->liste_section("album",0,"ORDER BY lib_section ASC");  
                             foreach($tabsection as $tabsectionValue){
                                $idSection=$tabsectionValue["id_section"];
                                $libSection=stripslashes($tabsectionValue["lib_section"]); 
                          ?>  
                            <option value="<?php echo $idSection ?>" <?php if($this_album["id_section"]==$idSection) echo "selected=selected" ?> ><?php echo $libSection?></option> 
                          <?php }?>
                      </select>
                    </div>  
                    <label for="position_album" class="col-sm-2 control-label">Position </label>
                    <div class="col-sm-4">
                      <input required="" type="text" class="form-control" name="position_album" value="<?php echo stripslashes($this_album["position_album"]) ?>"  placeholder="Titre "/>  
                    </div>  
                  </div>
                  
                  <div class="form-group"> 
                    <label for="frontal_album" class="col-sm-2 control-label">Slider Accueil <span  style="color: red;">*</span></label>
                    <div class="col-sm-4">
                        <select  name="frontal_album" class="form-control">
                            <option selected="selected" disabled="disabled">- Entete -</option> 
                            <option value="o" <?php if($this_album["frontal_album"]=='o') echo "selected=selected"?>> o </option>
                            <option value="n" <?php if($this_album["frontal_album"]=='n') echo "selected=selected"  ?>> n </option> 
                         </select>
                    </div>
                    <label for="publier_album" class="col-sm-2 control-label">Publier <span  style="color: red;">*</span></label>
                    <div class="col-sm-4">
                        <select  name="publier_album" class="form-control">
                            <option selected="selected" disabled="disabled">- Publier -</option> 
                            <option value="o" <?php if($this_album["publier_album"]=='o') echo "selected=selected"?>> o </option>
                            <option value="n" <?php if($this_album["publier_album"]=='n') echo "selected=selected"  ?>> n </option> 
                         </select>
                    </div>
                  </div> 
                </div> 
                <div class="modal-footer">
                    <a type="submit" href="javascript:document.getElementById('edit').submit()" class="btn btn-primary">Valider</a> 
                </div>
          </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php 
    }
    include('./include_foot.php'); 
?>