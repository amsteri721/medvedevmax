<?php  
	//Перевірка на авторизацію користувача
	function is_user(){
		if (isset($_SESSION['login'])) {
			header('Location: .');
		}
	}

	//Перевірка на права адміністратора
	function is_admin(){
		if ($_SESSION['login']!='admin') {
			die(header("HTTP/1.0 404 Not Found"));
		}
	}

	//перетворює спеціальні символи та видаляє пробіли спочатку та вкінці
	function convert($var){
		return trim(htmlspecialchars(strip_tags($var)));
	}
?>