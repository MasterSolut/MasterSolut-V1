<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Photo{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_photo($options=array()){
    $default=array("titre_photo"=>"",
              "libelle_photo"=>"",
              "src_photo"=>"",
              "position_photo"=>"",
              "id_album"=>"",
              "id_photo"=>""
              ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $sqlphoto='';
		      if($src_photo!='') $sqlphoto="src_photo='$src_photo',";
			  $insert=$this->dbh->exec("insert into photo set 
                  titre_photo='$titre_photo',
                  libelle_photo='$libelle_photo',
                  id_album='$id_album',
                  $sqlphoto
                  position_photo='$position_photo'"); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_photo($options=array()){
       $default=array("titre_photo"=>"",
              "libelle_photo"=>"",
              "src_photo"=>"",
              "position_photo"=>"",
              "id_album"=>"",
              "id_photo"=>""
              );
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    		      $sqlphoto='';
		          if($src_photo!='') $sqlphoto="src_photo='$src_photo',";
    			  $update=$this->dbh->exec("update photo set 
                      titre_photo='$titre_photo',
                      libelle_photo='$libelle_photo',
                      id_album='$id_album',
                      $sqlphoto
                      position_photo='$position_photo' where id_photo='$id_photo'"); 
            }catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($update); 
   }
    
   public function liste_photo($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from photo where visible_photo='$publier' $trie $limit");
    }
    
    public function liste_photo_by_album($id_album,$ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
            return $this->dbh->query("select * from photo where id_album='$id_album' AND visible_photo='$publier' $trie $limit");
    }
    
    public function liste_photo_by_album_publier($id_album,$ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
            return $this->dbh->query("select * from photo where id_album='$id_album' AND visible_photo='$visible' $trie $limit");
    }
  
    public function this_photo($id_photo,$publier='o'){
        $tab=$this->dbh->query("select * from photo where id_photo='$id_photo' AND visible_photo='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_photo($id_photo,$etat='n'){
      return $this->dbh->exec("update photo set visible_photo='$etat'  where id_photo='$id_photo'");
   } 
   
   public function supprimer_photo($id_photo,$etat='n'){
      return $this->dbh->exec("update photo set visible_photo='$etat'  where id_photo='$id_photo'");
   } 
}
$classphoto= new Photo();
?>