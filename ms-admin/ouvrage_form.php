<?php 
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include('config.php'); 
    include('./include_top.php');
    
    if(isset($_GET['supp_ouvrages'])){
             $classouvrages->supprimer_ouvrages($_GET['supp_ouvrages']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
    }else{ 
            if(isset($_GET['mod'])) $mod=$_GET['mod'];
        if($_POST['titre_ouvrages'] && $_POST['auteur_ouvrages']){  
            
            if(isset($_FILES["fichier_ouvrages"]))
        	{
        	   $SQLfichier_name='';
        		$fichier =$_FILES["fichier_ouvrages"]; 			 
        		if($fichier['size']>0)
        		{ 
        			$fichier_name = $fichier['name'];
        			list($name,$extension) = explode(".",$fichier_name); 
        			$type = $fichier['type'];
                    $fichier_name=preg_replace("#[^a-zA-Z]#", "", str_replace(' ','',$_POST['titre_ouvrages'])).time().".".$extension;            			 
        			$upload_dir = DOSSIER_FICHIER; 
        			if(move_uploaded_file($fichier['tmp_name'], $upload_dir.$fichier_name))
        			{
        				$reussie= true;
                        $SQLfichier_name=$fichier_name; 
        			}else{
        				echo "<p>";
                        echo "Erreur de chargement du fichier";
                        echo "</p>";
        				$fichier_name ='';
        			}
        		} 
        	}
            
            $options=array("titre_ouvrages"=>addslashes($_POST['titre_ouvrages']), 
                           "auteur_ouvrages"=>addslashes($_POST['auteur_ouvrages']),
                           "editeur_ouvrages"=>addslashes($_POST['editeur_ouvrages']),  
                           "nbrepages_ouvrages"=>addslashes($_POST['nbrepages_ouvrages']), 
                           "annee_ouvrages"=>addslashes($_POST['annee_ouvrages']),  
                           "annee_ouvrages"=>$SQLfichier_name,
                           "id_nature"=>addslashes($_POST['id_nature']), 
                           "id_ouvrages"=>$_POST['mod']); 
            if(intval($_POST['mod'])>1){ 
                $etatMAJ=$classouvrages->modification_ouvrages($options);
            }else{
                $etatMAJ=$classouvrages->insertion_ouvrages($options); 
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
            $this_ouvrages=$classouvrages->this_ouvrages($_GET['mod']); 
        }   
?>  
<div class="dashboard-wrapper">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              <h4 class="modal-title">Enregistrement des Ouvrages </h4>
            </div>
          </div>
          <div class="widget-body">
                <?php echo $notification ?> 
                <form class="form-horizontal no-margin" id="edit" method="post" enctype="multipart/form-data">
                    <div class="modal-body"> 
                      <div class="form-group">
                        <label for="titre_ouvrages" class="col-sm-1 control-label">Titre <span  style="color: red;">*</span> </label>
                        <div class="col-sm-7">
                          <input required="" type="text" class="form-control" name="titre_ouvrages" value="<?php echo stripslashes($this_ouvrages["titre_ouvrages"]) ?>"  placeholder="Titre"/> 
                          <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                        </div> 
                        <label for="annee_ouvrages" class="col-sm-1 control-label">Ann&eacute;e <span  style="color: red;">*</span></label>
                        <div class="col-sm-2">
                          <input  type="text" class="form-control" name="annee_ouvrages" value="<?php echo stripslashes($this_ouvrages["annee_ouvrages"]) ?>"  placeholder="Ann&eacute;e de publication"/>
                        </div>
                      </div> 
                      
                      <div class="form-group">
                        <label for="auteur_ouvrages" class="col-sm-1 control-label">Auteur <span  style="color: red;">*</span> </label>
                        <div class="col-sm-10">
                          <input required="" type="text" class="form-control" name="auteur_ouvrages" value="<?php echo stripslashes($this_ouvrages["auteur_ouvrages"]) ?>"  placeholder="Nom & Pr&eacute;noms"/>  
                        </div>  
                      </div> 
                      
                      <div class="form-group">
                        <label for="editeur_ouvrages" class="col-sm-1 control-label">Editeur <span  style="color: red;">*</span> </label>
                        <div class="col-sm-7">
                          <input required="" type="text" class="form-control" name="editeur_ouvrages" value="<?php echo stripslashes($this_ouvrages["editeur_ouvrages"]) ?>"  placeholder="Editeur"/>  
                        </div> 
                        <label for="nbrepages_ouvrages" class="col-sm-1 control-label">Page <span  style="color: red;">*</span></label>
                        <div class="col-sm-2">
                          <input required="" type="text" class="form-control" name="nbrepages_ouvrages" value="<?php echo stripslashes($this_ouvrages["nbrepages_ouvrages"]) ?>"  placeholder="Nombre de Pages"/>
                        </div>
                      </div> 
                      
                      <div class="form-group">
                        <label for="id_nature" class="col-sm-1 control-label">Nature <span  style="color: red;">*</span> </label>
                        <div class="col-sm-4">
                            <select  name="id_nature" class="form-control"> 
                                  <option selected="selected" value=" ">- Nature -</option>
                                  <?php 
                                     $tabnature=$classnature->liste_nature(0,"ORDER BY lib_nature ASC");  
                                     foreach($tabnature as $tabnatureValue){
                                        $idnature=$tabnatureValue["id_nature"];
                                        $libnature=stripslashes($tabnatureValue["lib_nature"]); 
                                  ?>  
                                    <option value="<?php echo $idnature ?>" <?php if($this_ouvrages["id_nature"]==$idnature) echo "selected=selected" ?> ><?php echo $libnature ?></option> 
                                  <?php }?>
                            </select>
                        </div>
                        <label for="nbrepages_ouvrages" class="col-sm-4 control-label">Fichier </label>
                        <div class="col-sm-2">
                            <input name="fichier_ouvrages" type="file"  value="<?php echo stripcslashes($this_ouvrages["fichier_ouvrages"]) ?>"/>
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
