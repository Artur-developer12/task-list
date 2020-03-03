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
		<?php  require'sorting.php'; ?>

		 <?php while($row = $query->fetch(PDO::FETCH_OBJ)):?>
		<div class="row  align-items-center flex-column"> 
			<div class="col-6 ">
				<div class="task-item mb-3">
					<div class="task-item-header">
						<div class="task-item-header-text">
							<h4 class="task-item-name"> <?=$row->name ?> </h4>
							<div class="task-item-email"> <?=$row->email?> </div>	
						</div>

						 <input class="form-check" id="checkbox_task" type="checkbox" name="task_check" value="<?=$row->id?>"  <?php if($row->status == 1) echo 'checked'; else echo ''; ?>>
					 				 				 
						
					</div>

				 	<a href="#" id="task_change" class="tast-item-link">изменить</a>
					<div class="task-item-text" id="task-text-show"> <?=$row->task_text?> </div>

					<form action="task_change.php" method="POST" id="task_text" class="d-none task-item-from">
						<textarea name="task_text" class="task-text-change" id="textarea_task"  data-name="<?=$row->id?>" > <?=$row->task_text?> </textarea>
						<button id="task-item-submit" class="task-item-submit" type="submit">сохранить</button>
					</form>

					<?php if($row->status ==1):	?>
						<div id="task_status" class="task-item-status task-item-status--completed">выполнено</div>
					<?php else: ?>
						<div id="task_status" class="task-item-status task-item-status--not_completed">не выполнено</div>
					 <?php endif;?>



				</div>
			</div>				
		</div>	 
	<?php endwhile; ?>
		<!-- /задача -->	
	</div>
	<?php  
	
			$query = $pdo->query("SELECT COUNT(*) as id FROM tasks");
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$length = $query->fetch();
			$members = $length['id'];


			$list = ceil($members / $limit);

	 
	?>
 
	<footer class="footer mt-auto">
		<div class="footer-down">
			<nav aria-label="Page navigation example">
			  <ul class="pagination justify-content-end">
				  <?php for ($i=0; $i < $list; $i++):?>
				<li class="page-item"><a class="page-link" href="/index.php?page=<?=$i + 1?>"> <?=$i + 1?> </a></li>
				  <?php endfor; ?>
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