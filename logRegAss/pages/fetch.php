<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Titles</title>
</head>

<body>
    <button onClick="fnGetTitlesAsList()">Get Titles As Unorderd List</button><br><br>
    <button onClick="fnGetTitlesAsTable()">Get Titles As Table</button><br><br>
    <button onClick="fnGetUsers()">Get Users As Table</button><br><br>

    <div id="output1"></div>
    <div id="output2"></div>
    <div id="output3"></div>

    <script>
        const fnGetTitlesAsList = () => {
            fetch("https://jsonplaceholder.typicode.com/posts", { method: "GET" })
                .then((res) => {
                    return res.json();
                })
                .then((data) => {
                    console.log(typeof (data));
                    console.log(data);
                    let titlesAndUserIds = data.map(post =>
                        ({ title: post.title, userId: post.id })
                    );
                    console.log(titlesAndUserIds)
                    document.getElementById("output1").innerHTML = "<h2>Titles:</h2><ul>" + titlesAndUserIds.map((post) => "<li>" + post.userId + " " + post.title + "</li>").join("") + "</ul>";
                })
                .catch((error) => {
                    console.log(error);
                });
        }
        const fnGetTitlesAsTable = () => {
            fetch("https://jsonplaceholder.typicode.com/posts", { method: "GET" })
                .then((res) => {
                    return res.json();
                })
                .then((data) => {
                    let tdata = data.map(post => {
                        return ({ id: post.id, title: post.title, userId: post.userId })
                    })
                    console.log(tdata[0].id + " " + tdata[0].title)
                    document.getElementById("output1").innerHTML = "<table border=1px><tr><th>Id</th><th>Title</th><th>User Id</th></tr>" + tdata.map((post) => "<tr><td>" + post.id + "</td><td>" + post.title + "</td><td>" + post.userId).join("") + "</td></tr></table>";
                })
                .catch((error) => {
                    console.log(error);
                })
        }
        const fnGetUsers = () => {
            fetch("fetchusers.php", { method: "GET" })
                .then((res) => res.json())
                .then((data) => {
                    console.log(data);
                    let tableHTML = "<table border='1'><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Action</th><th>Modify Action</th></tr>";

                    data.forEach(user => {
                        tableHTML += `<tr>
                            <td>${user.id}</td>
                            <td>${user.firstname}</td>
                            <td>${user.lastname}</td>
                            <td>${user.email}</td>
                            <td>${user.phone}</td>
                            <td>${user.action}</td>
                            <td>
                                <button onclick="performAction(${user.id}, 'Accept')">Accept</button>
                                <button onclick="performAction(${user.id}, 'Reject')">Reject</button>
                                <button onclick="performAction(${user.id}, 'Delete')">Delete</button>
                            </td>
                        </tr>`;
                    });

                    tableHTML += "</table>";
                    document.getElementById("output1").innerHTML = tableHTML;
                })
                .catch((error) => console.log(error));

        }
        function refreshUI() {
            fnGetUsers();
        }
        function performAction(id, action, callback) {
            fetch("perform_user_action.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ id: id, action: action })
            })
                .then(response => response.json())
                .then(data => {
                    // Handle response accordingly, maybe update UI
                    console.log(data);
                    fnGetUsers();
                })
                .catch(error => console.error("Error:", error));
        }

    </script>
</body>

</html>