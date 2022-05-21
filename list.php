<?php
    include_once 'partials/head.php';
    include_once 'partials/connect_sql.php';
?>

<body>
    <div class="base_form">
        <?php
            echo "<h1>Список пользователей:</h1>";
            $check_query = mysqli_query($mysqli, "SELECT * FROM `users` ORDER BY `id` ASC"); 

            while($query = mysqli_fetch_assoc($check_query)){

                $name = $query['name'];
                $id = $query['id'];
                echo '<div><a>'.$id.'. '.$name.'</a></div>';

            }

            require_once 'partials/msg.php';
        ?>
    </div>
</body>