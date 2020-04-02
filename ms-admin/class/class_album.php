<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Album{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_album($options=array()){
    $default=array("titre_album"=>"",
              "libelle_album"=>"", 
              "id_section"=>"",
              "frontal_album"=>"",
              "position_album"=>"", 
              "publier_album"=>"",
              "id_album"=>"" ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $insert=$this->dbh->exec("insert into album set 
                  titre_album='$titre_album',
                  libelle_album='$libelle_album',
                  id_section='$id_section', 
                  frontal_album='$frontal_album', 
                  position_album='$position_album',
                  publier_album='$publier_album' "); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_album($options=array()){
       $default=array("titre_album"=>"",
              "libelle_album"=>"", 
              "id_section"=>"",
              "frontal_album"=>"",
              "position_album"=>"", 
              "publier_album"=>"",
              "id_album"=>""
              );
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    			  $pers_update=$this->dbh->exec("update album set 
                      titre_album='$titre_album',
                      libelle_album='$libelle_album',
                      id_section='$id_section', 
                      frontal_album='$frontal_album', 
                      position_album='$position_album',
                      publier_album='$publier_album' where id_album='$id_album'"); 
            }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($pers_update); 
   }
    
   public function liste_album($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from album where visible_album='$publier' $trie $limit");
   }
   
   public function liste_album_by_fixed($fixe,$ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        $tab=$this->dbh->query("select * from album where id_section='$fixe' and visible_album='$visible' and publier_album='$publier'  $trie $limit");
        return $tab->fetch();
   }
  
    public function this_album($id_album,$publier='o'){
        $tab=$this->dbh->query("select * from album where id_album='$id_album' AND visible_album='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_album($id_album,$etat='n'){
      return $this->dbh->exec("update album set visible_album='$etat'  where id_album='$id_album'");
   } 
   
   public function supprimer_album($id_album,$etat='n'){
      return $this->dbh->exec("update album set visible_album='$etat'  where id_album='$id_album'");
   } 
   
   public function liste_album_section_fixed($fixed='',$type='album',$ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from album, section where  fixed_section='$fixed' AND type_section='$type' and album.id_section=section.id_section and visible_album='$visible' and publier_album='$publier' $trie $limit");
   }
   
   public function liste_album_section_publier($id_section,$ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from album where id_section='$id_section' and visible_album='$visible' and publier_album='$publier' $trie $limit");
    }
   
}
$classalbum= new Album();
?>