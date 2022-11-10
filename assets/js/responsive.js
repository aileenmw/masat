function removeBtns() {
    var btns = document.getElementsByClassName('stop');
    var len = btns.length;
    for (x = len - 1; x >= 0; x -= 1) {
        var btn = btns[x];
        btn.parentNode.removeChild(btn);
    }
}

if (window.innerWidth < 641) {

    removeBtns();

    var img = document.getElementsByClassName('img');
    for (x = 0; x < img.length; x += 1) {
        img[x].classList = 'img' + ' ' + 'stop';
    }
}


//center game vertically on smaller screens

function centerVert(el) {
    var elH = el.offsetHeight;
    var winH = window.innerHeight;
    var elMarginTop = (winH - elH) / 2;
    el.style.marginTop = elMarginTop + 'px';
}
function centerVertInParent(el, parent) {
    var elH = el.offsetHeight;
    var parentH = parent.offsetHeight;
    var elMarginTop = (parentH - elH) / 2 - 50;
    el.style.marginTop = elMarginTop + 'px';
}

function centerOnVert(el, parent) {
    if (window.innerWidth < window.innerHeight) {
        var theEl = el;
        var theP = parent;
        centerVertInParent(theEl, theP);
    }
}

var wrapper = document.getElementById('global_wrapper');
var game = document.getElementById('game');

window.onresize = centerOnVert(game, wrapper);
window.onload = centerOnVert(game, wrapper);