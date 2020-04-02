<?php

/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include('config.php'); 
    include('./include_top.php');
    
    $email="info@arlene-o.com";
    
    if(isset($_GET['supp_newsletters'])){
             $classnewsletters->supprimer_newsletters($_GET['supp_newsletters']);
              echo '<script type="text/javascript">
                         opener.location.reload();
                        self.close()
                    </script>';   
    }else{ 
        if(isset($_GET['mod'])) $mod=$_GET['mod'];
        if($_POST['objet_newsletters'] && $_POST['message_newsletters']){   
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'From: L\'ERUDIT <'.$email.'>' . "\r\n" .
				'Reply-To:'.$email. "\r\n" .
				'Content-Type: text/html; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
				'Content-Disposition: inline'. "\r\n" .
				'Content-Transfer-Encoding: 8bit'." \r\n" .
				'X-Mailer:PHP/'.phpversion();
                //htmlspecialchars()
                $objet=stripslashes($_POST['objet_newsletters']);
                $message ="<!doctype html><html><head><title></title></head><body>".stripslashes($_POST['message_newsletters']).'</body></html>';
                $tab_abonner=$classsection->liste_abonner();
                $num_emails=0;
                foreach($tab_abonner as $email_destinataire)
        		{ 
        			if (mail($email_destinataire["email"], $objet, $message, $headers))
        				$num_emails++;
        		}
                
                if($num_emails>0 ){
                    mail($email, $objet, $message, $headers);
                    $options=array("objet_newsletters"=>addslashes($_POST['objet_newsletters']), 
                           "message_newsletters"=>addslashes($_POST['message_newsletters']),
                           "nombre_recu"=>$num_emails, 
                           "id_newsletters"=>$_POST['mod']); 
                    if(intval($_POST['mod'])>1){
                      $etatMAJ=$classnewsletters->modification_newsletters($options);
                    }else{  
                      $etatMAJ=$classnewsletters->insertion_newsletters($options); 
                    }
                    if($etatMAJ){
                        $notification=$classutilitaire->notification('fa fa fa-exclamation-circle fa-lg', 'alert alert-block alert-info fade in','op&eacute;ration effectu&eacute;e avec succ&egrave;s'); 
                    }else{ 
                        $notification=$classutilitaire->notification('fa fa-times-circle fa-lg', 'alert alert-block alert-danger fade in no-margin','Aucune op&eacute;ration effectu&eacute;e.');  
                    }  
                } 
            echo '<script type="text/javascript">
                         opener.location.reload();
                        </script>';  
            $mod=$_POST['mod'];
        }
        if($_GET['mod']){
            $this_newsletters=$classnewsletters->this_newsletters($_GET['mod']); 
        }   
?>  
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <h4 class="modal-title">Nouveau NewsLetters</h4>
        </div>
      </div>
      <div class="widget-body">
        <?php echo $notification ?> 
        <form class="form-horizontal no-margin" id="edit" method="post" >
            <div class="modal-body"> 
              <div class="form-group">
                <label for="titre" class="col-sm-2 control-label">Objet <span  style="color: red;">*</span> </label>
                <div class="col-sm-10">
                  <input required="" type="text" class="form-control" name="objet_newsletters" value="<?php echo stripslashes($this_newsletters["objet_newsletters"]) ?>"  placeholder="Objet du message "/> 
                  <input type="hidden" class="input-long" name="mod" <?php if(intval($mod)<1) echo 'disabled=""'?> value="<?php echo $mod ?>" />
                </div>  
              </div> 
              <div class="form-group">
                <label for="info" class="col-sm-2 control-label">Message<span  style="color: red;">*</span></label>
                <div class="col-sm-10">
                      <?php
        			    include("fckeditor/fckeditor.php") ; 
        				$oFCKeditor = new FCKeditor('message_newsletters');
        				$oFCKeditor->Value=stripslashes($this_newsletters['message_newsletters']);
        				$oFCKeditor->Height=500;
        				$oFCKeditor->ToolbarSet='Default';
        				$oFCKeditor->BasePath = 'fckeditor/' ;
        				$oFCKeditor->newsletters['EnterMode'] = 'p';
        				$oFCKeditor->Create() ;  	
        			?>
                </div>
              </div>
                 
            </div> 
            <div class="modal-footer">
                <a type="submit" href="javascript:document.getElementById('edit').submit()" class="btn btn-primary">Envoyer</a> 
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