<?php 
		
	
		define("DBSERVER", "mysql1404.ixwebhosting.com");
		define("DBPASSWORD", "Captureit1");
		define("DBUSERID", "C364154_caproot");
		define("DBNAME", "C364154_captureit_newdb");
		
		
		mysql_connect(DBSERVER,DBUSERID,DBPASSWORD);
		mysql_select_db(DBNAME) or die(mysql_error()); 
?>
