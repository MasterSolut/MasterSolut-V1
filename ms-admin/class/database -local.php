<?php
/**
 * @author Marc
 * @copyright Février 2016
 */
class Database extends pdo {

    private $dbtype; 
    private $host;     
    private $user;
    private $pass; 
    private $database; 

    public function __construct(){ 
        $this->dbtype ='mysql'; 
        $this->host = 'localhost'; 
        $this->user = 'root'; 
        $this->pass = 'admin'; 
        $this->database = 'arlene-o_db'; 
        $dns = $this->dbtype.':dbname='.$this->database.";host=".$this->host; 
        parent::__construct( $dns, $this->user, $this->pass ); 
        mysql_query("SET NAMES 'utf8'");
    }     
}
$classdatabase=new Database();
?>





<?php
/**
 * @author Marc
 * @copyright Février 2016
 */
class Database extends pdo {

    private $dbtype; 
    private $host;     
    private $user;
    private $pass; 
    private $database; 

    public function __construct(){ 
        $this->dbtype ='mysql'; 
        $this->host = 'localhost'; 
        $this->user = 'lerudit'; 
        $this->pass = 'baromix001'; 
        $this->database = 'lerudit_arlenebd'; 
        $dns = $this->dbtype.':dbname='.$this->database.";host=".$this->host; 
        parent::__construct( $dns, $this->user, $this->pass ); 
        mysql_query("SET NAMES 'utf8'");
    }     
}
$classdatabase=new Database();
?> 