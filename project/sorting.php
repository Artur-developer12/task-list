<?php 		
			require'add_db.php'; 

			 

			$url = $_SERVER['REQUEST_URI'];
			$parts = parse_url($url); 

			parse_str($parts['query'], $get); 	

			 


			$sort = $get['sort']; 
			$ascend = $get['ascend']; 


			if (empty($sort)) {
				$sort = 'tasks.id';

			}
			if (empty($ascend)) {
				$ascend = 'DESC';
				
			}

			$_GET['sort'] = $sort;
			$_GET['ascend'] = $ascend;


			function get_param($sort, $ascend, $i){
				$i++; 
				if (empty($sort) && empty($ascend)) {
		 
				}else{
					return  "&page=$i&sort=$sort&ascend=$ascend";
				}

			}






			$page  = isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = 3;
			$offset = $limit * ($page - 1);


			$sql_1 = "SELECT tasks.id, tasks.task_text, tasks.status, tasks.task_change, names.name, emails.email FROM tasks INNER JOIN names ON tasks.id_name = names.id INNER JOIN emails ON tasks.id_email = emails.id ORDER BY  $sort $ascend LIMIT :lim OFFSET :off";

 			
		 


			$sql = $sql_1;

			$query = $pdo->prepare($sql);
			$query->bindValue(':lim', $limit, PDO::PARAM_INT);
			$query->bindValue(':off', $offset, PDO::PARAM_INT);
			$query->execute();



 

		?>