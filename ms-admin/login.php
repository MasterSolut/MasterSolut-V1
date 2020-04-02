<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
    include("config.php");
    if(count($_POST))
    {
        $connectReq=$classuser->Login($_POST['login_user'],$_POST['password_user']);
        if($connectReq->rowCount()>0)
        {
             $tabses=$connectReq->fetch(); 
             //if($tabses["etat_connecte"]=='n'){
             $_SESSION['user']['savelogin']=stripslashes($tabses['login_user']);
             $_SESSION['user']['id_user']=$tabses['id_user'];
             //$classuser->update_etre_connecte($_SESSION['user']['id_user'],'o');
             header("location:index.php");
             exit();
            /* }else{
                $notification=$classutilitaire->notification('fa fa-warning fa-lg', 'alert alert-block alert-warning  fade in no-margin',"Ce compte est en cours d'utilisation");  
             } */
    		 
        }else{
            $notification=$classutilitaire->notification('fa fa-times-circle fa-lg', 'alert alert-block alert-danger fade in no-margin','Login ou Mot de passe incorrect');  
        } 
    }  
     $this_site=$classconfig->liste_config(1)->fetch();
     $this_logo=DOSSIER_UPLOAD.stripslashes($this_site["logo_site"]);
     $_SESSION['logo']=DOSSIER_UPLOAD.stripslashes($this_site["logo_site"]);
     
     $this_favicon=DOSSIER_UPLOAD.stripslashes($this_site["favicon_site"]);
     $_SESSION['favicon']=DOSSIER_UPLOAD.stripslashes($this_site["favicon_site"]);
          
     $_SESSION['titre_site']=stripslashes($this_site["titre_site"]);
?>
<!DOCTYPE html>
<html>
  
<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2016 10:31:08 GMT -->
<head>
    <title>CS | Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="Blue Moon - Responsive Admin Dashboard" />
    <meta name="keywords" content="Notifications, Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap, bootstrap.gallery" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="<?php echo $_SESSION['favicon'] ?>"/>
    
    <link href="css/bootstrap.min.css" rel="stylesheet"/>

    <link href="css/new.css" rel="stylesheet"/>
    <!-- Important. For Theming change primary-color variable in main.css  --> 
    <link href="fonts/font-awesome.min.css" rel="stylesheet"/> 
  </head> 
  <body> 
    <!-- Main Container start -->
    <div class="dashboard-container"> 
      <div class="container"> 
        <!-- Row Start -->
        <div class="row">
          <div class="col-lg-4 col-md-4 col-md-offset-4">
            <div class="sign-in-container">
              <form action="" class="login-wrapper" method="post">
                <div class="header">
                  <div class="row">
                    <div class="col-md-12 col-lg-12">
                      <h3 style="text-align: left;"><img src="<?php echo $this_logo ?>" style="width: 150px; height: 70px;" alt="Logo" class="pull-left"/></h3>
                    </div>
                    <br/>
                    <div class="col-md-12 col-lg-12 col-xs-12"> 
                      <h3 style="text-align: center; color: #337AB7; padding-top: 10px;">Panel d'Authentification</h3> 
                    </div>
                  </div> 
                        <?php echo $notification ?>  
                </div>
                <div class="content">
                  <div class="form-group">
                    <label for="userName">Login :</label>
                    <input required="" type="text" class="form-control" name="login_user" placeholder="Nom utilisateur"/>
                  </div>
                  <div class="form-group">
                    <label for="Password1">Password :</label>
                    <input required="" type="password" class="form-control"  name="password_user" placeholder="Mot de passe"/>
                  </div>
                </div>
                <div class="actions">
                  <input class="btn btn-primary" name="Login" type="submit" value="Login"/> 
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Row End -->
        
      </div>
    </div>
    <!-- Main Container end -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>

<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2016 10:31:10 GMT -->
</html>