<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Config{
    
   private $dbh;
   
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_config($options=array()){
        $default=array("nom_site"=>"",
              "url_site"=>"",
              "code_google_map"=>"", 
              "tel_contact"=>"", 
              "email"=>"", 
              "src_site"=>"",
              "info_adresse_site"=>"", 
              "logo_site"=>"",
              "favicon_site"=>"",
              "id_config"=>"" ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $sqllogo_site='';
		      if($logo_site!='') $sqllogo_site="logo_site='$logo_site',";
              
		      $sqlfavison_site='';
		      if($favicon_site!='') $sqlfavicon_site="favicon_site='$favicon_site',";
			  $insert=$this->dbh->exec("insert into config set 
                  nom_site='$nom_site',
                  url_site='$url_site',
                  code_google_map='$code_google_map',
                  tel_contact='$tel_contact',
                  email='$email',
                  $sqllogo_site 
                  $sqlfavicon_site
                  info_adresse_site='$info_adresse_site'"); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_config($options=array()){
       $default=array("nom_site"=>"",
              "url_site"=>"",
              "code_google_map"=>"", 
              "email"=>"", 
              "tel_contact"=>"", 
              "src_site"=>"",
              "info_adresse_site"=>"", 
              "logo_site"=>"",
              "id_config"=>"" );
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    		      $sqllogo_site='';
		          if($logo_site!='') $sqllogo_site="logo_site='$logo_site',";
                  
    		      $sqlfavicon_site='';
    		      if($favicon_site!='') $sqlfavicon_site="favicon_site='$favicon_site',";
    			  $update=$this->dbh->exec("update config set 
                      nom_site='$nom_site',
                      url_site='$url_site',
                      code_google_map='$code_google_map',
                      email='$email',
                      tel_contact='$tel_contact',
                      $sqllogo_site 
                      $sqlfavicon_site
                      info_adresse_site='$info_adresse_site' where id_config='$id_config'"); 
            }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($update); 
   }
    
   public function liste_config($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from config where visible_site='$publier' $trie $limit");
    }
  
    public function this_config($id_config,$publier='o'){
        $tab=$this->dbh->query("select * from config where id_config='$id_config' AND visible_site='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_config($id_config,$etat='n'){
      return $this->dbh->exec("update config set visible_site='$etat'  where id_config='$id_config'");
   } 
   
   public function supprimer_config($id_config,$etat='n'){
      return $this->dbh->exec("update config set visible_site='$etat'  where id_config='$id_config'");
   } 
}
$classconfig= new Config();
?>