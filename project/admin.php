<?php 
	session_start();
	require 'add_db.php';

	$name = strip_tags(filter_var(trim($_POST['admin_name'])));  
	$password = strip_tags(filter_var(trim($_POST['admin_password'])));


	if(!empty($name) && !empty($password)){

		if ($name == 'admin' && $password == 123) {
			$_SESSION['admin'] = 1;
			$_SESSION['user'] = 1;
  			$_SESSION['user_name'] = $name;

		header('Location: index.php');
  			 

		}else{
			$_SESSION['message_title'] = 'ошибка ';
			$_SESSION['message'] = "неправильные реквезиты доступа";
			header('Location: index.php');

		}

	}else{
		$_SESSION['message'] = 'Заполните все поля';
		$_SESSION['message_title'] = 'Ошибка';
		header('Location: index.php');  
	}


 ?>