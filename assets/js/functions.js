///* Stop functions  */

function stopping(timeOut, timer, id) {

    clearTimeout(timeOut);
    timer = 0;

    var thisButton = document.getElementById(id);

    if (timer_three_on == 1 || timer_two_on == 1 || timer_one_on == 1) {
        thisButton.setAttribute("class", "clicked");
    }
    var allClicked = document.querySelectorAll('.clicked').length;

    if (allClicked == 3) {
        allStopping();
    }
}

function allStopping() {
    if (timer_three_on == 1 || timer_two_on == 1 || timer_one_on == 1) {

        clearTimeout(r);
        clearTimeout(s);
        clearTimeout(t);
        timer_one_on = 0;
        timer_two_on = 0;
        timer_three_on = 0;
        stopAll.innerHTML = "RESET";

        if (timer_one_on == 0 && timer_two_on == 0 && timer_three_on == 0) {
            checkWin();
        }
    } else if (stopAll.innerHTML == "RESET") {
        window.location.reload();
    }
}

function checkWin() {

    var kiss = 'http://amw.nu/masats_jul/assets/graphics/img/kiss.png';
    var kiss_slow = 'http://amw.nu/masats_jul/assets/graphics/img_slow/kiss.png';
    if (timer_one_on == 0
            && timer_two_on == 0
            && timer_three_on == 0) {

        if ((item1.src == kiss || item1.src == kiss_slow)
                && item1.src == item2.src
                && item1.src == item3.src) {
            coupon.style.display = 'block';
            var coupText = document.getElementById('couponText');
            centerVert(coupText);
        } else if (item1.src == item2.src
                && item1.src == item3.src
                && item2.src == item3.src) {
            var lightbox = document.getElementById('lightbox');
            lightbox.style.display = 'block';
            lightbox.innerHTML = '<img src="' + item1.src + '">\n\
                                              <p class="close white">X</p>\n\
                                              <h3>Tillyke og god jul!!!<br>Du kan hente din gevinst i din MASAT butik allerede i morgen.</h3>';
            centerVert(lightbox);
        } else if (item1.src === item2.src
                || item1.src == item3.src
                || item2.src == item3.src) {
            playSound(sound, bell_active);
            points = points + 50;
            swing(bell_active);
            document.getElementById('points').innerHTML = 'Dine point : <br> ' + points;
        }

        stopAll.innerHTML = "RESET";
        playButton.innerHTML = "FORTSÆT";

        oneStop.classList.remove("clicked");
        twoStop.classList.remove("clicked");
        threeStop.classList.remove("clicked");

    }
}

function playSound(filename, element) {
    if (!filename, !element) {
        return;
    }
    var mp3Source = '<source src="' + filename + '.mp3" type="audio/mpeg">';
    var oggSource = '<source src="' + filename + '.ogg" type="audio/ogg">';
    var embedSource = '<embed hidden="true" autostart="true" loop="false" src="' + filename + '.mp3">';
    element.innerHTML = '<audio autoplay="autoplay">' + mp3Source + oggSource + embedSource + '</audio>';
}
/*   CSS animation function for bell  */

function swing(el)
{
    el.style.webkitAnimationName = 'rotation';
    el.style.webkitAnimationDuration = '4s';
    setTimeout(function () {
        el.style.webkitAnimationName = '';
    }, 4000);
}
