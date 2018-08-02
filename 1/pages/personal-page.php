<?php
	require "../libs/db.php";

	$data = $_POST;
	if( isset($data['add-task']))
	{
		$task = R::dispense('task');
		$task->task_title = $data['task-title'];
		$task->task_description = $data['task-field'];
		$task->task_user = $_SESSION['logged_user']->id;
		R::store($task);
		header("Location:".$_SERVER['PHP_SELF']);
	}

	$id = $_SESSION['logged_user']->id;
	$showtask = R::find('task', 'task_user LIKE ?', [$id]);
	function titleTask($userTask){
		foreach ($userTask as $key => $value) {
			$arr = $value['task_title'];
			$description = $value['task_description'];
			// var_dump($description);
			$number = rand(0, 1000);
			$selNum = $number;
			echo 
			"<li>
				<p uk-toggle='target: #offcanvas-push$selNum' style='cursor: pointer;'> $arr <p >
				<div id='offcanvas-push$selNum' uk-offcanvas='flip: true; overlay: true'>
					<div class='uk-offcanvas-bar'>
						 <button class='uk-offcanvas-close' type='button' uk-close></button>	
							<h2>$arr</h2>
							<textarea class='uk-textarea'>$description</textarea>
						<p class='uk-text-right'>
						 <button class='uk-button uk-button-primary' type='butto'>Збереги</button>
						</p>
					</div>
				</div>
			</li>";
		}
		
	}

	
?>

<!-- <li>
							<input class="uk-checkbox" type="checkbox">
							<a href="#modal-container" uk-toggle> List item 1</a>
							<div id="modal-container"  uk-modal>
							    <div class="uk-modal-dialog uk-modal-body">
							        <button class="uk-modal-close-default" type="button" uk-close></button>
							        <h2 class="uk-modal-title">Задача трааатата</h2>
							        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							         <p class="uk-text-right">
							            <button class="uk-button uk-button-default uk-modal-close" type="button">Закрити</button>
							            <button class="uk-button uk-button-primary" type="button">Збереги</button>
							        </p>
							    </div>
							</div>
							<span uk-icon="icon: more-vertical" class="uk-align-right more-options"></span>
							<div uk-drop="mode: click; pos: bottom-left">
						       <div class="uk-card uk-card-default uk-card-body uk-padding-small uk-width-auto uk-align-right">
							       	<ul class="uk-list uk-padding-remove">
							       		<li><button class="uk-label uk-button">просто кнопка</button></li>
							       		<li><button class="uk-label uk-label-success uk-button">Виконано</button></li>
							       		<li><button class="uk-label uk-label-warning uk-button">Видалити</button></li>
							       	</ul>
						       </div>
						    </div>
						</li> -->


<!DOCTYPE html>
<html>
<head>
	<title>Персональна сторінка</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/app.css">
	<link rel="icon" href="../favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>
	<script src="../js/vendor.js"></script>
	<script src="../js/app.js" ></script>
