<?php 

    include_once 'connect_sql.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM `to_do_list` WHERE `id` = '$id'";
    $mysqli->query($sql);

    header('Location: ../user.php');

?>