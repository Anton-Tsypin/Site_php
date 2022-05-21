<?php
    include_once 'partials/head.php';
    if (!(isset($_SESSION['user']))){
        header('Location: login.php');
    }
?>

<body>
    <div id='table_div' class="base_form">
        <?php
            if($_SESSION['user']){
                echo "<h1>Ваш профиль: ".$_SESSION['user']['name']."<h1>";
            }
        ?>
        
        <form action="user.php" method="POST">
            <input type="text" name="text" placeholder="Задача" required>
            <input type="submit" value="Добавить">
        </form>
        
        <form action="partials/update_table.php" method="POST">
            <input type="hidden" id="tasks_input" name="task">
            <button type="submit" id="update_button" hidden>Обновить</button>
        </form>

        <?php
            if (isset($_POST['text'])){
                require_once 'partials/add.php';
            }
        ?>

        <h1 style="margin-top: 30px; margin-bottom: 15px; text-align: center; font-size: 24px;">Список дел</h1>
        <script>
            //var ids = [];
            div = document.getElementById('table_div');
            table = document.createElement('table');
            table.className = "table";
            table.border = 10 + 'px';

            thead = document.createElement('thead');
            let ths = ['ID', 'Не выполненно', "Выполненно"];
            for(let i = 0; i < ths.length; i++){
                th = document.createElement('th');
                th.innerHTML = ths[i];
                thead.append(th);
            }
            
            tbody = document.createElement('tbody');

            table.append(thead);
            table.append(tbody);
            div.append(table);
        </script>

        <?php
            $user_id = $_SESSION['user']['id'];

            $check_query = mysqli_query($mysqli, "SELECT * FROM `to_do_list` WHERE `user_id` = '$user_id' ORDER BY `id` DESC");

            while($query = mysqli_fetch_assoc($check_query)){
            

                $text = $query['text'];
                $id = $query['id'];
                $completed = $query['completed'];
            ?>
            <script>
                id = "<?=$id; ?>", text = "<?=$text; ?>", completed = "<?=$completed; ?>";


                tr = document.createElement("tr");

                td_id = document.createElement('td');
                td_id.innerHTML = id;
                td_text_no = document.createElement('td');
                td_text_yes = document.createElement('td');
                td_text_no.id = "td_no_" + id; 
                td_text_yes.id = "td_yes_" + id; 
                td_text_no_text = document.createElement('a');
                td_text_yes_text = document.createElement('a');

                if(Number(completed)){
                    td_text_yes_text.innerHTML = text;
                    td_text_yes_text.draggable = "true";
                    td_text_yes_text.style.cursor = "move";
                    td_text_yes_text.id = 'yes_' + id;
                } else {
                    td_text_no_text.innerHTML = text;
                    td_text_no_text.draggable = "true";
                    td_text_no_text.style.cursor = "move";
                    td_text_no_text.id = 'no_' + id;
                }
                
                td_text_no.append(td_text_no_text);
                td_text_yes.append(td_text_yes_text);

                td_del = document.createElement('td');
                del = document.createElement('a');
                del.className = "X";
                del.href = "partials/delete.php?id=" + id;
                del.innerHTML = 'X';
                td_del.append(del);

                tr.append(td_id);
                tr.append(td_text_no);
                tr.append(td_text_yes);
                tr.append(td_del);
                tbody.append(tr);
                console.log(id, text);

                tr.addEventListener('dragstart', (evt) => {
                    evt.target.classList.add('selected');
                });

                tr.addEventListener('dragend', (evt) => {
                    evt.target.classList.remove('selected');
                });

                tr.addEventListener('dragover', (evt) => {
                    evt.preventDefault();

                    const activeElement = tbody.querySelector('.selected');
                    const currentElement = evt.target;
                    ae = activeElement.id;
                    ce = currentElement.id;

                    const isMoveable = Boolean(!(ce.match(ae.match(/\w+\d+/g))) && (ce.match(ae.match(/\d+/g))));
                    if (!isMoveable) {
                        return;
                    }
                    if(ae == 'yes_' + ae.match(/\d+/g)){
                        activeElement.id = 'no_' + ae.match(/\d+/g)
                    } else {
                        activeElement.id = 'yes_' + ae.match(/\d+/g)
                    }
                    currentElement.append(activeElement);
                    //ids.push(String(activeElement.id.match(/\d+/g)));
                    //document.getElementById('tasks_input').value = ids;


                    document.getElementById('tasks_input').value = String(activeElement.id.match(/\d+/g));
                    document.getElementById('update_button').click();

                });
            </script>
            <?php
            }

            require_once 'partials/msg.php';
        ?>
    </div>

</body>
