<?php

function getSQLLiteFileLoc (){
	
	return "SQL/db.sqlite3";
	
}

function getConnectedPDOObject (){

	$db = new PDO('sqlite:'.getSQLLiteFileLoc ());
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	return $db;

}