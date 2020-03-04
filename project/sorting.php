<?php 		
			require'add_db.php'; 

			$name = filter_var(trim($_POST['name'])); 
			$email = filter_var(trim($_POST['email'])); 
			$page  = isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = 3;
			$offset = $limit * ($page - 1);

			$sort_column = "tasks.id";

			$sql_1 = "SELECT tasks.id, tasks.task_text, tasks.status, names.name, emails.email FROM tasks INNER JOIN names ON tasks.id_name = names.id INNER JOIN emails ON tasks.id_email = emails.id ORDER BY tasks.id DESC LIMIT :lim OFFSET :off";

 			
		 


			$sql = $sql_1;

			$query = $pdo->prepare($sql);
			$query->bindValue(':lim', $limit, PDO::PARAM_INT);
			$query->bindValue(':off', $offset, PDO::PARAM_INT);
			$query->execute();



 

		?>