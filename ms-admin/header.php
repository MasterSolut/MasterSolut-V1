<header>
      <div class="pull-center" style=" margin-left: 500px;">
         <a href="index.php" class="logo">
            <img style="width: 100%; height: 50px;" src="img/logo.png" alt="Logo"/>
         </a>
      </div>
      <div class="pull-right">
        <ul id="mini-nav" class="clearfix"> 
            <?php   
                $user=$classuser->this_user($idUser);
                $user_name=stripslashes($user["nom_user"])." ".stripslashes($user["prenom_user"]);
                $profil=stripslashes($user["photo_user"]);
                if($profil==""){
                    $profil="profile.png";
                } 
            ?>
          <li class="list-box user-profile">
            <a id="drop7" href="#" role="button" class="dropdown-toggle user-avtar" data-toggle="dropdown">
              <img src="<?php echo DOSSIER_UPLOAD.$profil; ?>" style="width: 50px; height: 50px;"/>
            </a>
            <ul class="dropdown-menu server-activity"> 
            <li>
                <h5>Connect&eacute; :<?php echo $user_name; ?></h5>
            </li> 
              <li>
                <div >
                  <a href="index.php?logout=1" class="btn btn-danger" title="D&eacute;connexion">
                   <span class="fa fa-power-off"></span> D&eacute;connexion
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </header>