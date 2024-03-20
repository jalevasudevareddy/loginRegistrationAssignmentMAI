<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript App</title>
</head>
<body>
    <div id="root">
        <h1>Hello Sachin.</h1>
        <button id="changeNameBtn">Change Name</button>
        <h1>0</h1>
        <button id="incrementBtn">Increment</button>
    </div>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded",function(){
            var name="Sachin";
            var cnt=0;
            function render(){
                document.getElementById('root').innerHTML=`<h1>Hello ${name}.</h1>
                    <button id="changeNameBtn">change Name</button>
                    <h1>${cnt}</h1>
                    <button id="incrementBtn">Increment</button>`;
            }
            document.getElementById("root").addEventListener("click",function(event){
                if(event.target.id === "changeNameBtn"){
                    name = name === 'Sachin'?'Dhoni':'Sachin';
                    render();
                }
                else if(event.target.id === 'incrementBtn'){
                    cnt++;
                    render();
                }
            });


        })

    </script>
    <!-- This code is also correct but this applies extra conditions -->
    <!-- <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            var name = 'Sachin';
            var cnt = 0;

            function render() {
                document.getElementById('root').innerHTML = `
                    <h1>Hello ${name || 'Sachin'}.</h1>
                    <button id="changeNameBtn">Change Name</button>
                    <h1>${cnt}</h1>
                    <button id="incrementBtn">Increment</button>
                `;
            }

            function fnChangeName() {
                name = name === 'Sachin' ? 'Dhoni' : 'Sachin';
                render();
            }

            function fnIncrement() {
                cnt++;
                render();
            }

            document.getElementById('root').addEventListener('click', function (event) {
                if (event.target.id === 'changeNameBtn') {
                    fnChangeName();
                } else if (event.target.id === 'incrementBtn') {
                    fnIncrement();
                }
            });

            console.log("Mounting: after loading the content");

            document.getElementById('changeNameBtn').addEventListener('click', fnChangeName);
            document.getElementById('incrementBtn').addEventListener('click', fnIncrement);
        });
    </script> -->
</body>
</html>
