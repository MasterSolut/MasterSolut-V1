<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Plugin{
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_plugin($options=array()){
        $default=array("titre_plugin"=>"",
              "libelle_plugin"=>"",
              "lien_plugin"=>"",
              "alias_plugin"=>"",
              "contenu_plugin"=>"",
              "traitement_plugin"=>"",
              "id_album"=>"",  
              "id_plugin"=>"" ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $insert=$this->dbh->exec("insert into plugin set 
              titre_plugin='$titre_plugin',
              libelle_plugin='$libelle_plugin',
              alias_plugin='$alias_plugin',
              contenu_plugin='$contenu_plugin',
              id_album='$id_album',
              traitement_plugin='$traitement_plugin',
              lien_plugin='$lien_plugin'"); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_plugin($options=array()){
       $default=array("titre_plugin"=>"",
              "libelle_plugin"=>"",
              "lien_plugin"=>"",
              "alias_plugin"=>"",
              "contenu_plugin"=>"",
              "traitement_plugin"=>"",
              "id_album"=>"",  
              "id_plugin"=>"" ); 
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    			  $pers_update=$this->dbh->exec("update plugin set 
                  titre_plugin='$titre_plugin',
                  libelle_plugin='$libelle_plugin',
                  alias_plugin='$alias_plugin',
                  contenu_plugin='$contenu_plugin',
                  id_album='$id_album',
                  traitement_plugin='$traitement_plugin',
                  lien_plugin='$lien_plugin' where id_plugin='$id_plugin'"); 
            }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($pers_update); 
   }
    
   public function liste_plugin($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from plugin where visible_plugin='$publier' $trie $limit");
   }
  
    public function this_plugin($id_plugin,$publier='o'){
        $tab=$this->dbh->query("select * from plugin where id_plugin='$id_plugin' AND visible_plugin='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_plugin($id_plugin,$etat='n'){
      return $this->dbh->exec("update plugin set visible_plugin='$etat'  where id_plugin='$id_plugin'");
   } 
   
   public function supprimer_plugin($id_plugin,$etat='n'){
      return $this->dbh->exec("update plugin set visible_plugin='$etat'  where id_plugin='$id_plugin'");
   } 
}
$classplugin= new Plugin();
?>