<?php
/**
 * @author Marc 
 * @copyright Février 2016
 */
Class Gest_page{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
    }
     
   public function liste_page($ligne=0,$trie='',$publier='o'){
        
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from gest_page where visible='$publier' $trie $limit");
    }

    public function liste_page_categorie($cat_page,$ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from gest_page where cat_page='$cat_page' AND visible='$publier' $trie $limit");
    }
    
    public function liste_page_categorie1($publier='o'){
        //if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from gest_page where   visible='$publier' ORDER BY indice_page");
    }
    
    public function this_page($id_page,$publier='o'){
        $tab=$this->dbh->query("select * from gest_page where id_page='$id_page' AND visible='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_page($id_page,$etat='o'){
      return $this->dbh->exec("update page set publier_page='$etat'  where id_page='$id_page'");
   }
   
   public function liste_menu($ligne=0,$trie='',$publier='o'){
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from gest_menu where visible='$publier' $trie $limit");
    }
    
    public function this_menu($id_menu,$publier='o'){
        $tab=$this->dbh->query("select * from gest_menu where id_menu='$id_menu'");
        return $tab->fetch();
    }
    
   public function update_publication_menu($id_menu,$etat='o'){
    return $this->dbh->exec("update menu set publier_menu='$etat'  where id_menu='$id_menu'");
   }

   public function liste_menu_par_page($id_page,$ligne=0,$trie='',$publier='o'){
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from gest_menu where id_page='$id_page' AND gest_menu.visible='$publier' $trie $limit");
    }

   public function liste_menu_page($id_page,$ligne=0,$trie='',$publier='o'){
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from gest_page, gest_menu where gest_page.id_page='$id_page' AND 
                                  gest_page.id_page=gest_menu.id_page AND gest_menu.visible='$publier'   $trie $limit");
    }

    public function liste_menu_page_all($ligne=0,$trie='',$publier='o'){
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from gest_page, gest_menu where gest_page.id_page=gest_menu.id_page AND gest_menu.visible='$publier' $trie $limit");
    }
    
}
$classpage_menu= new Gest_page();
?>