<?php 
    error_reporting(0);
    ob_start();
	session_start();
    $dbserver="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="db_dinpenaker";
    ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbserver, $dbusername, $dbpassword)) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
    mysqli_select_db($GLOBALS["___mysqli_ston"], $dbname) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
	//include('fungsi.php');
	
	//Koneksi mysqli
	$con = mysqli_connect("localhost","root","","db_dinpenaker");
	// Database connection information
	$gaSql['user']     = 'root';
	$gaSql['password'] = '';   
	$gaSql['db']       = 'db_dinpenaker';  //Database
	$gaSql['server']   = 'localhost';   
	$gaSql['port']     = 3306; // 3306 is the default mysql port

	$db = new mysqli($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'], $gaSql['port']);
?>
