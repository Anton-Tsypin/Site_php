var images_array = ["images/1.png", "images/2.png","images/3.jpg", "images/4.jpg", "images/5.jpg", "images/6.jpg",
  "https://i.guim.co.uk/img/media/327e46c3ab049358fad80575146be9e0e65686e7/0_0_1023_742/master/1023.jpg?width=465&quality=45&auto=format&fit=max&dpr=2&s=1feb1959e48be497be6ed215da0aa3bd", 
  "https://stickerly.pstatic.net/sticker_pack/V3UsPH6pEtk8qTcLjMqdQ/F4MF00/33/fac688c7-70ef-4ec7-b98d-9417687bde85.png", 
  "https://ih1.redbubble.net/image.516922657.0569/st,small,507x507-pad,600x600,f8f8f8.jpg"];
var image_count = images_array.length;

if (localStorage.getItem('number') !== null){
  window.number = Number(localStorage.getItem('number'));
} else {
  window.number = 0;
}

function image(direction){
  if(direction == "right"){
      number++;
      if(number == image_count)
        number = 0;
  } else if(direction == "left") {
      number--;
      if(number == -1)
        number = image_count - 1;
  } 
  document.getElementById('images').src = images_array[number];
  localStorage.setItem('number', number);
  mini_number_check();
}

main_img = document.createElement('img');
main_img.src = String(images_array[number]);
main_img.className = 'main_img';
main_img.id = "images";
main_img.width = 400;
main_img.height = 400;
document.getElementById('photo_div').append(main_img);


function image_click(){
  if(this.src.match(/localhost/g)){
    console.log(this.src);
    number = images_array.indexOf(String(this.src.match(/images\/\d+\.\w+/g)));
  } else {
    number = images_array.indexOf(this.src);
  }
  localStorage.setItem('number', number);
  document.getElementById('images').src = this.src;
  mini_number_check()
}


if(localStorage.getItem('mini_number') !== null){
  window.mini_number = Number(localStorage.getItem('mini_number'));
} else {
  window.mini_number = number;
}


function mini_images(j){
  let i = 0;
  while(i < 5){
    if(j >= image_count){
      j %= image_count;
    } else if(j < 0){
      j = (j % image_count) + image_count;
    }
    document.getElementById('image'+i).src = images_array[j];
    i++; j++;
  }
  mini_number_check()
}

function mini(direction){
  if(direction == "right"){
    mini_number = ((mini_number + 1) % image_count);
    
  } else if(direction == "left") {
    mini_number = ((mini_number - 1) % image_count);
    if(mini_number < 0){
      mini_number += image_count
    }
  }
  localStorage.setItem('mini_number', mini_number)
  mini_images(mini_number);
}

div = document.createElement('div');
div.id = "images_div";
div.className = "mini_images_div";
document.getElementById('photo_div').append(div);

for(let i = 0; i < 5; i++){
  j = i + mini_number
  if(j >= image_count){
    j %= image_count;
  } else if(j < 0){
    j = (j % image_count) + image_count;
  }
  el = document.getElementById("images")
  img = document.createElement('img');
  img.id = "image" + i;
  img.className = "mini";
  img.onclick = image_click;
  div.append(img);
}
mini(null);

function mini_number_check(){
  for(let i = 0; i < 5; i++){
    el = document.getElementById('image' + i)
    if(el.src == images.src){
      el.style.border="4px solid red";
    } else {
      el.style.border="4px solid #000000";
    }
  }
}