<?php 
    session_start(); 
    include_once 'connect_sql.php';
?>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header class="header_back">
        <div class="header_style">
            <form style="left: -5%;" action="photogalery.php"><input type="submit" value="Галерея"></form>
            <form style="left: 05%;" action="diagram.php"><input type="submit" value="Диаграмма"></form>
            <form style="left: 30%;" action="index.php"><input type="submit" value="Главная"></form>
            <form style="left: 39%;" action="user.php"><input type="submit" value="Профиль"></input></form>
            <form style="left: 50%;" action="login.php"><input type="submit" value="Авторизация"></form>
            <form style="left: 70%;" action="partials/logout.php"><input type="submit" value="Выйти"></form>      
            <form style="left: 61%;" action="list.php"><input type="submit" value="Список"></form>
            <form style="left: 100%" action=""><input type="button" id="change_theme" value="Сменить тему"></form>
            
        </div>
    </header>
    
    <footer style="position: fixed; bottom: 5%; right: 4%">
        <img src="https://www.codewars.com/users/Anton_Tsypin/badges/large">
    </footer>
    
    <script src = "js/themes.js" ></script>
    <canvas class = "background" > </canvas>
    <script src = "js/particles.js" ></script>
    <script src="js/drag_and_drop.js"></script>
</body>

