<?php
    include_once 'connect_sql.php';

    $not_empty = !empty($_POST['login']) && !empty($_POST['password']);

    if($not_empty){

        $login = $_POST['login'];
        $password = md5($_POST['password']);

        $check_user = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        if (mysqli_num_rows($check_user) > 0) {

            $user = mysqli_fetch_assoc($check_user);

            $_SESSION['user'] = [
                "name" => $user['name'],
                "id" => $user['id'],
            ];
            header('Location: user.php');
        } else {
            $_SESSION['message'] = 'Неверный логин или пароль';
        }
    } else {
        $_SESSION['message'] = 'Пустые поля';
    }
?>
