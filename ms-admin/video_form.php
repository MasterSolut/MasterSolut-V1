<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include('config.php'); 
    include('./include_top.php');
    
    if(isset($_GET['supp_video'])){
             $classvideo->supprimer_video
             ($_GET['supp_video']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
    }else{ 
        if(isset($_GET['mod'])) $mod=$_GET['mod'];
        if($_POST['titre_video'] && $_POST['code_video']){  
            $options=array("titre_video"=>addslashes($_POST['titre_video']), 
                           "code_video"=>addslashes($_POST['code_video']),  
                           "position_video"=>addslashes($_POST['position_video']), 
                           "publier_video"=>addslashes($_POST['publier_video']),
                           "id_video"=>$_POST['mod']); 
            if(intval($_POST['mod'])>1){ 
              $etatMAJ=$classvideo->modification_video($options);
            }else{
              $etatMAJ=$classvideo->insertion_video($options); 
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
            $this_video=$classvideo->this_video($_GET['mod']); 
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
                      <input required="" type="text" class="form-control" name="titre_video" value="<?php echo stripslashes($this_video["titre_video"]) ?>"  placeholder="Titre "/> 
                      <input type="hidden"  name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                    </div> 
                    <label for="url" class="col-sm-2 control-label">Lien Youtube <span  style="color: red;">*</span></label>
                    <div class="col-sm-4">
                      <input required="" type="text" class="form-control" name="code_video" value="<?php echo stripslashes($this_video["code_video"]) ?>"  placeholder="Code"/>
                    </div>
                  </div> 
                  <div class="form-group"> 
                    <label for="position_video" class="col-sm-2 control-label">Position </label>
                    <div class="col-sm-4">
                      <input required="" type="text" class="form-control" name="position_video" value="<?php echo stripslashes($this_video["position_video"]) ?>"  placeholder="Titre "/>  
                    </div>
                    <label for="publier_video" class="col-sm-2 control-label">Publier <span  style="color: red;">*</span></label>
                    <div class="col-sm-4">
                        <select  name="publier_video" class="form-control">
                            <option selected="selected" disabled="disabled">- Publier -</option> 
                            <option value="o" <?php if($this_video["publier_video"]=='o') echo "selected=selected"?>> o </option>
                            <option value="n" <?php if($this_video["publier_video"]=='n') echo "selected=selected"  ?>> n </option> 
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