<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button onClick="fnGetTitlesAsList()">Get Titles As Table</button><br><br>
    <div id="output1"></div>
    <script>
        const fnGetTitlesAsList = () => {
            var obj = new XMLHttpRequest();
            obj.open("get", "https://jsonplaceholder.typicode.com/posts");
            obj.send();
            obj.onload = function () {
                let res = obj.responseText;
                data = JSON.parse(res);
                let tdata = data.map(post => {
                    return ({ id: post.id, title: post.title, userId: post.userId })
                })
                document.getElementById("output1").innerHTML = "<table border=1px><tr><th>Id</th><th>Title</th><th>User Id</th></tr>" + tdata.map((post) => "<tr><td>" + post.id + "</td><td>" + post.title + "</td><td>" + post.userId).join("") + "</td></tr></table>";
            }
        }
    </script>
</body>

</html>