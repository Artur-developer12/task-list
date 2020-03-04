<?php 
	session_start();
	require'add_db.php';

	$name = strip_tags(filter_var(trim($_POST['name']))); 
	$email = strip_tags(filter_var(trim($_POST['email'])));  
	$password = strip_tags(filter_var(trim($_POST['password'])));

	function record_search($email, $pdo){
		$sql = "SELECT EXISTS(SELECT email FROM emails WHERE email =:email LIMIT 1)";
		$query = $pdo->prepare($sql);
		$query->execute(['email'=>$email]);
		$result = $query->fetch(PDO::PARAM_INT);
		
		if ($result['0'] == 1) {
			return true;
		}
		else{
			return false;
		}
	}

	  

	if (!empty($name) && !empty($email) && !empty($password)) {


		if (record_search($email, $pdo)) {
			$_SESSION['message_title'] = 'Ошибка';
			$_SESSION['message'] = "Такой пользователь уже есть";
			header('Location: index.php');
			die();
		}
		else{

		// Добавление имени
		$sql =" INSERT INTO names(name) VALUES(:name);";
		$query = $pdo->prepare($sql);
		$query->execute(['name'=>$name]);
		$last_id_name = $pdo->lastInsertId();

		// Добавление email
		$sql =" INSERT INTO emails(email) VALUES(:email);";
		$query = $pdo->prepare($sql);
		$query->execute(['email'=>$email]);
		$last_id_email = $pdo->lastInsertId();


		// Добавление id имени, id emailа  и пароля в таблицу uzers
		$sql =" INSERT INTO users(id_name, id_email, password) VALUES(:id_name, :id_email, :password);";
		$query = $pdo->prepare($sql);
		$query->execute(['id_name'=>$last_id_name, 'id_email'=>$last_id_email, 'password'=>$password]);

		$_SESSION['message_title'] = 'регистрация';
		$_SESSION['message'] = "Регистрация прошла успешно";
 
		$_SESSION['user'] = 1;
		$_SESSION['user_name'] = $name;
		$_SESSION['user_email'] = $email;

		header('Location: index.php');
 

		}


	 

	}else {
		$_SESSION['message_title'] = 'Ошибка';
		$_SESSION['message'] = "Заполните все поля";
		header('Location: index.php');
		
	}

	
	 

 ?>