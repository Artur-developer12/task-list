<?php 
	 session_start();
	 unset($_SESSION['admin']);
	 unset($_SESSION['user']);
	 unset($_SESSION['user_name']);
	 unset($_SESSION['user_email']);
	 header('Location: index.php');




 ?>