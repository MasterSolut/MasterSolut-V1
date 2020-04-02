<?php
$display=$_GET['page']; 
	/*switch($display)
	{ 
       case $display:
			require($display+".php");
		break;
        
        case"services":
			require("services.php");
		break; 
        
        case"actualites":
			require("actualites.php");
		break; 
        
        case"agence":
			require("agence.php");
		break;
        case"events":
			require("events.php");
		break;
        case"formules":
			require("formules.php");
		break;
        case"contact":
			require("contact.php");
		break;
        
		default:
			require("accueil.php");
		break;
	}*/
    
    if($display){
        require($display.".php");
    }else{
        require("accueil.php");
    }
?> 
&nbsp;