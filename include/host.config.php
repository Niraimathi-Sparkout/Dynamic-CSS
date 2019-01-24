<?php
include('db.config.php');

if(DTYPE==1)
{
	define("BASEURL",'http://localhost/Nirai/Dynamic_Css/');	
	
}else if(DTYPE==2 || DTYPE==3)
{
	define("BASEURL",'http://localhost/Nirai/Dynamic_Css/');	
}

	/** General **/ 
	if(DTYPE==2 || DTYPE==3)
	{ 
		define("SITE_TITLE",'Self Parking Admin');
		define("END",'BACKEND'); 
		define("DOMAIN",'');
		define("SITE_TITLE_MAIL",'Self Parking Admin');  
		define("CUSTOMER_AUTO_MAIL_FROM",'');
		define("MAIL_CC", '');		
		define("MAIL_BCC", '');		
        }else{ 
		define("SITE_TITLE",'Self Parking Admin'); 
		define("END",'BACKEND');
		define("DOMAIN",'');
		define("SITE_TITLE_MAIL",'Self Parking Admin');   
		define("CUSTOMER_AUTO_MAIL_FROM",'');
		define("MAIL_CC", '');		
		define("MAIL_BCC", '');
	}
	
?>