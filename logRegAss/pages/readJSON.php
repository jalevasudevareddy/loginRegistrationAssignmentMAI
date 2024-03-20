<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        var arrPlayers = [{
            'name': 'sachin',
            'runs': 2000
        }, {
            'name': 'Dhoni',
            'runs': 14000
        }, {
            'name': 'Kohli',
            'runs': 18000
        }, {
            'name': 'UV',
            'runs': 15000
        }];
        var playerObj = {
            'name': 'sachin',
            'runs': 20000,
            '100s': 100,
            '50s': 64,
            'matchs': 500
        }

        for (key in playerObj) {
            document.write(key + '...' + playerObj[key]);
            document.write('<br>');
            console.log(key + '...' + playerObj[key])
        }
        arrPlayers.forEach((element, index) => {
            document.write(index + '***' + element.name + '***' + element.runs);
            document.write('<br>');
        });
    </script>
</body>

</html>