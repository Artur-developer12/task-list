<?php 
	session_start();
	require'add_db.php';

	if (isset($_SESSION['admin'])) {
		$task_text = strip_tags(filter_var(trim($_POST['task_text'])));
	    $task_id = strip_tags(filter_var(trim($_POST['task_id'])));
	  
	    $sql =" UPDATE tasks SET task_change = 'отредактировано администратором', task_text = :task_text WHERE id = :id";
	    $query = $pdo->prepare($sql);
	    $query->execute(['id'=>$task_id, 'task_text'=>$task_text]);
	}
	else{

		$_SESSION['message_title'] = 'ошибка ';
		$_SESSION['message'] = "у вас нет доступа";
     	
  
	}
   


 ?>	
