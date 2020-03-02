<?php session_start(); ?>
<!DOCTYPE html>
<html class="h-100" lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<title>Задачник</title>
</head>
<body class="h-100 d-flex flex-column">

<div>	</div>

	 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
	     <h5 class="my-0 mr-md-auto font-weight-normal">Планировщик</h5>
	<?php if(isset($_SESSION['user'])): ?>
		<div class="header-user">
			<h3 class="header-user-login"><?= $_SESSION['user_email']?></h3>
			<h3 class="header-user-login"><?= $_SESSION['user_name']?></h3>
			<img class="header-user-icon mr-2" src="img/user.svg" alt="">
			<a class="btn btn-danger" href="logout.php">выход</a>
		</div>
	<?php else: ?>

	    <div class="header-btn">
	     	<!-- Модальное окно Регистраций -->
			<button type="button" class="btn btn-secondary mr-3" data-toggle="modal" data-target="#exampleModa2">
 				 Зарегистрироваться
			</button>

			<div class="modal fade" id="exampleModa2">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<!-- Форма регистраций -->
			       <form action="registration.php" class="form-header" method="POST">
			       		<input type="text" name="name" placeholder="Введите имя" class="form-header-item form-control mb-2">
				  		<input type="email" name="email" placeholder="Введите email" class="form-header-item form-control mb-2">
				  		<input type="password" name="password" placeholder="Введите пароль" class=" form-header-item  form-control">
						<div class="modal-footer">
				       		<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
				        	<button type="submit" class="btn btn-primary">Отправить</button>
			      		</div>
				  	</form>
			      	<!-- /Форма регистраций -->
			      </div> 
			    </div>
			  </div>
			</div>
			 <!-- /Модальное окно Регистраций -->

			<!-- модальное окно входа -->
		 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">войти</button>
	
			<div class="modal fade" id="exampleModal">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Войти</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<!-- Вкладки -->
			         <ul class="nav nav-pills mb-4 d-flex justify-content-center" id="pills-tab" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Пользователь</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Админ</a>
						  </li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active  " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					  	<!-- форма входа пользователя -->
					  	<form action="enter.php" class="form-header" method="POST">
					  		<input type="email" name="email" placeholder="Введите email" class="form-header-item form-control mb-2">
					  		<input type="password" name="password" placeholder="Введите пароль" class=" form-header-item  form-control">
					  		<div class="modal-footer">
						    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
						        <button type="submit" class="btn btn-primary">отправить</button>
						    </div>

					  	</form>
					  	<!-- /форма входа пользователя -->
					  </div>
					  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					  	<!-- Форма входа Админа -->
					  	<form action="" class="form-header" method="POST">
					  		<input type="email" name="admin_email" placeholder="Введите email" class="form-header-item2 form-control mb-2">
					  		<input type="password" name="admin_password" placeholder="Введите пароль" class=" form-header-item2  form-control">

					  		<div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
						        <button type="button" class="btn btn-primary">отправить</button>
						    </div>

					  	</form>
					  	<!-- /Форма входа Админа -->
					  </div>
					</div>
			      	<!-- /Вкладки -->

			      </div>
			       
			    </div>
			  </div>
			</div>
			<!-- /модальное окно входа -->
	 	</div>
	 <?php endif;?>
	</div>
 
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-7">
				<form action="task_add.php" method="POST" class="d-flex">
					<input type="text" name="task" id="task" placeholder="Введите задачу" class="form-shadow form-control mr-3">

					<button type="submit" name="sendTask" class="form-shadow  btn btn-success">Создать</button>
				</form>
			</div>
		</div>	 	
	</div>
<?php if (isset($_SESSION['message'])):?>
	<div class="error_form">
		<div class="modal fade" id="myModal">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"><?= $_SESSION['message_title']?></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <?= $_SESSION['message']?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
<?php unset($_SESSION['message']); unset($_SESSION['message_title']); endif; ?>
 

	<div class="container">
		<div class="row">
			<div class="col d-flex justify-content-end">
				<form action="" class="sort" method="POST">
					<div class="sort-select">
						<select name="sort" id="">
							<option value="ascending">возрастанию</option>
							<option value="descending">убыванию</option>
						</select>

						<select name="sort_2" id="">
							<option value="name">Имя</option>
							<option value="email">Email</option>
							<option value="status">Статус</option>
						</select>
						<button type="submit" class="btn">Сортировать</button>
					</div>
					
					 
				</form>
			</div>
		</div>
		<!-- задача -->
		<?php  require'add_db.php'; 

			function search_name($id, $pdo){
				$select_id = "SELECT * FROM names WHERE id = :id_name";
				$query = $pdo->prepare($select_id);
				$query->execute(['id_name'=>$id]);
				$select_id_exit = $query->fetch(PDO::FETCH_ASSOC);

				return $select_id_exit['name'];
			}

			function search_email($id, $pdo){
				$select_id = "SELECT * FROM emails WHERE id = :id_email";
				$query = $pdo->prepare($select_id);
				$query->execute(['id_email'=>$id]);
				$select_id_exit = $query->fetch(PDO::FETCH_ASSOC);

				return $select_id_exit['email'];
			}	

			$Select = 'SELECT * FROM tasks ORDER BY id DESC';
			$query = $pdo->query($Select);
		 ?>

		 <?php while($row = $query->fetch(PDO::FETCH_OBJ)):?>
		<div class="row  align-items-center flex-column"> 
			<div class="col-6 ">
				<div class="task-item mb-3">
					<div class="task-item-header">
						<div class="task-item-header-text">
							<h4 class="task-item-name"> <?=search_name($row->id_name, $pdo)?> </h4>
							<div class="task-item-email"> <?=search_email($row->id_email, $pdo)?> </div>	
						</div>

						<form action="" method="POST">
							<input class="form-check" type="checkbox" name="task_check" value="task_succes">
						</form>
						
					</div>
				 
					<div class="task-item-text"> <?=$row->task_text?> </div>
					  	
					<div class="task-item-status task-item-status--not_completed">не выполнено</div>
				</div>
			</div>				
		</div>	 
	<?php endwhile; ?>
		<!-- /задача -->	
	</div>


	<footer class="footer mt-auto">
		<div class="footer-down">
			<nav aria-label="Page navigation example">
			  <ul class="pagination justify-content-end">
			    <li class="page-item disabled">
			      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Предыдущий</a>
			    </li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item"><a class="page-link" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item">
			      <a class="page-link" href="#">Следующий</a>
			    </li>
			  </ul>
			</nav>
 		</div>
 

		<div class="footer-block shadow-sm text-center   bg-white py-3 text-muted">
		    <span >Тестовое задание для BeeJee</span>
		</div>
	</footer>

	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>


</body>
</html>