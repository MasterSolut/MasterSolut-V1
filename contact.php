<?php
     // destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
    $destinataire = $mail_contact;//'info@arlene-o.com';
    // copie ? (envoie une copie au visiteur)
    $copie = 'oui';
    // Messages de confirmation du mail
    $message_envoye = "Votre message nous est bien parvenu !";
    $message_non_envoye = "L'envoi du mail a &eacute;chou&eacute;, veuillez r&eacute;essayer SVP!";
    $email_error='Email Invalide';

    // formulaire envoyé, on récupère tous les champs.
    $nomprenoms     = (isset($_POST['nomprenoms']))     ? $classutilitaire->Rec($_POST['nomprenoms'])     : '';
    $telephone   = (isset($_POST['telephone']))   ? $classutilitaire->Rec($_POST['telephone'])   : '';
    $entreprise   = (isset($_POST['entreprise']))   ? $classutilitaire->Rec($_POST['entreprise'])   : '';
    $email   = (isset($_POST['email']))   ? $classutilitaire->Rec($_POST['email'])   : '';
    $objet   = (isset($_POST['objet']))   ? $classutilitaire->Rec($_POST['objet'])   : '';
    $message = (isset($_POST['message'])) ? $classutilitaire->Rec($_POST['message']) : ''; 
 
    if($_POST){  
        if($classutilitaire->IsEmail($email)){ 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From:'.$nomprenoms.' <'.$email.'>' . "\r\n" .
            'Reply-To:'.$email. "\r\n" .
            'Content-Type: text/html; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
            'Content-Disposition: inline'. "\r\n" .
            'Content-Transfer-Encoding: 7bit'." \r\n" .
            'X-Mailer:PHP/'.phpversion(); 
        // envoyer une copie au visiteur ?
            if($entreprise){
                $message ='<!doctype html><html><head><title>Conact MasterSolut</title></head><body>'.
                    '<h4> <br/> Entreprise :'.$entreprise.' <br/></h4>'. 
                    '<h2> <br/> T&eacute;l&eacute;phone :'.$telephone.' <br/></h2>'.
                    $message.'<br/>'.
                    '------------------------------------------<br/>www.mastersolut.com';
                    '</body></html>';
            }else{
                $message ="<!doctype html><html><head><title></title></head><body><h2> <br/> T&eacute;l&eacute;phone :".$telephone." <br/></h2> ".$message."</body></html>";
            }
        
         
        if ($copie == 'oui')
        {
            $cible = $destinataire.';'.$email;
        }
        else
        {
            $cible = $destinataire;
        };

        // Remplacement de certains caractères spéciaux
        $objet = str_replace("&#039;","'",$objet);
        $objet = str_replace("&#8217;","'",$objet);
        $objet = str_replace("&quot;",'"',$objet);
        $objet = str_replace('<br>','',$objet);
        $objet = str_replace('<br />','',$objet);
        $objet = str_replace("&lt;","<",$objet);
        $objet = str_replace("&gt;",">",$objet);
        $objet = str_replace("&amp;","&",$objet);
                
        $message = str_replace("&#039;","'",$message);
        $message = str_replace("&#8217;","'",$message);
        $message = str_replace("&quot;",'"',$message);
        $message = str_replace('<br>','',$message);
        $message = str_replace('<br />','',$message);
        $message = str_replace("&lt;","<",$message);
        $message = str_replace("&gt;",">",$message);
        $message = str_replace("&amp;","&",$message); 
        // Envoi du mail
        $num_emails = 0;
        $tmp = explode(';', $cible);
        
        foreach($tmp as $email_destinataire)
        {
            if (mail($email_destinataire, $objet, $message, $headers))
                $num_emails++;
        }

        if((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
        { 
            $notification="<font color='#E32C83;'>  ".$message_envoye."</font>";
        }
        else
        {
            $notification="<font color='red'>  ".$message_non_envoye."</font>";
        };
        }else{
            $notification="<font color='red'>  ".$email_error."</font>";
        }
    }   
?> 
        <section id="sp-page-title">
            <div class="row">
                <div id="sp-title" class="col-sm-12 col-md-12">
                    <div class="sp-column ">
                        <div class="sp-page-title" data-stellar-background-ratio="0.3">
                            <div class="sp-page-title-inner ">
                                <div class="container text-center">
                                    <h3>
                                        <?php 
                                            if($_GET["edition"]){
                                                echo "H&eacute;bergement";
                                                }else{
                                                    echo"NOUS CONTACTER";
                                            } 
                                        ?>
                                    </h3> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="sp-main-body">
            <div class="row">
                <div id="sp-component" class="col-sm-12 col-md-12">
                    <div class="sp-column ">
                        <div id="system-message-container"></div>
                            <div id="sp-page-builder" class="sp-page-builder  page-15">
                               <div class="page-content">
                                <section  class="sppb-section section-bg" style="">
                                    <div class="sppb-container">
                                        <div class="sppb-row">
                                            <div class="sppb-col-sm-4">
                                                <div class="sppb-addon-containersp-left" style="" data-sppb-wow-duration="300ms">
                                                    <div class="sppb-addon sppb-addon-text-block sppb-text-left has-border">
                                                        <h3 class="sppb-addon-title" style="">Contact Physique</h3>
                                                        <div class="sppb-addon-content">
                                                            <strong style="font-size: 15px;">
                                                                <i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo $tel_contact ?> <br /><br />
                                                                <i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo $mail_contact ?> <br /><br />
                                                                <i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $adresse ?>
                                                            </strong>   
                                                        </div>
                                                    </div>
                                                    <div class="sppb-addon sppb-addon-text-block sppb-text-left has-border">
                                                        <h3 class="sppb-addon-title" style="">Heures d'Ouverture</h3>
                                                        <div class="sppb-addon-content">
                                                            <strong style="font-size: 15px;">
                                                                <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Lundi - Vendredi    : 7h â€“ 19h <br />
                                                                <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Samedi         : 8h â€“ 12h <br /> 
                                                            </strong>
                                                        </div>
                                                    </div>
                                                     <div class="sppb-addon sppb-addon-text-block sppb-text-left has-border">
                                                        <h3 class="sppb-addon-title" style="">REJOIGNEZ NOUS SUR :</h3>
                                                        <div class="sppb-addon-content">
                                                            <div style="width: 100%; heigth: 100%;" class="fb-page" data-href="https://www.facebook.com/mastersolut" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                                                <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/mastersolut"><a target="_blank" href="https://www.facebook.com/mastersolut">MasterSolut</a></blockquote>
                                                                </div>
                                                            </div>  

                                                        </div>
                                                        <div class="sppb-addon-content">
                                                             <div class="pull-left sp-tweet-avatar ">
                                                        <a href="https://twitter.com/mastersoluts" class="twitter-follow-button"  data-show-count="false" data-lang="fr" data-size="large">Suivre MasterSolut</a>  
                                                    </div>
                                                            
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="sppb-col-sm-8">
                                            <div class="sppb-addon-container" style="">
                                                <div class="sppb-addon sppb-addon-module has-border">
                                                    <h3 class="sppb-addon-title" style="">
                                                    <?php if($_GET["edition"]){
                                                            $objet="COMMANDER VOTRE EDITION <strong> MS ".$_GET["edition"]."</strong>";
                                                            echo $objet;
                                                            }else{
                                                                echo"NOUS ECRIRE";
                                                            } 
                                                    ?>
                                                    </h3>
                                                        <div class="sppb-addon-content"> 
                                                        <div id="mod-rscontact-container-130" class="mod-rscontact-container">
                                                            <form method="post" action="" >
                                                                <fieldset>
                                                                    <div class="mod-rscontact-pre-text">
                                                                        <p>Les champs (*) sont obligatoires.</p>            
                                                                    </div>
                                                                     <h4> <?php echo $notification?></h4>
                                                                    <div class="control-group">
                                                                        <div class="controls">
                                                                            <input name="nomprenoms" type="text" value="" required=""   placeholder="Nom & pr&eacute;noms *" />
                                                                        </div>
                                                                    </div>  
                                                                    <div class="control-group">
                                                                        <div class="controls">
                                                                            <input name="telephone" type="text" value="" class="ignore" placeholder="T&eacute;l&eacute;phone " /> 
                                                                        </div>
                                                                    </div> 
                                                                    <div class="control-group">
                                                                        <div class="controls">
                                                                            <input name="email" type="email" required=""  value="" placeholder="E-mail *"  />
                                                                        </div>
                                                                    </div>
                                                                    <?php if($_GET["edition"]){  
                                                                    ?>
                                                                    <div class="control-group">
                                                                        <div class="controls">
                                                                            <input name="entreprise" type="text" required=""  value="" placeholder="Nom de l' entreprise *"  />
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="control-group">
                                                                        <div class="controls">
                                                                            <input name="objet"  type="text" required=""  value="<?php if($_GET["edition"]){ 
                                                                            echo "COMMANDE HEBERGEMENT WEB: EDITION MS ".strtoupper($_GET["edition"]);
                                                                            } 
                                                                    ?>" placeholder="Objet *"  />
                                                                        </div>
                                                                    </div> 
                                                                    <div class="control-group">
                                                                        <div class="controls">
                                                                            <textarea name="message"  value="" rows="5" required=""  placeholder="Message *" ></textarea>
                                                                        </div>
                                                                   </div> 
                                                                    <div class="control-group">
                                                                        <div class="controls">
                                                                             <div id="capt"  data-sitekey="6LdVvOwSAAAAACfTmrDWFwexsYxvDyDrssFgbW0t" data-theme="light" data-size="normal"></div>  
                                                                        </div>
                                                                    </div>
                                                                        
                                                                    <div class="control-group" id="mod-rscontact-error-msg-130" style="display:none"></div>
                                                                    
                                                                    <div class="controls">
                                                                        <button type="submit" id="mod-rscontact-submit-btn-130" name="mod_rscontact_submit-btn-130" value="" id="submit" class="btn btn-primary submit"  />
                                                                            <img id="loading-130" class="mod-rscontact-loader" alt="Chargement, SVP Patienter..." src="assets/images/ajax-loader.gif" />
                                                                            <?php if($_GET["edition"]){ 
                                                                                echo "Commander ";
                                                                            }else{ echo "Envoyer"; } 
                                                                    ?>              
                                                                            <i class="fa fa-arrow-right"></i>
                                                                        </button>
                                                                    </div>
                                                                
                                                                </fieldset>
                                                            </form>
                                                            <div class="control-group" id="mod-rscontact-msg-130" style="display:none"></div>
                                                            <div class="control-group" id="mod-rscontact-warning-msg-130" style="display:none"></div>
                                                        </div>
                                                        </div>


</div></div></div></div></div></section>    </div>
</div>

</div></div></div></section>
