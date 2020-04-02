<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include('config.php'); 
    include('./include_top.php');
    
    if(isset($_GET['supp_news'])){
             $classnews->supprimer_news($_GET['supp_news']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
    }else{ 
            if(isset($_GET['mod'])) $mod=$_GET['mod'];
        if($_POST['titre_news'] && $_POST['libelle_news']){ 
            if(isset($_FILES["logo_news"]))
        	{
        	   $SQLfichier_name='';
        		$fichier =$_FILES["logo_news"];				 
        		if($fichier['size'] != 0)
        		{ 
        			$fichier_name = $fichier['name'];
        			list($name,$extension) = explode(".",$fichier_name); 
        			$type = $fichier['type'];
                    $fichier_name="logo_".$_POST['nom_news'].time().".".$extension;            			 
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
            
            $options=array("titre_news"=>addslashes($_POST['titre_news']), 
                           "libelle_news"=>addslashes($_POST['libelle_news']),
                           "id_album"=>addslashes($_POST['id_album']),
                           "traitement_news"=>addslashes($_POST['traitement_news']),  
                           "contenu_news"=>addslashes($_POST['contenu_news']),
                           "publier_news"=>addslashes($_POST['publier_news']),
                           "id_news"=>$_POST['mod']); 
            if(intval($_POST['mod'])>1){
              $etatMAJ=$classnews->modification_news($options);
            }else{   
              $etatMAJ=$classnews->insertion_news($options); 
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
            $this_news=$classnews->this_news($_GET['mod']); 
        }   
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
        <?php echo $notification ?> 
        <form class="form-horizontal no-margin" id="edit" method="post" enctype="multipart/form-data">
            <div class="modal-body"> 
              <div class="form-group">
                <label for="titre" class="col-sm-2 control-label">Titre <span  style="color: red;">*</span> </label>
                <div class="col-sm-4">
                  <input required="" type="text" class="form-control" name="titre_news" value="<?php echo stripslashes($this_news["titre_news"]) ?>"  placeholder="Titre "/> 
                  <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                </div> 
                <label for="url" class="col-sm-2 control-label">Libelle <span  style="color: red;">*</span></label>
                <div class="col-sm-4">
                  <input required="" type="text" class="form-control" name="libelle_news" value="<?php echo stripslashes($this_news["libelle_news"]) ?>"  placeholder="Libelle"/>
                </div>
              </div>
              <div class="form-group">
                <label for="traitement_news" class="col-sm-2 control-label">Traitement </label>
                <div class="col-sm-4">
                  <input  type="text" class="form-control" name="traitement_news" value="<?php echo stripslashes($this_news["traitement_news"]) ?>"  placeholder="Page de traitement "/>
                </div>
               
                <label for="code google map" class="col-sm-2 control-label">Fixe-News  </label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_album" value="<?php echo stripslashes($this_news["id_album"]) ?>"  placeholder="Album"/>
                </div>
              </div>
              <div class="form-group">
              <label for="code google map" class="col-sm-2 control-label">Gallerie associ&eacute;  </label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="id_album" value="<?php echo stripslashes($this_news["id_album"]) ?>"  placeholder="Album"/>
                </div>
              <label for="Publier" class="col-sm-2 control-label">Publier <span  style="color: red;">*</span></label>
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <select  name="publier_news" class="form-control">
                  <option selected="selected" disabled="disabled">- Plublier -</option> 
                    <option value="o" <?php if($this_news["publier_news"]=='o') echo "selected=selected"?>> o </option>
                    <option value="n" <?php if($this_news["publier_news"]=='n') echo "selected=selected"  ?>> n </option> 
                  </select>
                </div>    
              </div>
              <div class="form-group">
                <label for="info" class="col-sm-2 control-label">Contenu<span  style="color: red;">*</span></label>
                <div class="col-sm-10">
                      <?php
        			    include("fckeditor/fckeditor.php") ; 
        				$oFCKeditor = new FCKeditor('contenu_news');
        				$oFCKeditor->Value=stripslashes($this_news['contenu_news']);
        				$oFCKeditor->Height=500;
        				$oFCKeditor->ToolbarSet='Default';
        				$oFCKeditor->BasePath = 'fckeditor/' ;
        				$oFCKeditor->news['EnterMode'] = 'p';
        				$oFCKeditor->Create() ;  	
        			?>
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
<?php 
    }
    include('./include_foot.php'); 
?>