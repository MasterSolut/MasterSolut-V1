<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Section{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_section($options=array()){
    $default=array("lib_section"=>"",
              "fixed_section"=>"",
              "desc_section"=>"",
              "type_section"=>"",  
              "id_section"=>""
              ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
			  $insert=$this->dbh->exec("insert into section set 
                  lib_section='$lib_section',
                  fixed_section='$fixed_section',
                  desc_section='$desc_section',
                  type_section='$type_section' "); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_section($options=array()){
       $default=array("lib_section"=>"",
              "fixed_section"=>"",
              "desc_section"=>"",
              "type_section"=>"",
              "id_section"=>""
              );
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    			  $pers_update=$this->dbh->exec("update section set 
                      lib_section='$lib_section',
                      fixed_section='$fixed_section',
                      desc_section='$desc_section',
                      type_section='$type_section' where id_section='$id_section'"); 
            }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($pers_update); 
   }
    
   public function liste_section($type='',$ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from section where type_section='$type' and visible_section='$visible' $trie $limit");
    }
    
    public function liste_section_fixed($fixed='',$ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        $tab=$this->dbh->query("select * from section  where fixed_section='$fixed' and visible_section='$visible'  $trie $limit");
        return $tab->fetch();
    }
  
    public function this_section($id_section,$visible='o'){
        $tab=$this->dbh->query("select * from section where id_section='$id_section' AND visible_section='$visible'");
        return $tab->fetch();
    }
    
   public function update_publication_section($id_section,$etat='n'){
      return $this->dbh->exec("update section set visible_section='$etat'  where id_section='$id_section'");
   } 
   
   public function supprimer_section($id_section,$etat='n'){
      return $this->dbh->exec("update section set visible_section='$etat'  where id_section='$id_section'");
   } 
    
   //NEWSLETTERS
   
   public function insertion_abonner($email){ 
         $insert=$this->dbh->exec("insert into abonner_newsletters set 
                  email='$email' "); 
         return $insert;
   }
   
    public function liste_abonner($ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from abonner_newsletters where visible_abonner='$visible' $trie $limit");
    }
    
    public function update_abonner($id_abonner,$visible='n'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("update abonner_newsletters set visible_abonner='$visible' where id='$id_abonner' $trie $limit");
    }
    
    public function verifier_email_abonner($email='',$visible='o'){  
        return $this->dbh->query("select * from abonner_newsletters where email='$email' and visible_abonner='$visible'");
    }
}
$classsection= new Section();
?>