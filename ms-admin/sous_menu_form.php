<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */ 
    $idMenu=$_GET["menu"];
    include('config.php'); 
    include('./include_top.php');
    
     if(isset($_GET['supp_smenu'])){
             $classsmenu->supprimer_smenu($_GET['supp_smenu']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
        }else{ 
            if(isset($_GET['mod'])) $mod=$_GET['mod'];
        if($_POST['titre_smenu'] && $_POST['libelle_smenu']){ 
            $options=array("titre_smenu"=>addslashes($_POST['titre_smenu']),
                           "libelle_smenu"=>addslashes($_POST['libelle_smenu']),
                           "position_smenu"=>$_POST['position_smenu'],
                           "news_smenu"=>$_POST['news_smenu'],
                           "publier_smenu"=>$_POST['publier_smenu'],
                           "page_smenu"=>$_POST['page_smenu'],
                           "id_menu"=>$idMenu,
                           "id_smenu"=>$_POST['mod']);
            if(intval($_POST['mod'])>0){
               $etatMAJ=$classSousmenu->modification_smenu($options);
            }else{ 
                print_r($options);
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
                <form class="form-horizontal no-margin" id="edit" method="post">
                    <div class="modal-body"> 
                      <div class="form-group">
                        <label for="titre" class="col-sm-2 control-label">Titre </label>
                        <div class="col-sm-10">
                          <input required="" type="text" class="form-control" name="titre_smenu" value="<?php echo $this_smenu["titre_smenu"] ?>"  placeholder="Titre du sous smenu"/>
                          <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="libelle" class="col-sm-2 control-label">Libelle</label>
                        <div class="col-sm-10">
                          <input required="" type="text" class="form-control" name="libelle_smenu" value="<?php echo $this_smenu["libelle_smenu"] ?>"  placeholder="Libelle du sous smenu"/>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label for="Position" class="col-sm-2 control-label">Position</label> 
                            <div class="col-md-4 col-sm-4 col-xs-4">
                               <input required="" type="text" class="form-control" name="position_smenu" value="<?php echo $this_smenu["position_smenu"] ?>" placeholder="Position du sous smenu"/>
                            </div>
                            <label for="Publier" class="col-sm-2 control-label">Publier</label>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                              <select required="" name="publier_smenu" class="form-control">
                              <option selected="selected" disabled="disabled">- Plublier -</option> 
                                <option value="o" <?php if($this_smenu["publier_smenu"]=='o') echo "selected=selected"?>> o </option>
                                <option value="n" <?php if($this_smenu["publier_smenu"]=='n') echo "selected=selected"  ?>> n </option> 
                              </select>
                            </div> 
                      </div> 
                    <div class="form-group">
                        <label for="Page" class="col-sm-2 control-label">Page</label>
                        <div class="col-sm-4">
                           <select name="page_smenu" class="form-control">
                              <option selected="selected" disabled="disabled"> - Page - </option> 
                              <?php 
                                 $tabPage=$classpage->liste_page(0,"ORDER BY titre_page ASC"); 
                                 foreach($tabPage as $pageValue){
                                    $titrePage=stripslashes($pageValue["titre_page"]); 
                              ?>  
                                    <option value="<?php echo $pageValue["id_page"]  ?>" <?php if($this_smenu["post_smenu"]==$pageValue["id_page"]) echo "selected=selected"?>><?php echo $titrePage ?> </option> 
                               <?php }?>
                            </select>
                        </div> 
                        <label for="news_smenu" class="col-sm-2 control-label">News</label>
                        <div class="col-sm-4">
                          <select name="news_smenu" class="form-control"> 
                              <option selected="selected" disabled="disabled">- News -</option>
                              <?php 
                                 $tabnews=$classnews->liste_news();  
                                 foreach($tabnews as $newsValue){
                                    $titrenews=stripslashes($newsValue["titre_news"]); 
                              ?>  
                                <option value="<?php echo $newsValue["id_news"]?>" <?php if($this_smenu["newss_smenu"]==$newsValue["id_news"]) echo "selected=selected" ?> ><?php echo $titrenews?></option> 
                              <?php }?>
                          </select>
                        </div>
                      </div>
                    <div class="modal-footer">
                        <a type="submit" href="javascript:document.getElementById('edit').submit()" class="btn btn-primary">Valider</a> 
                    </div>
              </form>
              <div class="clearfix"> </div>
              </div>
              </div>
          <div class="widget">
              <div class="widget-header">
                <div class="title">
                  Liste des sous menu<a id="dynamic-tables">s</a> 
                </div> 
             </div>
              <div id="dt_example" class="example_alt_pagination">
              <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table"> 
                <thead>
                  <tr> 
                    <th style="width:15%">
                      Titre
                    </th>
                    <th style="width:15%">
                      Libell&eacute;
                    </th>
                    <th style="width:15%">
                      Page
                    </th>
                    <th style="width:15%">
                      News
                    </th>
                    <th style="width:10%">
                      Position
                    </th>
                    <th style="width:10%">
                      Publier
                    </th>
                    <th style="width:20%">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                	$tab_smenu=$classSousmenu->liste_smenu_by_menu($idMenu,0,"ORDER BY titre_smenu ASC");                    
                    foreach($tab_smenu as $smenuValue){ 
                        $idsmenu=$smenuValue["id_smenu"];
                        $titresmenu=stripslashes($smenuValue["titre_smenu"]);
                        $libellesmenu=stripslashes($smenuValue["libelle_smenu"]);
                        $pagesmenu=$smenuValue["page_smenu"];
                        $newssmenu=$smenuValue["news_smenu"];
                        $positionsmenu=$smenuValue["position_smenu"];
                        $publiersmenu=$smenuValue["publier_smenu"];  
                ?>
                  <tr>
                    <td>
                        <?php echo $titresmenu; ?>
                    </td>
                    <td>
                      <?php echo $libellesmenu; ?>
                    </td>
                    <td>
                      <?php echo $pagesmenu; ?>
                    </td>
                    <td class="hidden-phone">
                      <?php echo $newssmenu; ?>
                    </td>
                    <td class="hidden-phone">
                      <?php echo $positionsmenu; ?>
                    </td>
                    <td class="hidden-phone">
                      <?php  
                        $checkbox="";
                        if($publiersmenu=="o"){
                            $checkbox= "checked='checkbox'";
                        }
                      ?>
                      <input type="checkbox" class="no-margin" <?php echo $checkbox ?>  /> 
                    </td>
                    <td>
                       <a  data-original-title="" title="Ajouter un sous smenu" href="javascript:openwindows('sous_smenu_form.php?smenu=<?php echo $idsmenu ?>',1000,400,false)" class="btn btn-info">
                            <i class="fa fa-arrow-down"></i>
                      </a>
                      <a  data-original-title="" title="Modifier" href="sous_smenu_form.php " class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                      </a>
                      <a  data-original-title="" title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('smenu_form.php?supp_smenu=<?php echo $idsmenu ?>',20,40,false)" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>
                      </a>
                    </td>
                  </tr>
                 <?php  
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
        } 
        include('./include_foot.php'); 
    ?>