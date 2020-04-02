<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */ 
    include('config.php'); 
    include('./include_top.php');
    $idMenu=$_GET["menu"]; 
     if(isset($_GET['supp_smenu'])){
             $classSousmenu->supprimer_smenu($_GET['supp_smenu']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
        }else{ 
            if(isset($_GET['mod'])) $mod=$_GET['mod'];
            if($_POST["titre_smenu"]){ 
                $SQLfichier_name='';
        		$fichier =$_FILES["fichier_smenu"]; 			 
        		if($fichier['size']>0)
        		{ 
        		  $fichier_name = $fichier['name'];
        			list($name,$extension) = explode(".",$fichier_name); 
        			$type = $fichier['type'];
                    $fichier_name=preg_replace("#[^a-zA-Z]#", "", str_replace(' ','',$_POST['titre_smenu'])).time().".".$extension;            			 
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
                $options=array("titre_smenu"=>addslashes($_POST['titre_smenu']),
                               "libelle_smenu"=>addslashes($_POST['libelle_smenu']),
                               "position_smenu"=>$_POST['position_smenu'],
                               "contenu_smenu"=>addslashes($_POST['contenu_smenu']),
                               "publier_smenu"=>$_POST['publier_smenu'],
                               "service_accueil"=>$_POST['service_accueil'],
                               "fichier_smenu"=>$SQLfichier_name,
                               "id_menu"=>$idMenu,
                               "id_smenu"=>$_POST['mod']); 
                if(intval($_POST['mod'])>0){   
                   $etatMAJ=$classSousmenu->modification_smenu($options);
                }else{ 
                  $etatMAJ=$classSousmenu->insertion_smenu($options); 
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
            $this_smenu=$classSousmenu->this_smenu($_GET['mod']); 
        }
?>
<div class="dashboard-wrapper">
 <!-- Row Start -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              Enregistrement des sous-menu<a id="dynamic-tables">s</a> 
            </div> 
          </div>
          <div class="widget-body">
             <?php echo $notification ?> 
                <form class="form-horizontal no-margin" id="edit" method="post" enctype="multipart/form-data">
                    <div class="modal-body"> 
                      <div class="form-group">
                        <label for="titre" class="col-sm-2 control-label">Titre<span  style="color: red;">*</span></label>
                        <div class="col-sm-10">
                          <input required="" type="text" class="form-control" name="titre_smenu" value="<?php echo $this_smenu["titre_smenu"] ?>"  placeholder="Titre"/>
                          <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="libelle" class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-4">
                            <textarea name="libelle_smenu" placeholder="lien du sous menu" cols="50"><?php echo stripcslashes($this_smenu["libelle_smenu"]) ?></textarea>
                        </div>
                        <label for="fichier_smenu" class="col-sm-2 control-label">Fichier-Image</label>
                        <div class="col-sm-4">
                            <input name="fichier_smenu" type="file"/>
                        </div>
                      </div>  
                      <div class="form-group">
                        <label for="Position" class="col-sm-2 control-label">Position<span  style="color: red;">*</span></label> 
                            <div class="col-md-4 col-sm-4 col-xs-4">
                               <input required="" type="text" class="form-control" name="position_smenu" value="<?php echo $this_smenu["position_smenu"] ?>" placeholder="Position"/>
                            </div>
                            <label for="Publier" class="col-sm-2 control-label">Publier dans menu?</label>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                              <select required="" name="publier_smenu" class="form-control">
                              <option selected="selected" disabled="disabled">- Plublier -</option> 
                                <option value="o" <?php if($this_smenu["publier_smenu"]=='o') echo "selected=selected"?>> o </option>
                                <option value="n" <?php if($this_smenu["publier_smenu"]=='n') echo "selected=selected"  ?>> n </option> 
                              </select>
                            </div> 
                      </div>  
                     <div class="form-group">
                        <label for="info" class="col-sm-2 control-label">Contenu</label>
                        <div class="col-sm-10">
                              <?php
                			    include("fckeditor/fckeditor.php") ; 
                				$oFCKeditor = new FCKeditor('contenu_smenu');
                				$oFCKeditor->Value=stripslashes($this_smenu['contenu_smenu']);
                				$oFCKeditor->Height=500;
                				$oFCKeditor->ToolbarSet='Default';
                				$oFCKeditor->BasePath = 'fckeditor/' ;
                				$oFCKeditor->page['EnterMode'] = 'p';
                				$oFCKeditor->Create() ;  	
                			?>
                        </div>
                      </div>
                    <div class="modal-footer">
                        <a type="submit" href="javascript:document.getElementById('edit').submit()" class="btn btn-primary">Valider</a> 
                    </div>
              </form>
              <div class="clearfix"> </div>
             </div>
          </div> 
        </div>
      </div>
    </div> 
 <!-- Row End -->
 </div>
<?php 
    } 
    include('./include_foot.php'); 
?>