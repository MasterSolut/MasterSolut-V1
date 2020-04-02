<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Newsletters{
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_newsletters($options=array()){
        $default=array("objet_newsletters"=>"",
              "message_newsletters"=>"",  
              "nombre_recu"=>"",  
              "id_newsletters"=>"" ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $insert=$this->dbh->exec("insert into newsletters set 
                  objet_newsletters='$objet_newsletters',
                  message_newsletters='$message_newsletters', 
                  nombre_recu='$nombre_recu'"); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_newsletters($options=array()){
       $default=array("objet_newsletters"=>"",
              "message_newsletters"=>"",  
              "nombre_recu"=>"",  
              "id_newsletters"=>""); 
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    			  $pers_update=$this->dbh->exec("update newsletters set 
                        objet_newsletters='$objet_newsletters',
                        message_newsletters='$message_newsletters', 
                        nombre_recu='$nombre_recu' where id_newsletters='$id_newsletters'"); 
            }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($pers_update); 
   }
    
   public function liste_newsletters($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from newsletters where visible_newsletters='$publier' $trie $limit");
   }
  
    public function this_newsletters($id_newsletters,$publier='o'){
        $tab=$this->dbh->query("select * from newsletters where id_newsletters='$id_newsletters' AND visible_newsletters='$publier'");
        return $tab->fetch();
    }
     
   public function supprimer_newsletters($id_newsletters,$etat='n'){
      return $this->dbh->exec("update newsletters set visible_newsletters='$etat'  where id_newsletters='$id_newsletters'");
   } 
}
$classnewsletters= new newsletters();
?>