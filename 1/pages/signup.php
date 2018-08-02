<?php
	require "../libs/db.php";

	$data = $_POST;
	if( isset($data['signup']))
	{
		$errors = array();
		if (trim($data['email']) == '' ) 
		{
			$errors[] = 'Введіть email';
		}
		if ($data['password'] == '')
		 {
			$errors[] = 'Введіть пароль';
		}
		if ($data['password_2'] != $data['password'])
		 {
			$errors[] = 'Повторний пароль введено не вірно';
		}
		// if (R::count('users', 'email = ?', array($data['email']))
		// 	> 0) 
		// {
		// 	$errors[] = 'Користувач з таким email  вже зареєстровано';
		// }
		if (empty($errors)) 
		{
			$user = R::dispense('users');
			$user->email = $data['email'];
			$user->password = md5($data['password']);
			R::store($user);
			header("Location: http://dist/pages/personal-page.php");
			echo "<div>Дякуємо за реєстрацію</div>";
		}
		$err = array_shift($errors);
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Реєстрація</title>
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
<body class="uk-position-absolute uk-height-1-1 uk-width-1-1">
	<div class="uk-flex uk-flex-center uk-text-center uk-flex-middle uk-height-1-1">
		<div class="uk-width-medium">
			<img src="../img/logo-island.png">
			<?php if (R::count('users', 'email = ?', array($data['email']))> 0): ?>
				<h5 class="uk-padding-small uk-text-danger">Користувач з таким email  вже зареєстровано</h5>
			<?php elseif (count($err) > 0): ?>
				<h5 class="uk-margin-small uk-text-danger"><?php echo $err; ?></h5>	
			<?php endif; ?>
			<form class="uk-margin-small" action="/pages/signup.php" method="POST">
				<div class="uk-margin">
					<div class="uk-inline ">
						<span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: user"></span>
						<input class="uk-input uk-form-small uk-border-rounded" type="email" name="email" placeholder="email"  value="<?php echo @$data['email'];?>">
					</div>
				</div>
				<div class="uk-margin">
					<div class="uk-inline ">
						<span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
						<input class="uk-input uk-form-small  uk-border-rounded" type="password" name="password" placeholder="пароль" value="<?php echo @$data['password'];?>">
					</div>
				</div>
				<div class="uk-margin">
					<div class="uk-inline ">
						<span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
						<input class="uk-input uk-form-small  uk-border-rounded" type="password" name="password_2" placeholder="пароль" value="<?php echo @$data['password_2'];?>">
					</div>
				</div>
				<input class="uk-button uk-button-primary uk-button-small uk-width-auto uk-border-rounded" type="submit" name="signup" value="Зареєструватися">
			</form>
		</div>
	</div>
</body>
</html>