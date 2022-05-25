<?php
    include_once 'partials/head.php';
?>

<body>
    <div id="photo_div" class = "base_form" style="width:600px">
        <div id="left" onclick="image('left')" class="arrow">
            <img src="images/left.png" alt="" style="margin-left: 5%; position: fixed; top: 200px;">
        </div>
        <div id="right" onclick="image('right')" class="arrow">
            <img src="images/right.png" alt="" style="margin-left: 85%; position: fixed; top: 200px;">
        </div>
        <p style="font-size: 18px; color: #333; font-weight: bold;" id="num_img"></p>
        <span class="arrow_button" onclick="mini('left')" style="margin-left: 10%; position: fixed; left: 0%; bottom: 40px;">&lt;</span>
        <span class="arrow_button" onclick="mini('right')" style="margin-left: 86.5%; position: fixed; left: 0%; bottom: 40px;">&gt;</span>
        <script src="js/photogalery.js"></script>
    </div>
</body> 