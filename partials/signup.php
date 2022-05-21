<?php
    include_once 'connect_sql.php';

    $not_empty = !empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password_confirmation']);

    if($not_empty){

        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        $check_user = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `login` = '$login'");
        if (mysqli_num_rows($check_user) == 0) {
            if ($password == $password_confirmation) {
                $_SESSION['message'] = 'Регистрация прошла успешно!';
            
                $password = md5($password);
    
                $sql = "INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES(NULL, '$name', '$login', '$password')";
                $mysqli->query($sql);
                require_once 'partials/signin.php';
                header('Location: user.php');
            } else {
                $_SESSION['message'] = 'Пароли не совпадают';
            }
        } else {
            $_SESSION['message'] = 'Такой логин уже занят';
        }
        
    } else {
        $_SESSION['message'] = 'Пустые поля';
    }
?>