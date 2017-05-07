<?php  
	session_start();
	require_once 'db/connect.php';
	require_once 'functions/functions.php';
	

	$act = isset($_GET['act']) ? $_GET['act'] : 'list';

	switch ($act) {
		case 'list':
			$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
			$num = 2;
			$pages_result = $handler->query("SELECT COUNT(*) AS num FROM entry")->fetch();
			$pages = $pages_result['num'];
			$total = intval(($pages - 1)/$num)+1;
			$page = intval($page);
			$entry = array();
			$start = $page * $num - $num; 
			$res = $handler->query("
				SELECT entry.*, COUNT(comments.id) AS comments 
				FROM entry 
				LEFT JOIN comments ON entry.id = comments.entry_id 
				GROUP BY entry.id 
				ORDER BY date DESC 
				LIMIT $start, $num
			");

			while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
				$row['date'] = date('d-m-Y H:i:s', $row['date']);
				if (strlen($row['content']) > 100) {
					$row['content'] = substr(strip_tags($row['content']), 0, 97) . '...';
				}

				$entry[] = $row;
			}
			require 'templates/list.php';
			break;
		
		case 'entry':
			if (!isset($_GET['id'])) die("Missing id parameter");
			$id = intval($_GET['id']);

			$res = $handler->query("SELECT * FROM entry WHERE id=$id");
			$entry = $res->fetch(PDO::FETCH_ASSOC);
			if (!$entry) die("No such entry");
			$entry['date'] = date('d-m-Y H:i:s', $entry['date']);

			$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
			$num = 2;
			$pages_result = $handler->query("SELECT COUNT(*) AS num FROM comments WHERE entry_id=$id")->fetch();
			$pages = $pages_result['num'];
			$total = intval(($pages - 1)/$num)+1;
			$page = intval($page);
			$comment = array();
			$start = $page * $num - $num;
			$res = $handler->query("SELECT * FROM comments WHERE entry_id=$id ORDER BY date DESC LIMIT $start, $num");
			while($row = $res->fetch(PDO::FETCH_ASSOC)){
				$row['date'] = date('d-m-Y H:i:s', $row['date']);
				$comments[] = $row;
			}
			require 'templates/entry.php';
			require 'templates/comments.php';
			break;

		case 'login':
			is_user();
			require 'templates/login.php';
			break;

		case 'val-login':
			is_user();
			$login = $_POST['login'];
			$password = $_POST['password'];
			$res = $handler->query("SELECT * FROM users WHERE login='$login'");
			$row = $res->fetch(PDO::FETCH_ASSOC);
			if (empty($row['password'])) {
				die("Wrong login or password. <a href='?act=login'>To retry</a>");
			} else {
				if ($row['password'] == $password) {
					$_SESSION['login'] = $login;
					$_SESSION['password'] = $password;
					header('Location: .');
				}
				else {
					die("Wrong login or password. <a href='?act=login'>To retry</a>");
				}
			}
			break;

		case 'logout':
			session_destroy();
			header('Location: .');
			break;

		case 'reg':
			is_user();
			require 'templates/registration.php';
			break;

		case 'val-reg':
			is_user();
			$login = convert($_POST['login']);
			$password = $_POST['password'];
			$rpassword = $_POST['rpassword'];
			$res = $handler->query("SELECT * FROM users WHERE login='". $login ."'");
			$row = $res->fetch(PDO::FETCH_ASSOC);
			if ($password != $rpassword) {
				die("Passwords are not match. <p><a href='?act=reg'>To retry</a></p>");	
			}
			elseif(!empty($row['id'])) {
				die("Sorry, the login you entered is already registered. Please enter a different <a href='?act=reg'>login.</a>"); 
			}
			else{
				$res = $handler->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
				$res->execute(array($login, $password));
				$_SESSION['login'] = $login;
				header('Location: .');
			}
			break;

		case 'add-entry':
			is_admin();
			require 'templates/add-entry.php';
			break;

		case 'save-entry':
			is_admin();
			$header = convert($_POST['header']);
			$content = nl2br(convert($_POST['content']));
			$date = strtotime("now");
		
			$res = $handler->prepare("INSERT INTO entry (header, content, date) VALUES (?, ?, ?)");
			$res->execute(array($header, $content, $date));
			header('Location: .');
			break;

		case 'del-entry':
			is_admin();
			$id = $_GET['id'];
			$res = $handler->query("DELETE FROM entry WHERE id=$id");
			header("Location: .");
			break;

		case 'edit-entry':
			is_admin();
			$id = $_GET['id'];
			$entry = array();
			$res = $handler->query("SELECT * FROM entry WHERE id=$id");
			while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
				$row['date'] = date('d-m-Y H:i:s', $row['date']);
				$entry[] = $row;
			}

			require 'templates/edit-entry.php';
			break;

		case 'save-edit-entry':
			is_admin();
			$id = $_POST['id'];
			$title = convert($_POST['header']);
			$content = nl2br(convert($_POST['content']));
			$date = strtotime("now");

			$res = $handler->prepare("UPDATE entry SET 
				header= ?, 
				content= ?, 
				date= ?
				WHERE id=$id");
			$res->execute(array($title, $content, $date));
			header("Location: ?act=entry&id=$id");
			break;

		case 'add-com':
			is_user();
			$id = $_POST['id'];
			$author = $_SESSION['login'];
			$comment = nl2br(convert($_POST['comment']));
			$date = strtotime("now");
		
			$res = $handler->prepare("INSERT INTO comments (entry_id, date, author, content) VALUES (?, ?, ?, ?)");
			$res->execute(array($id, $date, $author, $comment));
			header('Location: ?act=entry&id=' . $id);
			break;

		default:
			die("No such action");
	}
?>