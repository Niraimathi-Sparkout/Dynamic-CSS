<?php
define("INT_DEV",'PRODUCTION');//DEVELOPMENT
if($_SERVER['REMOTE_ADDR']=='127.0.0.1')
{
	// Development config
	define("INT_DB_HOST",'localhost');
	define("INT_DB_USER",'root');
	define("INT_DB_PASS",'');
	define("INT_DB_NAME",'db_dynamic_css');
	define("DTYPE",1);	

}else{
	// Production config
	define("INT_DB_HOST",'localhost');
	define("INT_DB_USER",'root');
	define("INT_DB_PASS",'');
	define("INT_DB_NAME",'db_dynamic_css');

	if(INT_DEV=='PRODUCTION')
	{
		define("DTYPE",2);
	
	}else if(INT_DEV=='DEVELOPMENT')
	{
		define("DTYPE",3);
	}
}
?>