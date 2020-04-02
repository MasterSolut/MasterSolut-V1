<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Smenu{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_smenu($options=array()){
    $default=array("titre_smenu"=>"",
              "libelle_smenu"=>"",
              "fichier_smenu"=>"", 
              "contenu_smenu"=>"", 
              "position_smenu"=>"", 
              "publier_smenu"=>"",
              "service_accueil"=>"",
              "id_menu"=>"",
              "id_smenu"=>""
              ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
		      $sqlfichier='';
		      if($fichier_smenu!='') $sqlfichier="fichier_smenu='$fichier_smenu',";
			  $insert=$this->dbh->exec("insert into smenu set 
              titre_smenu='$titre_smenu',
              libelle_smenu='$libelle_smenu',
              contenu_smenu='$contenu_smenu',
              $sqlfichier
              position_smenu='$position_smenu',
              service_accueil='$service_accueil',
              id_menu='$id_menu',
              publier_smenu='$publier_smenu'"); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_smenu($options=array()){
       $default=array("titre_smenu"=>"",
              "libelle_smenu"=>"",
              "page_smenu"=>"",
              "fichier_smenu"=>"",
              "contenu_smenu"=>"", 
              "position_smenu"=>"", 
              "publier_smenu"=>"",
              "service_accueil"=>"",
              "id_menu"=>"",
              "id_smenu"=>""
              );
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
        		  $sqlfichier='';
    		      if($fichier_smenu!='') $sqlfichier="fichier_smenu='$fichier_smenu',";
    			  $pers_update=$this->dbh->exec("update smenu set 
                  titre_smenu='$titre_smenu',
                  libelle_smenu='$libelle_smenu',
                  contenu_smenu='$contenu_smenu',
                  $sqlfichier
                  position_smenu='$position_smenu',
                  service_accueil='$service_accueil',
                  id_menu='$id_menu',
                  publier_smenu='$publier_smenu' where id_smenu='$id_smenu'"); 
            }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($pers_update); 
   }
    
    public function this_smenu_by_libelle($libelle="",$ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        $tab=$this->dbh->query("select * from smenu where libelle_smenu='$libelle' and visible_smenu='$visible' $trie $limit");
        return $tab->fetch();
   }
   
    /*public function this_menu_by_libelle_list_smenu($libelle="",$ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from smenu where id_menu in( select idmenu from menu where libelle_menu='$libelle') and visible_smenu='$visible' $trie $limit"); 
   }
   */
    
   public function liste_smenu($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from smenu where visible_smenu='$publier' $trie $limit");
    }
    
    public function liste_smenu_by_menu($id_menu,$ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
            return $this->dbh->query("select * from smenu where id_menu='$id_menu' AND visible_smenu='$visible' $trie $limit");
    }
    
    public function liste_smenu_by_menu_by_pagination($id_menu,$debut=0,$ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit $debut,$ligne";
            return $this->dbh->query("select * from smenu where id_menu='$id_menu' AND visible_smenu='$visible' $trie $limit");
    }
    
    public function liste_smenu_by_menu_action_publier($id_menu,$ligne=0,$trie='',$visible='o',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
            return $this->dbh->query("select * from smenu where id_menu='$id_menu' AND visible_smenu='$visible' AND publier_smenu='$publier' $trie $limit");
    }
    
    public function liste_smenu_menu_lib_fixe($libelle="",$ligne=0,$trie='',$visible='o',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
            return $this->dbh->query("select * from smenu where smenu.id_menu IN (select id_menu from menu where menu.libelle_menu='$libelle') AND visible_smenu='$visible' AND publier_smenu='$publier' $trie $limit");
    }
    
    
  
    public function this_smenu($id_smenu,$publier='o'){
        $tab=$this->dbh->query("select * from smenu where id_smenu='$id_smenu' AND visible_smenu='$publier'");
        return $tab->fetch();
    }
    
    public function this_smenu_by_position($position,$publier='o'){
        $tab=$this->dbh->query("select * from smenu where position_smenu='$position' AND visible_smenu='$publier'");
        return $tab->fetch();
    }
    
    public function this_smenu_menu_by_position($id_menu,$position,$publier='o'){
        $tab=$this->dbh->query("select * from smenu where id_menu='$id_menu' AND position_smenu='$position' AND visible_smenu='$publier'");
        return $tab->fetch();
    }    
    public function this_smenu_and_id_menu($id_smenu,$publier='o'){
        $tab=$this->dbh->query("select id_menu from smenu where id_smenu='$id_smenu' AND visible_smenu='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_smenu($id_smenu,$etat='n'){
      return $this->dbh->exec("update smenu set visible_smenu='$etat'  where id_smenu='$id_smenu'");
   } 
   
   public function liste_sous_menu_sur_acceuil($visible_accueil='o',$ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from smenu where service_accueil='$visible_accueil' and visible_smenu='$visible' and publier_smenu='$publier' $trie $limit");
    }
   
   public function supprimer_smenu($id_smenu,$etat='n'){
      return $this->dbh->exec("update smenu set visible_smenu='$etat'  where id_smenu='$id_smenu'");
   } 
}
$classSousmenu= new Smenu();
?>