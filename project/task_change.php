<?php 
	require'add_db.php';
    
    $task_text = filter_var(trim($_POST['task_text']));
    $task_id = filter_var(trim($_POST['task_id']));

	  var_dump( $task_text);
	  var_dump( $task_id);
 
  
    $sql =" UPDATE tasks SET task_text = :task_text WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id'=>$task_id, 'task_text'=>$task_text]);

   


 ?>