<?php
    include_once 'partials/head.php';
?>

<body>

    <div class="base_form">
        <form action="" method="post">
            <input type="text" name="name" placeholder="Имя" required></input>
            <input type="text" name="login" placeholder="Логин" required></input><br>
            <input type="password" name="password" placeholder="Пароль" required></input>
            <input type="password" name="password_confirmation" placeholder="Подтвердите пароль" required></input><br>
            <input type="submit" name="reg" value= "Зарегистрироваться"></input>
        </form>

        <form action="login.php" style="margin-top: 20px"><button>Перейти к авторизации</button></form>

        <?php
            require_once 'partials/signup.php';
            require_once 'partials/msg.php';
        ?>
    </div>
</body>