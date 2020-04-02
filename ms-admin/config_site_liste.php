<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
  
    if($_POST['nom_site'] && $_POST['email']){ 
        if(isset($_FILES["logo_site"]))
    	{
    	   $SQLfichier_name='';
    		$fichier =$_FILES["logo_site"];				 
    		if($fichier['size'] != 0)
    		{ 
    			$fichier_name = $fichier['name'];
    			list($name,$extension) = explode(".",$fichier_name); 
    			$type = $fichier['type'];
                $fichier_name="logo_".$_POST['nom_site'].time().".".$extension;            			 
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
        
        if(isset($_FILES["favicon_site"]))
    	{
    	   $Favicon_name='';
    		$fichier =$_FILES["favicon_site"];				 
    		if($fichier['size'] != 0)
    		{ 
    			$fichier_name = $fichier['name'];
    			list($name,$extension) = explode(".",$fichier_name); 
    			$type = $fichier['type'];
                $fichier_name="favicon".time().".".$extension;            			 
    			$upload_dir = DOSSIER_UPLOAD; 
    			if(move_uploaded_file($fichier['tmp_name'], $upload_dir.$fichier_name))
    			{
    				$reussie= true;
                    $Favicon_name=$fichier_name; 
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
        
        $options=array("nom_site"=>addslashes($_POST['nom_site']),
                       "url_site"=>addslashes($_POST['url_site']),
                       "tel_contact"=>addslashes($_POST['tel_contact']),
                       "email"=>addslashes($_POST['email']),
                       "code_google_map"=>addslashes($_POST['code_google_map']),
                       "info_adresse_site"=>addslashes($_POST['info_adresse_site']),  
                       "logo_site"=>$SQLfichier_name,
                       "favicon_site"=>$Favicon_name,
                       "id_config"=>$_POST['mod']); 
        if(intval($_POST['mod'])==1){
          $etatMAJ=$classconfig->modification_config($options);
        }else{  
          $etatMAJ=$classconfig->insertion_config($options); 
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
    $this_site=$classconfig->liste_config(1)->fetch();
    $mod=0;
    if($this_site!="") $mod=1;
?>  
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <h4 class="modal-title">Param&egrave;tres du site </h4>
        </div>
      </div>
      <div class="widget-body">
        <?php echo $notification ?> 
        <form class="form-horizontal no-margin" id="edit" method="post" enctype="multipart/form-data">
            <div class="modal-body"> 
              <div class="form-group">
                <label for="titre" class="col-sm-2 control-label">Nom du Site <span  style="color: red;">*</span> </label>
                <div class="col-sm-10">
                  <input required="" type="text" class="form-control" name="nom_site" value="<?php echo stripslashes($this_site["nom_site"]) ?>"  placeholder="Titre du site"/> 
                  <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                </div>
              </div>
              <div class="form-group">
                <label for="url" class="col-sm-2 control-label">URL du Site <span  style="color: red;">*</span></label>
                <div class="col-sm-10">
                  <input required="" type="text" class="form-control" name="url_site" value="<?php echo stripslashes($this_site["url_site"]) ?>"  placeholder="URL du site"/>
                </div>
              </div>
              <div class="form-group">
                <label for="tel_contact" class="col-sm-2 control-label">T&eacute;l&eacute;phone de Contact<span  style="color: red;">*</span></label>
                <div class="col-sm-10">
                  <input required="" type="text" class="form-control" name="tel_contact" value="<?php echo stripslashes($this_site["tel_contact"]) ?>"  placeholder="T&eacute;l&eacute;phone de contact"/>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email de Contact<span  style="color: red;">*</span></label>
                <div class="col-sm-10">
                  <input required="" type="text" class="form-control" name="email" value="<?php echo stripslashes($this_site["email"]) ?>"  placeholder="Email de contact"/>
                </div>
              </div>
              <div class="form-group">
                <label for="code google map" class="col-sm-2 control-label">Adresse <span  style="color: red;">*</span></label>
                <div class="col-sm-10">
                  <input required="" type="text" class="form-control" name="info_adresse_site" value="<?php echo stripslashes($this_site["info_adresse_site"]) ?>"  placeholder="Code du Google Map"/>
                </div>
              </div> 
              <div class="form-group">
                <label for="code google map" class="col-sm-2 control-label">Code Google Map  </label>
                <div class="col-sm-10">
                  <input required="" type="text" class="form-control" name="code_google_map" value="<?php echo stripslashes($this_site["code_google_map"]) ?>"  placeholder="Code du Google Map"/>
                </div>
              </div> 
              <div class="form-group">
                <label for="logo" class="col-sm-2 control-label">Favicon du site<span  style="color: red;">*</span></label>
                <div class="col-sm-4"> 
                  <div class="fileinput fileinput-new" data-provides="fileinput"><input name="..." value="" type="hidden"/>
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;">
                        <img id="uploadpreview1" src="<?php echo DOSSIER_UPLOAD.stripslashes($this_site["favicon_site"]);?>" alt=""/>
                    </div>
                    <div>
                      <span class="btn btn-primary btn-file"><span class="fileinput-new" data-trigger="fileinput">Choisir Favicon</span>
                          <span class="fileinput-exists" data-trigger="fileinput">Changer</span> 
                          <input style="display: none;" name="favicon_site" type="file" />
                      </span>
                      <a href="javascript:void(0)" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Annuler</a>
                    </div>
                  </div>
                </div>
                <label for="logo" class="col-sm-2 control-label">Logo <span  style="color: red;">*</span></label>
                <div class="col-sm-4"> 
                  <div class="fileinput fileinput-new" data-provides="fileinput"><input name="..." value="" type="hidden"/>
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;">
                        <img id="uploadpreview1" src="<?php echo DOSSIER_UPLOAD.stripslashes($this_site["logo_site"]);?>" alt=""/>
                    </div>
                    <div>
                      <span class="btn btn-primary btn-file"><span class="fileinput-new" data-trigger="fileinput">Choisir logo</span>
                          <span class="fileinput-exists" data-trigger="fileinput">Changer</span> 
                          <input style="display: none;" name="logo_site" type="file" />
                      </span>
                      <a href="javascript:void(0)" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Annuler</a>
                    </div>
                  </div>
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