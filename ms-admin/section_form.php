<?php 
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include('config.php'); 
    include('./include_top.php');
    
    if(isset($_GET['supp_section'])){
             $classsection->supprimer_section($_GET['supp_section']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
    }else{ 
            if(isset($_GET['mod'])) $mod=$_GET['mod'];
        if($_POST['lib_section'] && $_POST['fixed_section']){  
            $options=array("lib_section"=>addslashes($_POST['lib_section']), 
                           "fixed_section"=>addslashes($_POST['fixed_section']),
                           "desc_section"=>addslashes($_POST['desc_section']),  
                           "type_section"=>addslashes($_GET['type']), 
                           "id_section"=>$_POST['mod']); 
            if(intval($_POST['mod'])>1){ 
                $etatMAJ=$classsection->modification_section($options);
            }else{
                $etatMAJ=$classsection->insertion_section($options); 
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
            $this_section=$classsection->this_section($_GET['mod']); 
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
                        <label for="lib_section" class="col-sm-2 control-label">Libell&eacute; <span  style="color: red;">*</span> </label>
                        <div class="col-sm-4">
                          <input required="" type="text" class="form-control" name="lib_section" value="<?php echo stripslashes($this_section["lib_section"]) ?>"  placeholder="Libelle"/> 
                          <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                        </div> 
                        <label for="fixed_section" class="col-sm-2 control-label">Fixation-bar <span  style="color: red;">*</span></label>
                        <div class="col-sm-4">
                          <input required="" type="text" class="form-control" name="fixed_section" value="<?php echo stripslashes($this_section["fixed_section"]) ?>"  placeholder="Fixation-section"/>
                        </div>
                      </div> 
                      
                      <div class="form-group">
                        <label for="desc_section" class="col-sm-2 control-label">Description  </label>
                        <div class="col-sm-10">
                          <textarea name="desc_section" cols="50"><?php echo stripcslashes($this_section["desc_section"]) ?></textarea>
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