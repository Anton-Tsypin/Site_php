<?php
    include_once 'partials/head.php';
?>

<body>

    <div class="base_form">
        <form action="" method="post">
            <input type="text" name="login" placeholder="Логин" required></input>
            <input type="password" name="password" placeholder="Пароль" required></input><br>
            <input type="submit" name="log" value = "Войти"></input>
        </form>

        <form action="registration.php" style="margin-top: 20px"><button>Перейти к регистрации</button></form>

        <?php
            require_once 'partials/signin.php';
            require_once 'partials/msg.php';
        ?>
    </div>
</body>