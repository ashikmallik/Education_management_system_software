<?php
    ob_start();
	include('../../../connection.php');
	
	
	session_start();
			
	$userid=$_SESSION['userid'];
	if($userid== "")
	{
	header("location:../../index.php");
	}


?>