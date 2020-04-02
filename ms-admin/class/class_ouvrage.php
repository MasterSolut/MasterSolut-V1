
<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright 1er Septembre 2016
 */
Class Ouvrages{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_ouvrages($options=array()){
        $default=array("titre_ouvrages"=>"",
                  "auteur_ouvrages"=>"", 
                  "editeur_ouvrages"=>"",
                  "nbrepages_ouvrages"=>"",
                  "annee_ouvrages"=>"",   
                  "fichier_ouvrages"=>"",  
                  "id_document"=>"",  
                  "id_ouvrages"=>"" ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
                $sqlfichier='';
                if($fichier_ouvrages!='') $sqlfichier="fichier_ouvrages='$fichier_ouvrages',"; 
			  $insert=$this->dbh->exec("insert into ouvrages set 
                  titre_ouvrages='$titre_ouvrages',
                  auteur_ouvrages='$auteur_ouvrages', 
                  editeur_ouvrages='$editeur_ouvrages',
                  $sqlfichier 
                  nbrepages_ouvrages='$nbrepages_ouvrages',
                  annee_ouvrages='$annee_ouvrages', 
                  id_document='$id_document' "); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_ouvrages($options=array()){
            $default=array("titre_ouvrages"=>"",
                  "auteur_ouvrages"=>"", 
                  "editeur_ouvrages"=>"",
                  "nbrepages_ouvrages"=>"",
                  "annee_ouvrages"=>"",   
                  "fichier_ouvrages"=>"",  
                  "id_document"=>"",  
                  "id_ouvrages"=>"");
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    		      $sqlfichier='';
		          if($fichier_ouvrages!='') $sqlfichier="fichier_ouvrages='$fichier_ouvrages',";
                  
                    $sqlimage='';
                    if($image_ouvrages!='') $sqlimage="image_ouvrages='$image_ouvrages',";
    			  $pers_update=$this->dbh->exec("update ouvrages set 
                        titre_ouvrages='$titre_ouvrages',
                        auteur_ouvrages='$auteur_ouvrages', 
                        editeur_ouvrages='$editeur_ouvrages',
                        $sqlfichier 
                        nbrepages_ouvrages='$nbrepages_ouvrages',
                        annee_ouvrages='$annee_ouvrages', 
                        id_document='$id_document' where id_ouvrages='$id_ouvrages'"); 
                }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($pers_update); 
   }
    
   public function liste_ouvrages($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from ouvrages where visible_ouvrages='$publier' $trie $limit");
    }
    
    public function liste_ouvrages_by_smenu($id_smenu,$ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
            return $this->dbh->query("select * from ouvrages where id_smenu='$id_smenu' AND visible_ouvrages='$visible' $trie $limit");
    }
    
    public function liste_ouvrages_by_smenu_action_publier($id_document,$ligne=0,$trie='',$visible='o',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
            return $this->dbh->query("select * from ouvrages where id_smenu='$id_document' AND visible_ouvrages='$visible' AND publier_ouvrages='$publier' $trie $limit");
    }
   
    public function this_ouvrages($id_ouvrages,$publier='o'){
        $tab=$this->dbh->query("select * from ouvrages where id_ouvrages='$id_ouvrages' AND visible_ouvrages='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_ouvrages($id_ouvrages,$etat='n'){
      return $this->dbh->exec("update ouvrages set visible_ouvrages='$etat'  where id_ouvrages='$id_ouvrages'");
   } 
   
   public function supprimer_ouvrages($id_ouvrages,$etat='n'){
      return $this->dbh->exec("update ouvrages set visible_ouvrages='$etat'  where id_ouvrages='$id_ouvrages'");
   } 
   
   public function liste_ouvrages_fixed_smenu($fixed='',$acceuil='',$ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from ouvrages , smenu  where smenu.libelle_smenu='$fixed' and  smenu.id_smenu=ouvrages.id_smenu and ouvrages.visible_accueil='$acceuil' and ouvrages.visible_ouvrages='$visible' and ouvrages.publier_ouvrages='$publier' $trie $limit");
    } 
    
    public function liste_ouvrages_sur_accueil($niveau='',$ligne=0,$trie='',$publier='o',$visible='o'){  
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from ouvrages where visible_accueil='$niveau' and  visible_ouvrages='$visible' and  publier_ouvrages='$publier' $trie $limit");
    } 
}
$classouvrages= new Ouvrages();
?>