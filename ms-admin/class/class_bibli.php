<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Bibli{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
    
   public function liste_bibli($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from bibli where visible_bibli='$publier' $trie $limit");
    }
  
    public function this_bibli($id_bibli,$publier='o'){
        $tab=$this->dbh->query("select * from bibli where id_bibli='$id_bibli' AND visible_bibli='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_bibli($id_bibli,$etat='n'){
      return $this->dbh->exec("update bibli set visible_bibli='$etat'  where id_bibli='$id_bibli'");
   } 
   
   public function supprimer_bibli($id_bibli,$etat='n'){
      return $this->dbh->exec("update bibli set visible_bibli='$etat'  where id_bibli='$id_bibli'");
   }
     
}
$classbibli= new Bibli();
?>