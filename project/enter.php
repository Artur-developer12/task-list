<?php 
	session_start();
	require 'add_db.php';

	$email = filter_var(trim($_POST['email']));  
	$password = filter_var(trim($_POST['password']));

	if (!empty($email) && !empty($password)) {

	 // поиск id emaila с помощью текста из формы ввода
	$select_id_email = "SELECT id FROM emails WHERE email = :email";
	$query = $pdo->prepare($select_id_email);
	$query->execute(['email'=>$email]);
	$email_select = $query->fetch(PDO::FETCH_ASSOC);

	 // поиск совпадений в таблицу users используя id_email и password
	$id_email = $email_select['id'];
	$check_user = "SELECT * FROM users WHERE id_email = :id_email AND password = :password";
	$query = $pdo->prepare($check_user);
	$query->execute(['id_email'=>$id_email, 'password'=>$password]);
	$user_name = $query->fetch(PDO::FETCH_ASSOC);
	$user_success = $query->rowCount();
 
 
	 // поиск имени по id  для добавление в сессию
	$id_name = $user_name['id_name'];
	$search_name = "SELECT name FROM names WHERE id = :id_name";
	$query = $pdo->prepare($search_name);
	$query->execute(['id_name'=>$id_name]);
	$user_name = $query->fetch(PDO::FETCH_ASSOC);

	 

 

	if ($user_success == 1) {
		$_SESSION['user'] = 1;
		$_SESSION['user_name'] = $user_name['name'];
		$_SESSION['user_email'] = "$email";
		header('Location: index.php');

	}
	else{
		$_SESSION['message'] = 'неправильный логин или пароль';
		$_SESSION['message_title'] = 'вход';
		header('Location: index.php');


	}

}
	 
 

 ?>