<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include('config.php'); 
    include('./include_top.php');
    
     if(isset($_GET['supp_user'])){
             $classuser->supprimer_user($_GET['supp_user']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
        }else{ 
            if(isset($_GET['mod'])) $mod=$_GET['mod'];
            if($_POST['nom_user'] && $_POST['prenoms_user']){ 
                
               /*if(isset($_FILES['photo_user']) && $_FILES['photo_user']['size']>0){
                  $photo_user='photo_user'.time();
                  $returnphoto_user=$classutilitaire->upload_file('./'.DOSSIER_UPLOAD,100000000,array('.gif','.jpg','.png','.jpeg','.pdf','.doc','.docx','.xlsx','.xls','.txt'),'photo_user',$photo_user);
                }
                echo "test";*/
                
                if(isset($_FILES["photo_user"]))
            	{
            	   $SQLfichier_name='';
            		$fichier = $_FILES["photo_user"];				 
            		if($fichier['size'] != 0)
            		{ 
            			$fichier_name = $fichier['name'];
            			list($name,$extension) = explode(".",$fichier_name); 
            			$type = $fichier['type'];
                        $fichier_name=$_POST['nom_user']."_".$_POST['prenoms_user'].time().".".$extension;            			 
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
            $options=array("nom_user"=>addslashes($_POST['nom_user']),
                           "prenom_user"=>addslashes($_POST['prenoms_user']),
                           "email_user"=>addslashes($_POST['email_user']),
                           "adresse_user"=>addslashes($_POST['adresse_user']),
                           "photo_user"=>$SQLfichier_name,
                           "login_user"=>addslashes($_POST['login_user']),
                           "password_user"=>addslashes($_POST['password_user']), 
                           "type_user"=>addslashes($_POST['type_user']), 
                           "id_user"=>$_POST['mod']);
            if(intval($_POST['mod'])>0){
               $etatMAJ=$classuser->modification_user($options);
            }else{ 
               $etatMAJ=$classuser->insertion_user($options);  
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
            $this_user=$classuser->this_user($_GET['mod']);
            $this_photo=$this_user["photo_user"];
        }
?>
<div class="dashboard-wrapper">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
        <?php
            $compte=$_GET['compte'];
            if(isset($compte)){
                $this_compte=$classuser->this_user($compte);
                $nom=stripslashes($this_compte["nom_user"]);
                $prenom=stripslashes($this_compte["prenom_user"]);
                $login=stripslashes($this_compte["login_user"]);  
                $pwd=stripslashes($this_compte["password_user"]);  
        ?>
            <div class="widget-header">
                <div class="title">
                  <h4 class="modal-title">Informations du compte  <?php echo $nom." ".$prenom ?></h4>
                </div>
            </div>
            <div class="widget-body">
                <form class="form-horizontal no-margin" >
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Login</label>
                        <div class="col-sm-10">
                            <input class="form-control"  readonly="" value="<?php echo $login ?>" type="text"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Mot de Passe</label>
                        <div class="col-sm-10">
                            <input   disabled="disabled" value="<?php echo $pwd ?>" class="form-control" type="text"/>                    
                        </div>
                    </div> 
                </form>
            </div>
        <?php 
            }else{	
        ?>
          <div class="widget-header">
            <div class="title">
              <h4 class="modal-title">Ajouter un nouveau Utilisateur</h4>
            </div>
          </div>
          <div class="widget-body">
            <?php echo $notification ?> 
            <form class="form-horizontal no-margin" id="edit" method="post" enctype="multipart/form-data">
                <div class="modal-body"> 
                <h5>Informations personnelles</h5>
                <hr/>
                <div style="width: 50%; float: left;">
                  <div class="form-group">
                    <label for="nom" class="col-sm-2 control-label">Nom </label>
                    <div class="col-sm-10">
                      <input style="width: 95%;"  required="" type="text" class="form-control" name="nom_user" value="<?php echo $this_user["nom_user"] ?>"  placeholder="Nom de l'user"/>
                      <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="prenoms" class="col-sm-2 control-label">Pr&eacute;noms</label>
                    <div class="col-sm-10">
                      <input required="" style="width: 95%;" type="text" class="form-control" name="prenoms_user" value="<?php echo $this_user["prenom_user"] ?>"  placeholder="Pr&eacute;noms"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input required="" style="width: 95%;" type="e-mail" class="form-control" name="email_user" value="<?php echo $this_user["email_user"] ?>"  placeholder="Email"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                    <div class="col-sm-10">
                      <input required="" style="width: 95%;" type="text" class="form-control" name="adresse_user" value="<?php echo $this_user["adresse_user"] ?>"  placeholder="Adresse"/>
                    </div>
                  </div>
                  </div>
                  <div style="width: 50%; float: left;">
                  <div class="form-group">
                    <label for="photo_user" class="col-sm-4 control-label">Photo de Profil</label>
                    <div class="col-sm-8">
                      <div class="fileinput fileinput-new" data-provides="fileinput"><input name="..." value="" type="hidden"/>
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;">
                            <img id="uploadpreview1" src="<?php echo DOSSIER_UPLOAD.$this_photo;?>" alt=""/>
                        </div>
                        <div>
                          <span class="btn btn-primary btn-file"><span class="fileinput-new" data-trigger="fileinput">Choisir logo</span>
                              <span class="fileinput-exists" data-trigger="fileinput">Changer</span> 
                              <input style="display: none;" name="photo_user" type="file" />
                          </span>
                          <a href="javascript:void(0)" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Annuler</a>
                        </div>
                      </div>
                    </div>
                  </div> 
                  </div>
                    <br/> 
                    <h5>Informations Compte</h5>
                    <hr/> 
                    <div class="form-group">
                        <label for="login_user" class="col-sm-2 control-label">Login</label>
                        <div class="col-sm-6">
                          <input required="" type="text" class="form-control" name="login_user" value="<?php echo $this_user["login_user"] ?>"  placeholder="Login"/>
                        </div>
                    </div> 
                      <div class="form-group">
                        <label for="password_user" class="col-sm-2 control-label">Mot de passe</label>
                        <div class="col-sm-6">
                          <input required="" type="password" class="form-control" name="password_user" value="<?php echo $this_user["password_user"] ?>"  placeholder="Mot de passe"/>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Type d'utilisateur</label> 
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <select required="" name="type_user" class="form-control">
                          <option selected="selected" disabled="disabled">- Type utilisateur -</option> 
                            <option value="<?php echo ADMIN ?>" <?php if($this_user["type_user"]==ADMIN) echo "selected=selected"?>> <?php echo  ADMIN ?> </option>
                            <option value="<?php echo SIMPLE_USER ?>" <?php if($this_user["type_user"]==SIMPLE_USER) echo "selected=selected"  ?>> <?php echo  SIMPLE_USER ?> </option> 
                          </select>
                        </div> 
                      </div> 
                <div class="modal-footer">
                    <a type="submit" href="javascript:document.getElementById('edit').submit()" class="btn btn-primary">Valider</a> 
                </div>
          </form>
          </div>
        </div>
    <?php 
        }
        echo"</div>";
        echo"</div>";
        echo"</div>"; 
    }
    include('./include_foot.php'); 
    ?>