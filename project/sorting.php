<?php 		
			require'add_db.php'; 

			$page  = isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = 3;
			$offset = $limit * ($page - 1);


			$query = $pdo->prepare('SELECT tasks.id, tasks.task_text, tasks.status, names.name, emails.email FROM tasks INNER JOIN names ON tasks.id_name = names.id INNER JOIN emails ON tasks.id_email = emails.id ORDER BY tasks.id DESC LIMIT ? OFFSET ?');
			$query->bindValue(1, $limit, PDO::PARAM_INT);
			$query->bindValue(2, $offset, PDO::PARAM_INT);
			$query->execute();



			


		?>