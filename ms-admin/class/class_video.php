<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Video{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_video($options=array()){
    $default=array("titre_video"=>"",
              "code_video"=>"",  
              "position_video"=>"", 
              "publier_video"=>"",
              "id_video"=>"" ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $insert=$this->dbh->exec("insert into video set 
                  titre_video='$titre_video',
                  code_video='$code_video', 
                  position_video='$position_video',
                  publier_video='$publier_video' "); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_video($options=array()){
       $default=array("titre_video"=>"",
              "code_video"=>"",  
              "position_video"=>"", 
              "publier_video"=>"",
              "id_video"=>"");
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    			  $pers_update=$this->dbh->exec("update video set 
                      titre_video='$titre_video',
                      code_video='$code_video', 
                      position_video='$position_video',
                      publier_video='$publier_video' where id_video='$id_video'"); 
            }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($pers_update); 
   }
    
   public function liste_video($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from video where visible_video='$publier' $trie $limit");
   }
   
   public function liste_all_type_video ($ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from video where visible_video='$visible' and publier_video='$publier' $trie $limit");
   }
    
   public function this_video($id_video,$publier='o'){
        $tab=$this->dbh->query("select * from video where id_video='$id_video' AND visible_video='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_video($id_video,$etat='n'){
      return $this->dbh->exec("update video set visible_video='$etat'  where id_video='$id_video'");
   } 
   
   public function supprimer_video($id_video,$etat='n'){
      return $this->dbh->exec("update video set visible_video='$etat'  where id_video='$id_video'");
   } 
   
    
}
$classvideo= new Video();
?>