</head>
<body>
	<?php if(isset($_SESSION['logged_user'])) : ?>
		<p>id_user-<?php echo $_SESSION['logged_user']->id; ?></p>
		
	<div class="uk-container uk-container-large uk-offcanvas-content">
		<div class="uk-text-right">
			<a href="../login/logout.php" class="uk-button uk-button-small uk-button-default">Вихід<span uk-icon="icon: sign-out"></span></a>
		</div>
		<hr>	
		<div uk-grid>
			<div class="uk-width-1-4@m ">
				<div class="user-block">
					<h2 class="uk-text-center">Рог та копита</h2>
				</div>
				<div class="task-group">
					<h3>Список задач по групам</h3>
					 <ul class="uk-tab-left task-group__list" uk-tab>
			            <li class="task-group__name uk-active"><span class=" uk-margin-small-left task-group__item" uk-icon="icon: table"></span>Група 1</li>
			            <li class="task-group__name"><span class=" uk-margin-small-left task-group__item" uk-icon="icon: table"></span>Група 2</li>
			            <li class="task-group__name"><span class=" uk-margin-small-left task-group__item" uk-icon="icon: table"></span>Група 3</li>
			        </ul>
			       <div class="uk-text-center task-group__add-btn">
			       		<span uk-icon="icon: plus-circle; ratio: 2"></span>
			       </div>
				</div>
			</div>	
			<div class="uk-width-expand@m uk-position-relative">
				<div>
					<h2>Список задач:</h2>
					<ul class="uk-subnav uk-subnav-pill" uk-switcher="connect: .switcher-container">
					    <li><a href="#">Поточні завдання</a></li>
					    <li><a href="#">На тесті</a></li>
					    <li><a href="#">Виконано</a></li>
					</ul>
				</div>
				<div class="uk-position-large uk-position-bottom-right add-task">
				 	<img src="../img/plus-icon.png" class="add-task__btn " alt="Додати задачу" title="Додати задачу" uk-toggle="target: #add-task-modal">
				 	<div id="add-task-modal" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body">
					    	<form class="uk-form-stacked" method="POST">
					    		<h2 class="uk-modal-title">Створити задачу</h2>
						        <div class="uk-margin">
							        <label class="uk-form-label" for="form-horizontal-text">Назва</label>
							        <div class="uk-form-controls">
							            <input class="uk-input" id="form-horizontal-text" type="text" name="task-title" required>
							        </div>
							    </div>
							    <div class="uk-margin">
							        <label class="uk-form-label" for="form-horizontal-text">Детальніше</label>
							       <div class="uk-margin">
							            <textarea class="uk-textarea" rows="5" name="task-field" required></textarea>
							        </div>
							    </div>
						        <p class="uk-text-right">
						            <button class="uk-button uk-button-default uk-modal-close" type="button">Закрити</button>
						            <input type="submit" name="add-task" class="uk-button uk-button-primary" value="Зберегти">
						        </p>
					    	</form>
					        
					    </div>
					</div>
				</div>
				<div class=" uk-switcher switcher-container" >
					<ul class="uk-list uk-list-striped task-list " uk-sortable="group: sortable-group">
					<?php echo titleTask($showtask); ?>
						<!-- <li>
							<input class="uk-checkbox" type="checkbox">
							<a href="#modal-container" uk-toggle> List item 1</a>
							<div id="modal-container"  uk-modal>
							    <div class="uk-modal-dialog uk-modal-body">
							        <button class="uk-modal-close-default" type="button" uk-close></button>
							        <h2 class="uk-modal-title">Задача трааатата</h2>
							        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							         <p class="uk-text-right">
							            <button class="uk-button uk-button-default uk-modal-close" type="button">Закрити</button>
							            <button class="uk-button uk-button-primary" type="button">Збереги</button>
							        </p>
							    </div>
							</div>
							<span uk-icon="icon: more-vertical" class="uk-align-right more-options"></span>
							<div uk-drop="mode: click; pos: bottom-left">
						       <div class="uk-card uk-card-default uk-card-body uk-padding-small uk-width-auto uk-align-right">
							       	<ul class="uk-list uk-padding-remove">
							       		<li><button class="uk-label uk-button">просто кнопка</button></li>
							       		<li><button class="uk-label uk-label-success uk-button">Виконано</button></li>
							       		<li><button class="uk-label uk-label-warning uk-button">Видалити</button></li>
							       	</ul>
						       </div>
						    </div>
						</li>
					    <li>
					    	<input class="uk-checkbox" type="checkbox">
					    	<a href="#modal-container" uk-toggle> List item 2</a>
					    	<span uk-icon="icon: more-vertical" class="uk-align-right more-options"></span>
					    	<div uk-drop="mode: click">
						       <div class="uk-card uk-card-default uk-card-body uk-width-auto uk-padding-small uk-width-auto uk-align-right">
							       	<ul class="uk-list uk-padding-remove">
							       		<li><button class="uk-label uk-button">просто кнопка</button></li>
							       		<li><button class="uk-label uk-label-success uk-button">Виконано</button></li>
							       		<li><button class="uk-label uk-label-warning uk-button">Видалити</button></li>
							       	</ul>
						       </div>
						    </div>
					    </li>
					    <li>
					    	<input class="uk-checkbox" type="checkbox">
					    	<a href="#modal-container" uk-toggle> List item 3</a>
					    	<span uk-icon="icon: more-vertical" class="uk-align-right more-options"></span>
					    	<div uk-drop="mode: click">
						       <div class="uk-card uk-card-default uk-card-body uk-width-auto uk-padding-small uk-width-auto uk-align-right">
							       	<ul class="uk-list uk-padding-remove">
							       		<li><button class="uk-label uk-button">просто кнопка</button></li>
							       		<li><button class="uk-label uk-label-success uk-button">Виконано</button></li>
							       		<li><button class="uk-label uk-label-warning uk-button">Видалити</button></li>
							       	</ul>
						       </div>
						    </div>
					    </li>
					    <li>
					    	<input class="uk-checkbox" type="checkbox">
					    	<a href="#modal-container" uk-toggle> List item 1</a>
					    	<span uk-icon="icon: more-vertical" class="uk-align-right more-options"></span>
					    	<div uk-drop="mode: click">
						       <div class="uk-card uk-card-default uk-card-body uk-width-auto uk-padding-small uk-width-auto uk-align-right">
							       	<ul class="uk-list uk-padding-remove">
							       		<li><button class="uk-label uk-button">просто кнопка</button></li>
							       		<li><button class="uk-label uk-label-success uk-button">Виконано</button></li>
							       		<li><button class="uk-label uk-label-warning uk-button">Видалити</button></li>
							       	</ul>
						       </div>
						    </div>
					    </li>
					    <li>
					    	<input class="uk-checkbox" type="checkbox">
					    	<a href="#modal-container" uk-toggle> List item 2</a>
					    	<span uk-icon="icon: more-vertical" class="uk-align-right more-options"></span>
					    	<div uk-drop="mode: click">
						       <div class="uk-card uk-card-default uk-card-body uk-width-auto uk-padding-small uk-width-auto uk-align-right">
							       	<ul class="uk-list uk-padding-remove">
							       		<li><button class="uk-label uk-button">просто кнопка</button></li>
							       		<li><button class="uk-label uk-label-success uk-button">Виконано</button></li>
							       		<li><button class="uk-label uk-label-warning uk-button">Видалити</button></li>
							       	</ul>
						       </div>
						    </div>
					    </li>
					    <li>
					    	<input class="uk-checkbox" type="checkbox">
					    	<a href="#modal-container" uk-toggle> List item 3</a>
					    	<span uk-icon="icon: more-vertical" class="uk-align-right more-options"></span>
					    	<div uk-drop="mode: click">
						       <div class="uk-card uk-card-default uk-card-body uk-width-auto uk-padding-small uk-width-auto uk-align-right">
							       	<ul class="uk-list uk-padding-remove">
							       		<li><button class="uk-label uk-button">просто кнопка</button></li>
							       		<li><button class="uk-label uk-label-success uk-button">Виконано</button></li>
							       		<li><button class="uk-label uk-label-warning uk-button">Видалити</button></li>
							       	</ul>
						       </div>
						    </div>
					    </li>
					    <li>
					    	<input class="uk-checkbox" type="checkbox">
					    	<a href="#modal-container" uk-toggle> List item 1</a>
					    	<span uk-icon="icon: more-vertical" class="uk-align-right more-options"></span>
					    	<div uk-drop="mode: click">
						       <div class="uk-card uk-card-default uk-card-body uk-width-auto uk-padding-small uk-width-auto uk-align-right">
							       	<ul class="uk-list uk-padding-remove">
							       		<li><button class="uk-label uk-button">просто кнопка</button></li>
							       		<li><button class="uk-label uk-label-success uk-button">Виконано</button></li>
							       		<li><button class="uk-label uk-label-warning uk-button">Видалити</button></li>
							       	</ul>
						       </div>
						    </div>
					    </li> -->
					</ul>
					<ul class="uk-list uk-list-striped task-list task-done--list">
						<li><input class="uk-checkbox" type="checkbox"> List item 7</li>
					    <li><input class="uk-checkbox" type="checkbox"> List item 8</li>
					    <li><input class="uk-checkbox" type="checkbox"> List item 9</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
		<h1>fuckoff</h1>
	<?php endif; ?>
</body>
</html>