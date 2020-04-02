<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class News{
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_news($options=array()){
        $default=array("titre_news"=>"",
              "libelle_news"=>"", 
              "contenu_news"=>"",
              "id_album"=>"",
              "traitement_news"=>"", 
              "publier_news"=>"",  
              "id_news"=>"" ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $insert=$this->dbh->exec("insert into news set 
                  titre_news='$titre_news',
                  libelle_news='$libelle_news', 
                  contenu_news='$contenu_news',
                  id_album='$id_album',
                  traitement_news='$traitement_news',
                  publier_news='$publier_news'"); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_news($options=array()){
       $default=array("titre_news"=>"",
              "libelle_news"=>"", 
              "contenu_news"=>"",
              "id_album"=>"",
              "traitement_news"=>"", 
              "publier_news"=>"",  
              "id_news"=>"" ); 
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    			  $pers_update=$this->dbh->exec("update news set 
                      titre_news='$titre_news',
                      libelle_news='$libelle_news', 
                      contenu_news='$contenu_news',
                      id_album='$id_album',
                      traitement_news='$traitement_news',
                      publier_news='$publier_news' where id_news='$id_news'"); 
            }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($pers_update); 
   }
    
   public function liste_news($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from news where visible_news='$publier' $trie $limit");
   }
  
    public function this_news($id_news,$publier='o'){
        $tab=$this->dbh->query("select * from news where id_news='$id_news' AND visible_news='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_news($id_news,$etat='n'){
      return $this->dbh->exec("update news set visible_news='$etat'  where id_news='$id_news'");
   } 
   
   public function supprimer_news($id_news,$etat='n'){
      return $this->dbh->exec("update news set visible_news='$etat'  where id_news='$id_news'");
   } 
}
$classnews= new News();
?>