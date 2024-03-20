<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label>Search Name:</label>
    <input oninput="funGetFilRes(event)">
    <p id='list'></p>
    <script type="text/javascript">
        // Initial list of players
        const players=['Sachin','Dhoni','Kohli','Uv','Panth','Lara','Pointing','Rohit','Smith','Sourav'];
        
        // Function to display list initially and filter data
        function funGetFilRes(event){
            const input = event.target.value.toLowerCase();
            const filteredData = players.filter((val)=>{
                return val.toLowerCase().includes(input);
            });

            // If input is empty, display all players, else display filtered players
            const dataToShow = input === '' ? players : filteredData;

            document.getElementById('list').innerHTML = dataToShow.map((val, index) => {
                return `<ol>${index + 1}. ${val}</ol>`;
            }).join('');
        }
        // Initial call to display all players
        window.onload = function() {
            funGetFilRes({ target: { value: '' }});
        };
    </script>
</body>
</html>
