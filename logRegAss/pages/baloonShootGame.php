<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .disp-none {
            display: none;
        }

        #board {
            width: 400px;
            height: 400px;
            border: 1px solid red;
            display: inline-block;
            position: relative;
        }

        #baloons>div {
            position: absolute;
            border: 1px solid red;
            border-radius: 50%;
        }

        #b1 {
            width: 50px;
            height: 50px;
            top: 50px;
            left: 200px;
        }

        #b2 {
            width: 100px;
            height: 100px;
            top: 150px;
            left: 250px;
        }

        #b3 {
            width: 70px;
            height: 70px;
            top: 300px;
            left: 200px;
        }

        #arrow {
            border: 2px solid blue;
            width: 50px;
            position: absolute;
            left: 0px;
            top: 0px;
        }
    </style>
</head>

<body>
    <div id='board'>
        <div id="arrow"></div>
        <div id='baloons' onclick="fnBalClick(event)">
            <div id="b1"></div>
            <div id="b2"></div>
            <div id="b3"></div>
        </div>
    </div>
    <h1>Your score: <span id='score'>0</span></h1>
    <h1>Chances Left: <span id='ncl'>1</span></h1>
</body>
<script>
    var arrLeft = 0,
        arrTop = 0,
        targetBal, score = 0,
        noOfAttLeft = 1;

    function fnBalClick(eve) {
        // debugger;
        var activeEle = document.querySelector('#baloons>div[style]');
        if (activeEle) {
            activeEle.removeAttribute('style');
        }
        targetBal = eve.target;
        eve.target.style.border = '2px solid green'
    }

    window.addEventListener('keyup', function(eve) {
        if (eve.keyCode == 13) {
            // debugger;
            if (!targetBal) {
                alert('please select target baloon');
                return;
            }
            var balHeight = targetBal.offsetHeight
            var balLeft = targetBal.offsetLeft
            var balTop = targetBal.offsetTop
            var arrRef = document.querySelector('#arrow');
            console.log(balHeight, balLeft, balTop, arrRef);

            if (arrTop > balTop && arrTop < (balTop + balHeight)) {
                targetLeft = balLeft - 50;
                var interval = setInterval(function() {
                    arrLeft++;
                    arrRef.style.left = arrLeft + 'px';
                    if (arrLeft == targetLeft) {
                        clearInterval(interval);
                        arrRef.style.left = 0;
                        arrRef.style.top = 0;
                        arrTop = 0;
                        arrLeft = 0;
                        score++;
                        document.querySelector('#score').innerText = score;
                        //targetBal.classList.add('disp-none');
                        //targetBal.className="disp-none";
                        targetBal.setAttribute('class', 'disp-none');
                        targetBal = undefined;
                    }
                }, 20);
            } else {
                targetLeft = 350;
                var interval = setInterval(function() {
                    arrLeft++;
                    arrRef.style.left = arrLeft + 'px';
                    if (arrLeft == targetLeft) {
                        clearInterval(interval);
                        arrRef.style.left = 0;
                        arrRef.style.top = 0;
                        arrLeft = 0;
                        arrTop = 0;
                        if (noOfAttLeft == 0) {
                            window.location.reload();
                        }
                        noOfAttLeft--;
                        document.querySelector('#ncl').innerText = noOfAttLeft;

                    }
                }, 20);
            }

        }
        if (eve.keyCode == 38) {
            if (arrTop > 0) {
                arrTop = arrTop - 5;
                document.querySelector('#arrow').style.top = arrTop + 'px';
            }
        }
        if (eve.keyCode == 40) {
            if (arrTop < 350) { // Update the condition to prevent the arrow from moving beyond the bottom edge
                arrTop = arrTop + 5;
                document.querySelector('#arrow').style.top = arrTop + 'px'; // Add 'px' to set the CSS 'top' property correctly
            }
        }
        if (eve.keyCode == 39) {
            if (arrLeft < 350) { // Update the condition to prevent the arrow from moving beyond the right edge
                arrLeft = arrLeft + 5;
                document.querySelector('#arrow').style.left = arrLeft + 'px'; // Add 'px' to set the CSS 'left' property correctly
            }
        }
    })
</script>


</html>