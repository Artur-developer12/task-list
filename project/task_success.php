<?php
    session_start();
    require'add_db.php';
    if (isset($_SESSION['admin'])){
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

     }else{
        $_SESSION['message_title'] = 'ошибка ';
        $_SESSION['message'] = "у вас нет доступа";
     }


?>