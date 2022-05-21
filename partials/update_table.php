<?php
  include_once 'connect_sql.php';
  $task = $_POST['task'];
  $check_task = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM `to_do_list` WHERE `id` = '$task'"));
  $status = $check_task['completed'] == 0 ? 1 : 0;
  $check_task = mysqli_query($mysqli, "UPDATE `to_do_list` SET `completed` = '$status' WHERE `to_do_list`.`id` = '$task';");
  header('Location: ../user.php');
?>