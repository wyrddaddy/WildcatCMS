<?php



class Model {
	function Model(){
		//$this->dbConnect();		
	}
	
	function dbConnect(){
		mysql_connect(DB_LOCATION, DB_USRNAME, DB_PASSWORD) or die(mysql_error());
		mysql_select_db(DB_NAME) or die(mysql_error()); 
	}	
}