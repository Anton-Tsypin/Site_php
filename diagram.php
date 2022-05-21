<?php
    include_once 'partials/head.php';
?>

<style>
  .inputs_form{
    margin-top: 10px;
    margin-left: 16px;
    background-color: var(--base_bg);
    display: inline-block;
  }
  .diagram_input{
    width: 50px;
  }
</style>

<body>
    <div id="diagram_div" class="base_form" style="width: 382px; margin-bottom: 0px;">
      <canvas id="diagram" class="base_form" style="margin-bottom: 0px;">
      </canvas>
      <form>
        <input style="margin-left: 20px; margin-top: 20px;" type="text" id="d_count" placeholder="Введите количество" oninput="change_script()">
        </form>
        <button style="margin-left: 20px;" onclick="create_inputs()" id="diagram_button" disabled="true">Новая диаграмма</button>
    </div>
    
    <script src="js/diagram.js"></script>
    <script>
      let d = document.getElementById("d_count");

      let btn = document.getElementById("diagram_button");
      let cnt = document.getElementById("d_count");
      function change_script(){
        if(cnt.value > 0){
          if(cnt.value > 24){
            cnt.value = 24;
          }
          btn.removeAttribute('disabled');
        } else {
          btn.setAttribute('disabled', true);
        }
      }
      
      let data = [];
      function create_inputs(){
        data = [];
        let j = Number(document.getElementById("d_count").value);
        for(let i = 0; i < j; i++){
          data.push(randint(10, 30));
        }
        let old_div = document.getElementById('inputs_div')
        let main_div = document.getElementById('diagram_div');
        let div = document.createElement('div');
        div.className = 'inputs_form';
        div.id = 'inputs_div';
        div.oninput = change_input;
        div.style.margintop = 100;
        if(old_div){
          old_div.replaceWith(div);
        } else {
          main_div.append(div);
        }
        for(let i = 0; i < Number(cnt.value); i++){
          let inp = document.createElement('input');
          inp.className = 'diagram_input';
          inp.id = 'input' + i;
          inp.value = data[i];
          div.append(inp);
        }
        change_input();
      };
      var a = 0;
      function change_input(){
        a++;
        console.log(a, data);
        for(let i = 0; i < data.length; i++){
          let inp = document.getElementById('input' + i);
          console.log(inp);
          if(inp){
            data[i] = Number(inp.value);
          }
        }
        draw_diagram();
      }

      function draw_diagram(){
        var myGist = new Gist(
          {
            canvas: canvas,
            seriesName: "Гистограммы",
            padding: 20,
            gridScale: 10,
            gridColor: "#8c8c8c",
            data: data,
            colors: ["#a55ca5","#67b6c7", "#bccd7a","#eb9743"]
          }
        );
        myGist.draw();
      };
      
    </script>
</body>