<?php 
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
include('config.php');
    if($_GET['logout']){ 
        $classuser->update_etre_connecte($_SESSION['user']['id_user'],'n');
        @session_destroy();
        header("location:login.php");
        exit();
}
if(!isset($_SESSION['user']['savelogin'])){
    header("location:login.php");            
    exit();
}
?>
<?php 
    include('include_top.php'); 
?>
    <!-- Header Start -->
    <?php  
        $idUser=$_SESSION['user']['id_user']; 
		include('header.php'); 
	?> 
    <!-- Header End -->

    <!-- Main Container start -->
    <div class="dashboard-container">

      <div class="container">
        <!-- Top Nav Start -->
        <?php 
			include('menu.php'); 
		?> 
        <!-- Top Nav End -->
        <?php 
            $id_page=$_GET["page"]; 
			if(!$id_page){  
    			include('accueil.php');  
			 }else{	 
                  $this_page=$classpage_menu->this_page($id_page);
                  $titre_page=stripslashes($this_page["titre_page"]);
		?>
        <!-- Sub Nav start-->
        <div class="sub-nav hidden-sm hidden-xs">
            <ul>
                <li><a href="javascript: void(0)" class="heading"><?php echo $titre_page ?> </a></li>
                 <?php 
                    $menu_page=$_GET["menu"];
                    if(!$menu_page){
                        
                         $thismenu_selected=$classpage_menu->liste_menu_par_page($id_page,1,"ORDER BY indice_menu ASC");
                         foreach($thismenu_selected as $value){
                            $menu_page=$value["id_menu"];
                         } 
                         
                    }
                    $tab_menu=$classpage_menu->liste_menu_par_page($id_page,0,"ORDER BY indice_menu ASC");
    			     foreach($tab_menu as $menu_value){
                        $id_menu=$menu_value["id_menu"];
                        $lib_menu=stripslashes($menu_value["lib_menu"]);
                        $href="?page=".$id_page."&menu=".$id_menu; 
    		      ?>
                    <li class="hidden-sm hidden-xs">
                      <a href="<?php echo $href ?>" title="<?php echo $lib_menu ?>" class="<?php if($menu_page==$id_menu) echo 'selected' ?>"><?php echo $lib_menu ?></a>
                    </li> 
                <?php 
    			 } 	      
    		    ?>
          </ul> 
        </div> 
        <!-- Sub Nav End -->

        <!-- Dashboard Wrapper Start -->
        <div class="dashboard-wrapper">
           
            
        <?php 
			include('contenu.php'); 
		?>  
      <?php  } ?> 
        </div>
        <!-- Dashboard Wrapper End --> 
        <footer>
          <h6>MasterSolut &copy;2017.  <b>Powered by </b><a target="_blank" href="http://www.mastersolut.com">MasterSolut</a></h6>
        </footer>
      </div>
    </div>
    <!-- Main Container end -->
    <?php 
		include('include_foot.php'); 
	?> 
  <script type="text/javascript">
 var validNavigation = false;
  
function endSession() {
  // appel à ta page
  alert("fermeture")  
}
  
function wireUpEvents() {
  window.onbeforeunload = function() {
      if (!validNavigation) {
         endSession();
      }
  }
  
  // Exclure l'appel à la page lors du refresh
  $(document).bind('keypress', function(e) {
    if (e.keyCode == 116){
      validNavigation = true;
    }
  });
}

wireUpEvents();
</script>