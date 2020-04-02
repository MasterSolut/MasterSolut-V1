<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include('config.php'); 
    include('./include_top.php');
    
    if(isset($_GET['supp_photo'])){
             $classphoto->supprimer_photo($_GET['supp_photo']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
    }else{ 
        if(isset($_GET['mod'])){
            $mod=$_GET['mod']; 
        } 
        $nombre=$_POST["nombre"]; 
        for($i=1; $i<=$nombre;$i++){ 
            if($mod){
                $SQLfichier_name='';
        		$fichier =$_FILES["src_photo".$i];				 
        		if($fichier['size'] != 0)
        		{ 
        			$fichier_name = $fichier['name'];
        			list($name,$extension) = explode(".",$fichier_name); 
        			$type = $fichier['type'];
                    $fichier_name=$name.time().".".$extension;            			 
        			$upload_dir = DOSSIER_ALBUM; 
        			if(move_uploaded_file($fichier['tmp_name'], $upload_dir.$fichier_name))
        			{
        				$reussie= true;
                        $SQLfichier_name=$fichier_name; 
        			}
        			else{
        				echo "<p>";
                        echo "Erreur de chargement du fichier";
                        echo "</p>";
        				$fichier_name ='';
        			}
        		} 
                $options=array("titre_photo"=>addslashes($_POST['titre_photo'.$i]), 
                           "libelle_photo"=>addslashes($_POST['libelle_photo'.$i]),
                           "id_album"=>$_GET['album'],
                           "src_photo"=>$SQLfichier_name,  
                           "position_photo"=>addslashes($_POST['position_photo'.$i]), 
                           "id_photo"=>$_POST['mod']); 
                    $etatMAJ=$classphoto->modification_photo($options); 
                    if($etatMAJ){  
                        $notification=$classutilitaire->notification('fa fa fa-exclamation-circle fa-lg', 'alert alert-block alert-info fade in','op&eacute;ration effectu&eacute;e avec succ&egrave;s'); 
                  }else{ 
                        $notification=$classutilitaire->notification('fa fa-times-circle fa-lg', 'alert alert-block alert-danger fade in no-margin','Aucune op&eacute;ration effectu&eacute;e.');  
                  }  
            }else{ 
                if($_FILES["src_photo".$i]['size']>0 && $_POST['titre_photo'.$i]){                 
                    $SQLfichier_name='';
            		$fichier =$_FILES["src_photo".$i];				 
            		if($fichier['size'] != 0)
            		{ 
            			$fichier_name = $fichier['name'];
            			list($name,$extension) = explode(".",$fichier_name); 
            			$type = $fichier['type'];
                        $fichier_name=$name.time().".".$extension;            			 
            			$upload_dir = DOSSIER_ALBUM; 
            			if(move_uploaded_file($fichier['tmp_name'], $upload_dir.$fichier_name))
            			{
            				$reussie= true;
                            $SQLfichier_name=$fichier_name; 
            			}
            			else{
            				echo "<p>";
                            echo "Erreur de chargement du fichier";
                            echo "</p>";
            				$fichier_name ='';
            			}
            		} 
                    $options=array("titre_photo"=>addslashes($_POST['titre_photo'.$i]), 
                               "libelle_photo"=>addslashes($_POST['libelle_photo'.$i]),
                               "id_album"=>$_GET['album'],
                               "src_photo"=>$SQLfichier_name,  
                               "position_photo"=>addslashes($_POST['position_photo'.$i]), 
                               "id_photo"=>$_POST['mod']);   
                  $etatMAJ=$classphoto->insertion_photo($options);  
                  if($etatMAJ){  
                        $notification=$classutilitaire->notification('fa fa fa-exclamation-circle fa-lg', 'alert alert-block alert-info fade in','op&eacute;ration effectu&eacute;e avec succ&egrave;s'); 
                  }else{ 
                        $notification=$classutilitaire->notification('fa fa-times-circle fa-lg', 'alert alert-block alert-danger fade in no-margin','Aucune op&eacute;ration effectu&eacute;e.');  
                  }  
                     
                }
                
                }
                echo '<script type="text/javascript">
                             opener.location.reload();
                              </script>'; 
                $mod=$_POST['mod'];  
        }
  
        if($_GET['mod']){ 
            $_POST["nombre"]=1;
            $this_photo=$classphoto->this_photo($_GET['mod']); 
            $src_photo=DOSSIER_ALBUM.$this_photo["src_photo"];
        }   
?>   
<div class="dashboard-wrapper">
    <?php echo $notification ?> 
        <form class="form-horizontal no-margin" id="edit" method="post" enctype="multipart/form-data">  
        <?php
            if(!$_POST["nombre"]){ 
        ?> 
        <div class="row">
          <div class="col-lg-12 col-md-12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      <h4 class="modal-title">Enregistrement </h4>
                    </div>
                  </div>
                  <div class="widget-body">
                      <div class="modal-body">  
                          <div class="form-group">
                            <label for="titre" class="col-sm-4 control-label">Nombre de photo &agrave; charger <span  style="color: red;">*</span> </label>
                            <div class="col-sm-2">
                              <select  name="nombre" class="form-control">
                                  <option selected="selected" disabled="disabled">- Nombre -</option> 
                                  <?php
                                    $nombre=8;
                                    for($i=1; $i<=$nombre;$i++){ 
                                  ?>
                                    <option value="<?php echo $i;?>" ><?php echo $i;?> </option>
                                  <?php   
                                    }  	   
                                  ?>
                              </select>
                            </div>  
                          </div> 
                      </div>
                  </div> 
              </div>
          </div> 
        </div> 
           <?php 
                }else{ 
                    $count=$_POST["nombre"];  
                    for($j=1;$j<=$count;$j++){ 
           ?>  
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                     Chargement de la photo N&deg;<?php echo $j ?>
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="panel panel-default no-margin">
                      <div class="panel-body">
                      <input type="hidden" class="input-long" name="nombre"  value="<?php echo $count ?>" />
                        <div style="width: 50%; float: left;">
                          <div class="form-group">
                            <label for="titre_album" class="col-sm-2 control-label">Titre </label>
                            <div class="col-sm-10">
                              <input style="width: 95%;"  required="" type="text" class="form-control" name="titre_photo<?php echo $j ?>" value="<?php echo stripcslashes($this_photo["titre_photo"]) ?>"  placeholder="Titre de la photo"/>
                              <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="libelle" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                              <textarea name="libelle_photo<?php echo $j ?>" cols="50"><?php echo stripcslashes($this_photo["libelle_photo"]) ?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Postion</label>
                            <div class="col-sm-10">
                              <input required="" style="width: 95%;" type="text" class="form-control" name="position_photo<?php echo $j ?>" value="<?php echo $this_photo["position_photo"] ?>"  placeholder="Position"/>
                            </div>
                          </div> 
                      </div>
                      
                      <div style="width: 50%; float: left;">
                          <div class="form-group">
                            <label for="src_photo" class="col-sm-4 control-label">Photo de Profil</label>
                            <div class="col-sm-8">
                              <div class="fileinput fileinput-new" data-provides="fileinput"><input name="..." value="" type="hidden"/>
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;">
                                    <img id="uploadpreview1" src="<?php echo $src_photo;?>" alt=""/>
                                </div>
                                <div>
                                  <span class="btn btn-primary btn-file"><span class="fileinput-new" data-trigger="fileinput">Choisir photo</span>
                                      <span class="fileinput-exists" data-trigger="fileinput">Changer</span> 
                                      <input style="display: none;" name="src_photo<?php echo $j ?>" type="file" />
                                  </span>
                                  <a href="javascript:void(0)" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Annuler</a>
                                </div>
                              </div>
                            </div>
                          </div> 
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <?php 
                }         
            }
           ?> 
            <div class="modal-footer">
                <a type="submit" href="javascript:document.getElementById('edit').submit()" class="btn btn-primary">Valider</a> 
            </div>
        </form>
    </div>  
<?php 
    }
    include('./include_foot.php'); 
?>