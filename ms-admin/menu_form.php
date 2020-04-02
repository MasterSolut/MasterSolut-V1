<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include('config.php'); 
    include('./include_top.php');
 if(isset($_GET['supp_menu'])){
         $classmenu->supprimer_menu($_GET['supp_menu']);
          echo '<script type="text/javascript">
                     opener.location.reload();
                    self.close()
                </script>';   
    }else{
        if(isset($_GET['mod'])) $mod=$_GET['mod'];
        if($_POST["titre_menu"]){
            $SQLfichier_name='';
        		$fichier =$_FILES["fichier_menu"]; 			 
        		if($fichier['size']>0)
        		{ 
        			$fichier_name = $fichier['name'];
        			list($name,$extension) = explode(".",$fichier_name); 
        			$type = $fichier['type'];
                    $fichier_name=preg_replace("#[^a-zA-Z]#", "", str_replace(' ','',$_POST['titre_menu'])).time().".".$extension;            			 
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
            $options=array("titre_menu"=>addslashes($_POST['titre_menu']),
                           "libelle_menu"=>addslashes($_POST['libelle_menu']),
                           "position_menu"=>$_POST['position_menu'], 
                           "publier_menu"=>$_POST['publier_menu'],
                           "contenu_menu"=>addslashes($_POST['contenu_menu']),
                           "fichier_menu"=>$SQLfichier_name,
                           "id_section"=>$_POST['id_section'],
                           "affiche_acceuil"=>$_POST['affiche_acceuil'],
                           "id_menu"=>$_POST['mod']);
            if(intval($_POST['mod'])>0){ 
                
               $etatMAJ=$classmenu->modification_menu($options);
            }else{ 
              $etatMAJ=$classmenu->insertion_menu($options);  
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
            $this_menu=$classmenu->this_menu($_GET['mod']);
        }
?>
<div class="dashboard-wrapper">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              <h4 class="modal-title">Ajouter un nouveau menu</h4>
            </div>
          </div>
          <div class="widget-body">
            <?php echo $notification ?> 
            <form class="form-horizontal no-margin" enctype="multipart/form-data" id="edit" method="post">
                <div class="modal-body"> 
                  <div class="form-group">
                    <label for="titre" class="col-sm-2 control-label">Titre </label>
                    <div class="col-sm-4">
                      <input required="" type="text" class="form-control" name="titre_menu" value="<?php echo $this_menu["titre_menu"] ?>"  placeholder="Titre du menu"/>
                      <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                    </div>
                    
                    <label for="titre" class="col-sm-2 control-label">Type section </label>
                    <div class="col-sm-4">
                        <select  name="id_section" class="form-control"> 
                          <option selected="selected" value=" ">- Section -</option>
                          <?php 
                             $tabsection=$classsection->liste_section("page",0,"ORDER BY lib_section ASC");  
                             foreach($tabsection as $tabsectionValue){
                                $idSection=$tabsectionValue["id_section"];
                                $libSection=stripslashes($tabsectionValue["lib_section"]); 
                          ?>  
                            <option value="<?php echo $idSection ?>" <?php if($this_menu["id_section"]==$idSection) echo "selected=selected" ?> ><?php echo $libSection?></option> 
                          <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="libelle" class="col-sm-2 control-label">Lien-Page</label>
                    <div class="col-sm-4">
                        <textarea name="libelle_menu" placeholder="Page de traitement" cols="50"><?php echo stripcslashes($this_menu["libelle_menu"]) ?></textarea>
                    </div>
                    <label for="fichier_menu" class="col-sm-2 control-label">Fichier</label>
                    <div class="col-sm-4">
                        <input name="fichier_menu" type="file"  value="<?php echo stripcslashes($this_menu["fichier_menu"]) ?>"/>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="Position" class="col-sm-2 control-label">Position</label> 
                        <div class="col-md-4 col-sm-4 col-xs-4">
                           <input required="" type="text" class="form-control" name="position_menu" value="<?php echo $this_menu["position_menu"] ?>" placeholder="Position du sous menu"/>
                        </div>
                        <label for="Publier" class="col-sm-2 control-label">Publier</label>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <select required="" name="publier_menu" class="form-control">
                            <option selected="selected" disabled="disabled">- Plublier -</option> 
                            <option value="o" <?php if($this_menu["publier_menu"]=='o') echo "selected=selected"?>> o </option>
                            <option value="n" <?php if($this_menu["publier_menu"]=='n') echo "selected=selected"  ?>> n </option> 
                          </select>
                        </div> 
                  </div>  
                  <div class="form-group">
                    <label for="Position" class="col-sm-2 control-label">Afficher sur acceuil?</label> 
                    <div class="col-md-4 col-sm-4 col-xs-4">
                       <select required="" name="affiche_acceuil" class="form-control">
                            <option selected="selected" value=" ">- Acceuil -</option> 
                            <option value="societe" <?php if($this_menu["affiche_acceuil"]=='societe') echo "selected=selected"?>>Société </option>
                            <option value="services" <?php if($this_menu["affiche_acceuil"]=='services') echo "selected=selected"?>>Services </option>
                            <option value="formations" <?php if($this_menu["affiche_acceuil"]=='formations') echo "selected=selected"  ?>>Nos Formations </option>  
                      </select>
                    </div> 
                  </div>  
                  <div class="form-group">
                    <label for="info" class="col-sm-2 control-label">Contenu</label>
                    <div class="col-sm-10">
                          <?php
            			    include("fckeditor/fckeditor.php") ; 
            				$oFCKeditor = new FCKeditor('contenu_menu');
            				$oFCKeditor->Value=stripslashes($this_menu['contenu_menu']);
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
