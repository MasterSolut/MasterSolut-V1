<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
?>  
   <!-- Row Start -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              Liste des utilisateur<a id="dynamic-tables">s</a> 
            </div>
            <span class="tools">
                <a href="javascript:openwindows('user_form.php',900,600,false)" title="Ajouter un nouveau utilisateur" class="btn btn-primary">
                      <span class="fa fa-plus"></span>
                        Nouveau
                </a>
            </span> 
          </div>
          <div class="widget-body">
            <div id="dt_example" class="example_alt_pagination">
              <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table"> 
                <thead>
                  <tr> 
                    <th style="width:20%">
                      Nom
                    </th>
                    <th style="width:30%">
                      Pr&eacute;noms
                    </th>
                    <th style="width:15%">
                      Email
                    </th>
                    <th style="width:15%" class="hidden-phone">
                      Type utilisateur
                    </th>
                    <th style="width:7%" class="hidden-phone">
                      Compte
                    </th> 
                    <th style="width:18%; text-align: center;" class="hidden-phone">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    //$i=1;
                	$tab_user=$classuser->liste_user(0,"ORDER BY nom_user,prenom_user ASC");
                    foreach($tab_user as $userValue){
                        $idUser=$userValue["id_user"];
                        $nomUser=stripslashes($userValue["nom_user"]);
                        $prenomUser=stripslashes($userValue["prenom_user"]);
                        $emailUser=$userValue["email_user"];
                        $adresseUser=$userValue["adresse_user"];
                        $typeUser=$userValue["type_user"];
                        $publieruser=$userValue["publier_user"];   
                ?>
                  <tr class="<?php // echo $color ?>">
                    <td> 
                        <?php echo $nomUser; ?> 
                    </td>
                    <td>
                      <?php echo $prenomUser; ?>
                    </td>
                    <td>
                      <?php echo $emailUser; ?>
                    </td>
                    <td class="hidden-phone">
                      <?php echo $typeUser; ?>
                    </td>
                    <td style="text-align: center;">
                    <a title="Les parametres du compte" href="javascript:openwindows('user_form.php?compte=<?php echo $idUser ?>',400,200,false)"   type="button">
                         <span class="fa fa-desktop"></span>
                    </a>
                      <?php  ?>
                    </td>
                    
                    <td style="text-align: center;"> 
                      <a  data-original-title="" title="Modifier" href="javascript:openwindows('user_form.php?mod=<?php echo $idUser ?>',900,600,false)" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                      </a>
                      <a  data-original-title="" title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('user_form.php?supp_user=<?php echo $idUser ?>',20,40,false)" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>
                      </a>
                    </td>
                  </tr>
                 <?php 
                    $i++;
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