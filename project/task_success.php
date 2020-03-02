<?php
    require'add_db.php';
    
    $task_check = filter_var(trim($_POST['task_check']));
  
    $sql =" UPDATE tasks SET status = 1 WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id'=>$task_check]);

   if($query->rowCount()>0){
       echo 'true';
   }
   else{
       echo 'false';
   }


?>