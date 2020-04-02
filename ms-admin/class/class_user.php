<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class User{
    
    private $dbh;
    
    public function __construct(){ 
        $this->dbh = new Database();
    }
     
    public function insertion_user($options=array()){
        $default=array("nom_user"=>"",
              "prenom_user"=>"",
              "email_user"=>"",
              "adresse_user"=>"",
              "photo_user"=>"", 
              "login_user"=>"",
              "password_user"=>"", 
              "type_user"=>"",
              "id_user"=>"" ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $sqllogo_user='';
		      if($photo_user!='') $sqllogo_user="photo_user='$photo_user',";
			  $insert=$this->dbh->exec("insert into user set 
                  nom_user='$nom_user',
                  prenom_user='$prenom_user',
                  email_user='$email_user',
                  adresse_user='$adresse_user',
                  $sqllogo_user
                  login_user='$login_user',
                  password_user='$password_user',
                  type_user='$type_user'"); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_user($options=array()){
       $default=array("nom_user"=>"",
              "prenom_user"=>"",
              "email_user"=>"",
              "adresse_user"=>"",
              "photo_user"=>"", 
              "login_user"=>"",
              "password_user"=>"",  
              "type_user"=>"",
              "id_user"=>"" );
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
        		  $sqllogo_user='';
    		      if($photo_user!='') $sqllogo_user="photo_user='$photo_user',";
    			  $pers_update=$this->dbh->exec("update user set 
                      nom_user='$nom_user',
                      prenom_user='$prenom_user',
                      email_user='$email_user',
                      adresse_user='$adresse_user',
                      $sqllogo_user
                      login_user='$login_user',
                      password_user='$password_user',
                      type_user='$type_user' where id_user='$id_user'"); 
            }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($pers_update); 
   }
    
   public function liste_user($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from user where visible_user='$publier' $trie $limit");
   }
  
    public function this_user($id_user,$publier='o'){
        $tab=$this->dbh->query("select * from user where id_user='$id_user' AND visible_user='$publier'");
        return $tab->fetch();
    }
    
    public function Login($login_user,$pwd_user){
        return $this->dbh->query("select * from user where login_user='$login_user' and password_user ='".$pwd_user."'"); 
    }
    
    public function Login1($login_user,$pwd_user,$etat_con='n',$etat_user='o'){
        return $this->dbh->query("select * from user where login_user='$login_user' and password_user ='".$pwd_user."'
                                    AND etat_connecte='$etat_con' and visible_user='$etat_user'"); 
    }
    
   public function update_publication_user($id_user,$etat='n'){
      return $this->dbh->exec("update user set visible_user='$etat'  where id_user='$id_user'");
   } 
   
   public function update_etre_connecte($id_user,$etat='n'){
      return $this->dbh->exec("update user set 	etat_connecte='$etat'  where id_user='$id_user'");
   } 
   
   public function supprimer_user($id_user,$etat='n'){
      return $this->dbh->exec("update user set visible_user='$etat'  where id_user='$id_user'");
   } 
}
$classuser= new User();
?>