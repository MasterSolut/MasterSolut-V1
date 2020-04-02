<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include('config.php'); 
    include('./include_top.php');
 if(isset($_GET['supp_article'])){
         $classarticle->supprimer_article($_GET['supp_article']);
          echo '<script type="text/javascript">
                     opener.location.reload();
                    self.close()
                </script>';   
    }else{ 
        if(isset($_GET['mod'])) $mod=$_GET['mod'];
        if($_POST['titre_article']){
                $SQLfichier_name='';
        		$fichier =$_FILES["fichier_article"]; 			 
        		if($fichier['size']>0)
        		{ 
        			$fichier_name = $fichier['name'];
        			list($name,$extension) = explode(".",$fichier_name); 
        			$type = $fichier['type'];
                    $fichier_name=preg_replace("#[^a-zA-Z]#", "", str_replace(' ','',$_POST['titre_article'])).time().".".$extension;            			 
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
                             
            $options=array("titre_article"=>addslashes($_POST['titre_article']),
                           "libelle_article"=>addslashes($_POST['libelle_article']),
                           "position_article"=>$_POST['position_article'],
                           "contenu_article"=>addslashes($_POST['contenu_article']), 
                           "publier_article"=>$_POST['publier_article'], 
                           "visible_accueil"=>$_POST['visible_accueil'],
                           "autres_article"=>$_POST['autres_article'],
                           "fichier_article"=>$SQLfichier_name,  
                           "id_smenu"=>$_GET['smenu'],
                           "id_article"=>$_POST['mod']);
            if(intval($_POST['mod'])>0){  
               $etatMAJ=$classarticle->modification_article($options);
            }else{  
              $etatMAJ=$classarticle->insertion_article($options);  
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
            $this_article=$classarticle->this_article($_GET['mod']);
        }
?>
<div class="dashboard-wrapper">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              <h4 class="modal-title">Ajouter un nouveau article</h4>
            </div>
          </div>
          <div class="widget-body">
            <?php echo $notification ?> 
            <form class="form-horizontal no-margin" enctype="multipart/form-data" id="edit" method="post">
                <div class="modal-body"> 
                  <div class="form-group">
                    <label for="titre" class="col-sm-2 control-label">Titre </label>
                    <div class="col-sm-4">
                      <input required="" type="text" class="form-control" name="titre_article" value="<?php echo $this_article["titre_article"] ?>"  placeholder="Titre du article"/>
                      <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                    </div>
                    <label for="libelle" class="col-sm-2 control-label">Libelle</label>
                    <div class="col-sm-4">
                        <textarea name="libelle_article" placeholder="Description du article" cols="50"><?php echo stripcslashes($this_article["libelle_article"]) ?></textarea>
                    </div>                    
                  </div>
                  
                  <div class="form-group">
                        <label for="Position" class="col-sm-2 control-label">Position</label> 
                        <div class="col-md-4 col-sm-4 col-xs-4">
                           <input required="" type="text" class="form-control" name="position_article" value="<?php echo $this_article["position_article"] ?>" placeholder="Position du sous article"/>
                        </div>
                        <label for="Publier" class="col-sm-2 control-label">Publier</label>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <select required="" name="publier_article" class="form-control">
                          <option selected="selected" disabled="disabled">- Plublier -</option> 
                            <option value="o" <?php if($this_article["publier_article"]=='o') echo "selected=selected"?>> o </option>
                            <option value="n" <?php if($this_article["publier_article"]=='n') echo "selected=selected"  ?>> n </option> 
                          </select>
                        </div> 
                  </div>  
                  <div class="form-group"> 
                        <label for="Autres" class="col-sm-2 control-label">Autres</label> 
                        <div class="col-md-4 col-sm-4 col-xs-4">
                           <input  type="text" class="form-control" name="autres_article" value="<?php echo $this_article["autres_article"] ?>" placeholder="Position du sous article"/>
                        </div>
                        <label for="fichier_article" class="col-sm-2 control-label">Fichier</label>
                        <div class="col-sm-4">
                            <input name="fichier_article" type="file"  value=""/>
                        </div>   
                  </div>
                  <?php
                    	$idSousmenu=$_GET["smenu"];
                            $this_smenu=$classSousmenu->this_smenu($idSousmenu);
                            $titleSousmenu=stripcslashes($this_smenu["titre_smenu"]); 
                            $titrebip=$classutilitaire->format_url($titleSousmenu);  
                            if($titrebip=="en-cours"){ 
                  ?> 
                  <div class="form-group"> 
                    <label for="fichier_article" class="col-sm-2 control-label">Projet R&eacute;alis&eacute;?</label>
                     <div class="col-md-4 col-sm-4 col-xs-4">
                      <select required="" name="projets_article" class="form-control">
                        <option selected="selected" disabled="disabled">- Projets -</option> 
                        <option value="o" <?php if($this_article["projets_article"]=='o') echo "selected=selected"?>> o </option>
                        <option value="n" <?php if($this_article["projets_article"]=='n') echo "selected=selected"  ?>> n </option> 
                      </select>
                    </div> 
                  </div> 
                <?php } ?>   
                  <div class="form-group">
                    <label for="info" class="col-sm-2 control-label">Contenu<span  style="color: red;">*</span></label>
                    <div class="col-sm-10">
                          <?php
            			    include("fckeditor/fckeditor.php") ; 
            				$oFCKeditor = new FCKeditor('contenu_article');
            				$oFCKeditor->Value=stripslashes($this_article['contenu_article']);
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
