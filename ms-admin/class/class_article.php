
<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */
Class Article{
    
   private $dbh;
    
   public function __construct(){ 
        $this->dbh = new Database();
   }
     
    public function insertion_article($options=array()){
    $default=array("titre_article"=>"",
                  "libelle_article"=>"", 
                  "fichier_article"=>"",
                  "image_article"=>"",
                  "position_article"=>"", 
                  "contenu_article"=>"",
                  "publier_article"=>"",
                  "autres_article"=>"",
                  "id_smenu"=>"",
                  "visible_accueil"=>"",
                  "id_article"=>""
                    ); 
    $options = array_merge($default, $options);
    extract($options);
       	try
		{
                $sqlfichier='';
                if($fichier_article!='') $sqlfichier="fichier_article='$fichier_article',";
                 
			  $insert=$this->dbh->exec("insert into article set 
                  titre_article='$titre_article',
                  libelle_article='$libelle_article', 
                  contenu_article='$contenu_article',
                  $sqlfichier 
                  position_article='$position_article',
                  autres_article='$autres_article',
                  visible_accueil='$visible_accueil',
                  id_smenu='$id_smenu',
                  publier_article='$publier_article' "); 
       }
		catch(PDOException $e)
		{
			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
		}
		return intval($insert); 
   }
    
    public function modification_article($options=array()){
       $default=array("titre_article"=>"",
              "libelle_article"=>"", 
              "position_article"=>"", 
              "fichier_article"=>"",
              "contenu_article"=>"",
              "publier_article"=>"",
              "autres_article"=>"",
              "id_smenu"=>"",
              "visible_accueil"=>"",
              "id_article"=>""
              );
        $options = array_merge($default, $options);
        extract($options);
           	try
    		{
    		      $sqlfichier='';
		          if($fichier_article!='') $sqlfichier="fichier_article='$fichier_article',";
                   
    			  $pers_update=$this->dbh->exec("update article set 
                      titre_article='$titre_article',
                      libelle_article='$libelle_article',
                      contenu_article='$contenu_article',
                      $sqlfichier 
                      position_article='$position_article',
                      autres_article='$autres_article',
                      visible_accueil='$visible_accueil',
                      id_smenu='$id_smenu',
                      publier_article='$publier_article' where id_article='$id_article'"); 
                }
    		catch(PDOException $e)
    		{
    			echo 'PDO ' . $method . ' Error: ' . $e->getMessage();
    		}
		return intval($pers_update); 
   }
    
   public function liste_article($ligne=0,$trie='',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from article where visible_article='$publier' $trie $limit");
    }
    
    public function liste_article_by_smenu($id_smenu,$ligne=0,$trie='',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
            return $this->dbh->query("select * from article where id_smenu='$id_smenu' AND visible_article='$visible' $trie $limit");
    }
    
    public function liste_article_by_smenu_action_publier($id_smenu,$ligne=0,$trie='',$visible='o',$publier='o'){ 
        if($ligne) $limit="limit 0,$ligne";
            return $this->dbh->query("select * from article where id_smenu='$id_smenu' AND visible_article='$visible' AND publier_article='$publier' $trie $limit");
    }
  
    public function liste_article_by_smenu_intervalle($id_smenu,$deb=0,$fin=0,$trie='',$visible='o',$publier='o'){
        if($deb || $fin) $limit="limit $deb,$fin";
        return $this->dbh->query("select * from article where id_smenu='$id_smenu' AND visible_article='$visible' AND publier_article='$publier' $trie $limit");
    }
  
    public function this_article($id_article,$publier='o'){
        $tab=$this->dbh->query("select * from article where id_article='$id_article' AND visible_article='$publier'");
        return $tab->fetch();
    }
    
   public function update_publication_article($id_article,$etat='n'){
      return $this->dbh->exec("update article set visible_article='$etat'  where id_article='$id_article'");
   } 
   
   public function supprimer_article($id_article,$etat='n'){
      return $this->dbh->exec("update article set visible_article='$etat'  where id_article='$id_article'");
   } 
   
   public function liste_article_fixed_smenu($fixed='',$acceuil='',$ligne=0,$trie='',$publier='o',$visible='o'){ 
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from article , smenu  where smenu.libelle_smenu='$fixed' and  smenu.id_smenu=article.id_smenu and article.visible_accueil='$acceuil' and article.visible_article='$visible' and article.publier_article='$publier' $trie $limit");
    } 
    
    public function liste_article_sur_accueil($niveau='',$ligne=0,$trie='',$publier='o',$visible='o'){  
        if($ligne) $limit="limit 0,$ligne";
        return $this->dbh->query("select * from article where visible_accueil='$niveau' and  visible_article='$visible' and  publier_article='$publier' $trie $limit");
    } 
}
$classarticle= new Article();
?>