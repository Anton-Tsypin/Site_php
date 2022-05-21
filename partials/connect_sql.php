<?php
    /*$serverName = "localhost";
    $userName = "root";
    $pass = "";
    $bdName = "test_project_bd";
    $mysqli = new mysqli($serverName, $userName, $pass, $bdName);*/

    
    $mysqli = mysqli_connect('localhost', 'root', '', 'test_project_bd');
    
    if (!$mysqli) {
        die('Error connect to DataBase');
    }

?>