<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Axios</title>
</head>

<body>
    <button onClick="fnGetTitlesTable()">Get Titles As Table</button><br><br>
    <div id="output1"></div>
    <script>
        const fnGetTitlesTable = () => {
            axios.get("https://jsonplaceholder.typicode.com/posts")
                .then((res) => {
                    let data = res.data;
                    let tdata = data.map(post => {
                        return ({ id: post.id, title: post.title, userId: post.userId })
                    })
                    document.getElementById("output1").innerHTML = "<table border=1px><tr><th>Id</th><th>Title</th><th>User Id</th></tr>" + tdata.map((post) => "<tr><td>" + post.id + "</td><td>" + post.title + "</td><td>" + post.userId).join("") + "</td></tr></table>";
                })
                .catch((res) => {
                    console.log(res);
                })
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js"
        integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>