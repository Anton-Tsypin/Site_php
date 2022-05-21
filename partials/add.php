<?php 
	if (isset($_SESSION['user'])){

		$user_id = $_SESSION['user']['id'];
		$text = $_POST['text'];

		$check_text = mysqli_query($mysqli, "SELECT * FROM `to_do_list` WHERE `user_id` = '$user_id' AND `text` = '$text' AND `completed` = '0'");
		if (mysqli_num_rows($check_text) == 0) {
			$sql = "INSERT INTO `to_do_list` (`id`, `user_id`, `text`) VALUES(NULL, '$user_id', '$text')";

			if ($mysqli->query($sql)){
				$_SESSION['message_add'] = 'Успешно создано!';
			} else {
				$_SESSION['message_add'] = 'Неудача!';
			}
			$_POST['text'] = "";
			#header('Location: user.php');
		}

	} else {
		$_SESSION['message_add'] = 'Пустое поле, либо пользователь!';
	}
?>