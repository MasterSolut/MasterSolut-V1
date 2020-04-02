<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Menu{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_menu($options=array()){
    $default=array("titre_menu"=>"",
              "libelle_menu"=>"", 
              "position_menu"=>"", 
              "fichier_menu"=>"", 
              "publier_menu"=>"",
              "contenu_menu"=>"",
              "affiche_acceuil"=>"",
              "id_section"=>"",
              "id_menu"=>""
              ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $sqlfichier='';
		      if($fichier_menu!='') $sqlfichier="fichier_menu='$fichier_menu',";
			  $insert=$this->dbh->exec("insert into menu set 
                  titre_menu='$titre_menu',
                  libelle_menu='$libelle_menu', 
                  contenu_menu='$contenu_menu',
                  position_menu='$position_menu',
                  affiche_acceuil='$affiche_acceuil',
                  $sqlfichier
                  publier_menu='$publier_menu',
                  id_section='$id_section' "); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_menu($options=array()){
       $default=array("titre_menu"=>"",
              "libelle_menu"=>"",
              "contenu_menu"=>"",
              "position_menu"=>"",  
              "fichier_menu"=>"", 
              "publier_menu"=>"",
              "affiche_acceuil"=>"",
              "id_section"=>"",
              "id_menu"=>""
              );
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    		      $sqlfichier='';
		          if($fichier_menu!='') $sqlfichier="fichier_menu='$fichier_menu',";
    			  $update=$this->dbh->exec("update menu set 
                  titre_menu='$titre_menu',
                  libelle_menu='$libelle_menu',
                  contenu_menu='$contenu_menu',
                  position_menu='$position_menu',
                  affiche_acceuil='$affiche_acceuil',
                  $sqlfichier
                  id_section='$id_section',
                  publier_menu='$publier_menu' where id_menu='$id_menu'"); 
            }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($update); 
   }
    
   public function liste_menu($ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from menu where visible_menu='$visible' $trie $limit");
   }
   
   public function this_menu_libelle($libelle="",$ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        $tab=$this->dbh->query("select * from menu where libelle_menu='$libelle' and visible_menu='$visible' $trie $limit");
        return $tab->fetch();
   }
    
    public function liste_menu_action_publier($ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from menu where visible_menu='$visible' and publier_menu='$publier' $trie $limit");
    }
    
    public function liste_menu_sur_acceuil($visible_accueil='o',$ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from menu where affiche_acceuil='$visible_accueil' and visible_menu='$visible' and publier_menu='$publier' $trie $limit");
    }
    
    public function liste_menu_section_publier($id_section,$ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from menu where id_section='$id_section' and visible_menu='$visible' and publier_menu='$publier' $trie $limit");
    }

    public function this_menu_section_position($id_section,$postion,$publier='o',$visible='o'){  
        $tab=$this->dbh->query("select * from menu where id_section='$id_section' and position_menu='$postion' and visible_menu='$visible' and publier_menu='$publier'");
        return $tab->fetch();
    }
    
    public function liste_menu_section_fixed($fixed='',$ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from menu where id_section IN (select id_section FROM section where fixed_section='$fixed') and visible_menu='$visible' and publier_menu='$publier' $trie $limit");
    }
     
    public function this_menu($id_menu,$visible='o'){
        $tab=$this->dbh->query("select * from menu where id_menu='$id_menu' AND visible_menu='$visible'");
        return $tab->fetch();
    }
    
    public function this_menu_on_home($libelle,$visible='o'){
        $tab=$this->dbh->query("select * from menu where affiche_acceuil='$libelle' AND visible_menu='$visible'");
        return $tab->fetch();
    }
    
   public function this_menu_by_position($position,$id_section,$publier='o'){
        $tab=$this->dbh->query("select * from menu where id_section='$id_section' AND position_menu='$position' AND  visible_menu='$publier'");
        return $tab->fetch();
   }
    
    public function this_menu_by_section_prive_id($idmenu,$id_section,$publier='o'){
        $tab=$this->dbh->query("select * from menu where id_section='$id_section' AND id_menu!='$idmenu' AND  visible_menu='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_menu($id_menu,$etat='n'){
      return $this->dbh->exec("update menu set visible_menu='$etat'  where id_menu='$id_menu'");
   } 
   
   public function supprimer_menu($id_menu,$etat='n'){
      return $this->dbh->exec("update menu set visible_menu='$etat'  where id_menu='$id_menu'");
   } 
   
}
$classmenu= new Menu();
?>