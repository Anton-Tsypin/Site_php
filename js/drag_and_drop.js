var yoba = document.createElement('img');
yoba.src = "https://stickerboom.ru/files/2014/11/13/1735x03a8-300x300.png";
yoba.id = 'yoba'
yobawidth = 100;
yoba.height = 100;
document.body.append(yoba);
drag_and_drop(yoba);

var yoba = document.createElement('img');
yoba.src = "https://stickerboom.ru/files/2014/11/13/1735x03a8-300x300.png";
yoba.id = 'yoba2'
yobawidth = 100;
yoba.height = 100;
document.body.append(yoba);
drag_and_drop(yoba);

function drag_and_drop(element){

  element.style.position = 'absolute';
  element.style.zIndex = 2000;
  
  if(localStorage.getItem('element_' + element.id) != null){
    var position = localStorage.getItem('element_' + element.id).split(',');
  } else {
    var position = [30, 80];
  }
  console.log(position)
  element.style.left = position[0];
  element.style.top = position[1];

  element.onmousedown = function(e) {

    let coords = getCoords(element);
    let shiftX = e.pageX - coords.left;
    let shiftY = e.pageY - coords.top;

    element.style.position = 'absolute';
    document.body.appendChild(element);
    moveAt(e);

    element.style.zIndex = 1000; // над другими элементами

    function moveAt(e) {
      element.style.left = e.pageX - shiftX + 'px';
      element.style.top = e.pageY - shiftY + 'px';
      localStorage.setItem('element_' + element.id, [e.pageX - shiftX, e.pageY - shiftY]);
    }

    document.onmousemove = function(e) {
      moveAt(e);
    };

    element.onmouseup = function() {
      document.onmousemove = null;
      element.onmouseup = null;
    };

  }

  element.ondragstart = function() {
    return false;
  };

  function getCoords(elem) {   // кроме IE8-
    var box = elem.getBoundingClientRect();
    return {
      top: box.top + scrollY,
      left: box.left + scrollX
    };
  }
};