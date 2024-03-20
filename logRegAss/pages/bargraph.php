<!-- Show student subjects and marks in json object format-->

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        #graph {
            position: relative;
        }

        #bars>div {
            display: inline-block;
            margin-left: 20px;
        }

        #bars {
            position: absolute;
            left: 525px;
            bottom: 41px;
        }

        .bar-styles {
            width: 40px;
            border: 1px solid red;
            background: yellow;
        }

        #x-axis {
            position: relative;
            top: -40px;
            left: 450px;
            width: 500px;
            border: 1px solid red;
            display: inline-block;
        }

        #y-axis {
            height: 500px;
            border: 1px solid red;
            display: inline-block;
        }

        body {
            margin: 0px;
        }

        .text-center {
            text-align: center;
        }

        #header {
            text-align: center;
            font-size: 50px;
            font-weight: bold;
            background: yellow;
            font-style: italic;
        }

        #footer {
            position: fixed;
            text-align: center;
            width: 100%;
            font-size: 20px;
            font-weight: bold;
            font-style: italic;
            background: yellow;
            bottom: 0px;
        }
    </style>
</head>

<body>
    <div id="header">
        Student Info
    </div>
    <p class="text-center">
        <span>English</span>
        <input type="text" id="eng">
    </p>
    <p class="text-center">
        <span>Maths</span>
        <input type="text" class="mat">
    </p>

    <p class="text-center">
        <span>Hindi</span>
        <input type="text">
    </p>
    <p class="text-center">
        <span>Science</span>
        <input type="text">
    </p>

    <p class="text-center">
        <span>Social</span>
        <input type="text">
    </p>
    <p class="text-center" id="tel">
        <span>Telugu</span>
        <input type="text">
    </p>
    <p class="text-center">
        <input type="button" onclick="fnGetStdDet()" value="Submit">
    </p>

    <p id="result" class="text-center">
    </p>
    <div id="graph">
        <div id="x-axis"></div>
        <div id="y-axis"></div>
        <div id="bars"></div>
    </div>
    <div id="footer">
        &copy; rights belongs to me.
    </div>
    <script>
        function fnGetStdDet() {
            //get Reference 
            //using id
            var engRef = document.getElementById('eng');
            //using class
            var matRef = document.getElementsByClassName('mat')[0];
            //using tag name
            var hinRef = document.getElementsByTagName('input')[2];
            //using query selector
            var sceRef = document.querySelector('p:nth-child(5)>input');
            //using query selector all
            var socRef = document.querySelectorAll('[type=text]')[4];
            //using query Selector
            var telRef = document.querySelector('#tel>input');
            var resRef = document.getElementById('result');
            var barRef = document.getElementById('bars');
            //get the values conver into number using Number or parseInt methods

            var eng = Number(engRef.value);
            var mat = Number(matRef.value);
            var hin = Number(hinRef.value);
            var sce = parseInt(sceRef.value);
            var soc = parseInt(socRef.value);
            var tel = parseInt(telRef.value);
            var stdObj = {
                'English': eng,
                'Maths': mat,
                'Hindi': hin,
                'Sceience': sce,
                'Social': soc,
                'Telugu': tel
            }
            var total = eng + mat + hin + sce + soc + tel;
            var avg = (total / 150) * 100;
            //insert total and avg properties

            stdObj.Total = total;
            stdObj['marks Avg'] = avg;

            //print result

            resRef.innerHTML = JSON.stringify(stdObj);

            //Delete total and avg from stdObj

            delete stdObj.Total;
            delete stdObj['marks Avg'];
            barRef.innerHTML = '';
            for (key in stdObj) {
                var ele = document.createElement('div');
                ele.classList.add('bar-styles');
                ele.style.height = stdObj[key] * 10 + 'px';
                ele.setAttribute('title', key + ' : ' + stdObj[key]);
                barRef.appendChild(ele);
            }
        }
    </script>
</body>

</html>