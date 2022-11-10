<?php
$dir = "assets/graphics/img_slow/*";
foreach (glob($dir) as $file) {
    
}
$phpArray = glob($dir);
?>
<!doctype html>
<html lang="da-DK">
    <head>
        <title>MASAT SPIL</title>
        <meta charset="utf-8">
        <link  rel="stylesheet" type="text/css" href="assets/core.css">
        <meta name="viewport" content="width=device-width, initial-scale=1,
              minimum-scale=1, maximum-scale=1" />
        <link rel="icon" href="http://amw.nu/assets/img/favicon/blue_arrow.png">
    </head>
    <body>
        <script>
            var clientHeight = window.innerHeight;
            document.body.style.height = clientHeight + 'px';
        </script>
        <div id="global_wrapper">
            <div class="flex_wrapper pos_rel">
                <div class="point_wrapper">
                    <div id="points"></div>
                    <img src="assets/graphics/christmas/bell.png" id='bell_active'>
                </div>
                <div class="h">Vind en Julegave fra <br><span class="blue large">MASAT</span>
                </div>
            </div>
            <h5>
                Rammer du  <span class="blue"> 2 ens </span> samler du point til dit <span class="blue"> MASAT</span> kort.<br>
                Rammer du <span class="blue">3 ens </span> får du pruduktet på billedet.<br>
                Får du  <span class="blue">3 <img src="assets/graphics/little_kiss.png" alt="kiss" id ="kiss"></span> vinder du en værdikupon på 
                <span class="large blue bingo">5.000 Kroner
                    <span class="ast">*</span>
                </span><br>
                <b>HELD OG LYKKE !!</b>
            </h5>
            <img src="assets/graphics/christmas/branch_with_balls.png" id="branch_right">
            <img src="assets/graphics/christmas/corner.jpg" id="branch_left">
            <div id="game">
                <div class="flexbox">              
                    <?php
                    for ($x = 1; $x <= 3; $x++) {
                        $len = count($phpArray);
                        $rand = rand(0, $len - 1);
                        ?>               
                        <div class="col">
                            <div class="frame">
                                <img src="<?php echo $phpArray[$rand]; ?>"  id ="<?php echo 'item' . $x; ?>" class="img">
                            </div>
                            <button id="<?php echo 'stop' . $x; ?>" class="stop">stop <?php echo $x; ?></button>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="buttons">
                    <button id="play">spil</button>
                    <button id="stopAll">stop alle</button>
                </div> <!--buttons-->
                <div id="lightbox"></div>
                <div id="coupon">
                    <h3 id="couponText">
                        <p class="close">X</p>Glædelig jul !!! 
                        <br>Du har vundet en værdikupon på 5.000 DKR
                    </h3>
                </div>
            </div>
        </div> <!--global wrapper -->
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/responsive.js"></script>
        <script>

            var imgCont = document.getElementById('img_cont');
            var imgagePath = <?php echo json_encode($phpArray); ?>;
            var len = imgagePath.length;
            var timeout = 150;

            var items = document.getElementsByClassName('img');
            var stopBtns = document.getElementsByClassName('stop');
            var stopAll = document.getElementById('stopAll');
            var playButton = document.getElementById('play');
            
            /*   START POSITION FOR FRAMES AND BUTTONS  */
            
            var item1 = items[0];
            var oneStop = stopBtns[0];
            var x = 0;
            var r;
            var timer_one_on = 0;

            var item2 = items[1];
            var twoStop = stopBtns[1];
            var y = 0;
            var s;
            var timer_two_on = 0;

            var item3 = items[2];
            var threeStop = stopBtns[2];
            var c = 0;
            var t;
            var timer_three_on = 0;

            /* PLAY BUTTON  */
            playButton.addEventListener('click', function () {
                if (!timer_one_on) {
                    timer_one_on = 1;
                    oneRoll();
                }
                if (!timer_two_on) {
                    timer_two_on = 1;
                    twoRoll();
                }
                if (!timer_three_on) {
                    timer_three_on = 1;
                    threeRoll();
                }
                stopAll.innerHTML = 'Stop Alle';
            });

            /* FIRST FRAME */
            var oneRoll = function () {
                x = Math.floor((Math.random() * len) + 0);
                r = setTimeout(oneRoll, timeout);
                item1.src = imgagePath[x];
            };

            oneStop.addEventListener('click', function () {
                var id = this.id;
                stopping(r, timer_one_on, id);
            });

            /* SECOND FRAME   */

            var twoRoll = function() {
                y = Math.floor((Math.random() * len) + 0);
                s = setTimeout(twoRoll, timeout);
                item2.src = imgagePath[y];
            }

            twoStop.addEventListener('click', function () {
                var id = this.id;
                stopping(s, timer_two_on, id);
            });

            /* THIRD FRAME  */

            var threeRoll = function() {
                c = Math.floor((Math.random() * len) + 0);
                t = setTimeout(threeRoll, timeout);
                item3.src = imgagePath[c];
            }

            threeStop.addEventListener('click', function () {
                var id = this.id;
                stopping(t, timer_three_on, id);
            });

            /* STOP ALL BUTTON   */
            stopAll.addEventListener('click', function () {
                allStopping();
            });

            /* START POSITION FOR SCORE  */
            var points = 0;
            document.getElementById('points').innerHTML = 'Dine point: <br> ' + points;
            var lightbox = document.getElementById('lightbox');
            lightbox.addEventListener("click", function () {
                lightbox.style.display = 'none';
            });

            var coupon = document.getElementById('coupon');
            coupon.addEventListener("click", function () {
                playSound();
                coupon.style.display = 'none';
            });

            var bell_active = document.getElementById('bell_active');
            var sound = 'assets/sound/xmas_bell';

        </script>
    </body>
</html>