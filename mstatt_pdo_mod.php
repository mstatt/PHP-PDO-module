<?php


function dbConn(){
	//---Connect to DB retrun PDO object
	try {
	$host = '';
	$dbname = '';
	$user = '';
	$passwd = '';
	$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
	 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	return $db;
	}
	catch(PDOException $e) {
// Add error logging
	    echo $e->getMessage();
	}
}

function SQLRowSelect($sql){
//---Returns a single row as array and closes connection
	try {
	$pdo = dbConn();
	$stmt = $pdo->query($sql);
	$data = $stmt->fetch();
	$pdo = null;
	return $data;
	}
	catch(PDOException $e) {
    // Add error logging
	    echo $e->getMessage();
	}
}

function SQLSingleValue($sql){
//Pass in SQL and Returns a single value and closes connection
	try {
	$pdo = dbConn();
	$stmt = $pdo->query($sql);
	$retVal = $stmt->fetchColumn();
	$pdo = null;
	return $retVal;
	}
	catch(PDOException $e) {
    // Add error logging
	    echo $e->getMessage();
	}
}


function CallSp($sp_name){
//Pass in sp name and execute with an array return value and close connection.
	try {
	$pdo = dbConn();
	$stmt = $pdo->prepare("CALL ".$sp_name);
	$stmt->execute();
	$data = $stmt->fetchAll();
	$pdo = null;
	return $data;
	}
	catch(PDOException $e) {
    // Add error logging
	    echo $e->getMessage();
	}
}

function CallExecSp($sp_name){
//Pass in sp name and execute, No return value just execute and close connection
	try {
	$pdo = dbConn();
	$stmt = $pdo->prepare("CALL ".$sp_name);
	$stmt->execute();
	$pdo = null;
	}
	catch(PDOException $e) {
    // Add error logging
	    echo $e->getMessage();
	}
}


?>
