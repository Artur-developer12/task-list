<?php 
	session_start();
	if (!isset($_SESSION['user'])) {
		$_SESSION['message_title'] = 'ошибка авторизаций';
		$_SESSION['message'] = "водите чтобы написать задачу";
		header('Location: index.php');
	}

	require'add_db.php';

	$task_form = filter_var(trim($_POST['task']));

	$id_name = $_SESSION['user_name'];
	$id_email = $_SESSION['user_email']; 

	// пойск id email  
	$select_id_email = "SELECT id FROM emails WHERE email = :id_email";
	$query = $pdo->prepare($select_id_email);
	$query->execute(['id_email'=>$id_email]);
	$email_select = $query->fetch(PDO::FETCH_ASSOC);
	$id_email = $email_select['id'];

	// пойск id имени 
	$select_id_name = "SELECT id FROM names WHERE name = :id_name";
	$query = $pdo->prepare($select_id_name);
	$query->execute(['id_name'=>$id_name]);
	$name_select = $query->fetch(PDO::FETCH_ASSOC);
	$id_name = $name_select['id'];


	//  Добавление id имени и id email в таблицу tasks
	$insert ="INSERT INTO tasks(id_name, id_email, task_text) VALUES(:id_name, :id_email, :task_text)"; 
	$query = $pdo->prepare($insert);
	$query->execute(['id_name'=>$id_name, 'id_email'=>$id_email, 'task_text'=>$task_form]);

	header('Location: index.php');

 



 ?>