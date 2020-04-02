  <?php  
/**
 * @author Marc 
 * @copyright Février 2016
 */ 
 $display_current='';
 if($_GET['page']) $display_current=$_GET['page'];
?>
<div id='cssmenu'>
  <ul>
  <?php
  
      $tab_page=$classpage_menu->liste_page_categorie("cs_admin",0,"ORDER BY indice_page ASC");
      foreach ($tab_page as $page_value) {
          $id_page=$page_value["id_page"];
          $titre_page=stripslashes($page_value["titre_page"]);
          $lib_page=stripslashes($page_value["lib_page"]);
          $icone_page=stripslashes($page_value["icone_page"]);
          $href="?page=".$id_page;
  ?>
    <li class="<?php if($display_current==$id_page) echo 'active'?>">
      <a href='<?php echo $href; ?>'>
        <i class="<?php echo $icone_page; ?>"></i>
          <?php echo $titre_page; ?>
      </a> 
    </li>
  <?php  
      }
  ?>
  </ul>
</div>