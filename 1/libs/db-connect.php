<?php
require "db.php";

if(isset($_POST['name'])){
	$getTopProd = $_POST['name'];
	$products = R::getAll('SELECT * FROM products' );
	 foreach ($products as $prod) {
	 	// var_dump($prod);
	 	$shortDescription = substr($prod['prod_description'],0, 150);
	 	echo "<div>
			<div class='uk-card uk-card-default uk-card-body'>
				<div class='uk-card-badge uk-label uk-text-lowercase' style='background: orange;' >$prod[prod_price].00 грн.</div>
				<h3 class='uk-card-title'>$prod[prod_name]</h3>
				<p>$shortDescription ...</p>
				<a class='uk-button uk-button-default prod-modal uk-align-right' href='#my-id' uk-toggle>Детальніше ...</a>
			</div>
	 	</div>";
	}
} 
elseif (isset($_POST['title'])) {
	$getTask =  $_POST['title'];
	$tasks = R::find($getTask);
 	foreach ($tasks as $task ) {
		echo "<li >
		<a class='uk-accordion-title' href='#'>$task->task_title</a>
		<div class='uk-accordion-content'>$task->task_description
			<button class='uk-button-primary uk-align-right'>Придбати</button>
		</div>
		</li>";
	}

}
elseif (isset($_POST['prod'])) {
	$getProd = $_POST['prod'];
	$getTitle = $_POST['prod_title'];
	$getModal = R::find( $getProd, ' prod_name LIKE ? ', [ $getTitle ] );
	foreach ($getModal as $key ) {
		echo "<div class='uk-modal-header uk-flex uk-flex-middle'>
					<img src='$key[prod_image]' alt='$key[prod_name]' class='uk-width-small'>
		            <h2 class='uk-modal-title'>$key[prod_name]<span class='uk-label uk-align-right modal-prod__price' style='background: orange; font-size: 18px; '>$key[prod_price].00 грн.</span></h2>

		        </div>
		        <div class='uk-modal-body uk-padding-remove-horizontal' uk-overflow-auto>
		            <p>$key[prod_description]</p>
		        </div>
		       ";
	}
}


// // $getTask =  $_POST['title'];
// $getTopProd = $_POST['name'];
// // $tasks = R::find($getTask);
// $products = R::findAll($getTopProd);


// // // $arr = json_encode($tasks);
// // // var_dump($tasks);
// // function title($arr){
// //  foreach ($arr as $task ) {
// // 	echo "<li>$task->task_title </li>";
// // 	}
// // };
// function getProd($arr){
//  foreach ($arr as $task ) {
// 	echo "<li>$task->prod_name </li>";
// 	}
// }
// // title($tasks);
// getProd($products);	
// $arr = R::getAll( "'SELECT * FROM $getTask'" );
// var_dump($arr);
// title($tasks);
// $hostname = "127.0.0.1"; // название/путь сервера, с MySQL
// $username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
// $password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
// $dbName = "test"; // название базы данных

// /* Создаем соединение */
// $link = mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
// mysql_select_db($dbName, $link) or die(mysql_error());
// // mysql_query('SET NAMES utf8') or header('Location: Error');

// /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
// // mysql_select_db($dbName) or die (mysql_error());;
//  $sql = mysql_query("SELECT `task_title`, `task_description`  FROM `task`", $link);
// function res(){
// 	$rows = array();
//   while ($row = mysql_fetch_assoc($sql)) {
//         //printf ("ID: %s  Name: %s", $row[0], $row[1]);  
//         // echo $row['task_description'];//"<br>";
//   	//var_dump($row);
//   	$rows[] = $row;
//     }

// 	echo json_encode($rows);
//  //echo $result['task_description'];
// }



?>