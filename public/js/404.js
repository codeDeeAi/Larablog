var container = getElementById('container404');
window.onmousemove = function(e) {
    var x = -e.clientX / 5;
    var y = -e.clientY / 5;

    console.log(e);
    container.style.backgroundPositionX = x + 'px';
    container.style.backgroundPositionY = y + 'px';
}