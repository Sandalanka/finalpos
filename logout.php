<?php 
   session_start();
   	unset($_SESSION['userId']);
	unset($user_id);
	unset($_SESSION['validate']);
	unset($validate);
	session_destroy(); 
	header('location: http://localhost/finalpos/index.php');

// remove all session variables


// destroy the session 




?>