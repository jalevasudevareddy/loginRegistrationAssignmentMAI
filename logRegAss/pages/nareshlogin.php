<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Drawer</title>
    <link rel="stylesheet" href="../css/nareshlogin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div>

        <h1 class="text-center bg-primary text-white pt-3 pb-3 mb-0"><a href="#" onclick="resetPage() " class="text-decoration-none text-white">Home page</a></h1>

        <img class="menu-button" id="" src="../images/menu_button.png" onclick="togglePanelDrawer()">
        <div id="panelDrawer" class="panel-drawer bg-primary pt-2">
            <div class="pl-2">
                <h3 class="text-white">&nbsp;Pages</h3>
                <ul class="text-white">
                    <li><strong><a class="text-white" href="#" onclick="openRegisterPage()">Register Page</a></strong></li>
                    <li><strong><a class="text-white" href="#" onclick="openLoginPage()">Login Page</a></strong></li>
                    <li>
                        <strong><a class="text-white" href="#" onclick="openForgotPage()">Forgot Page</a></strong>
                    </li>
                </ul>
            </div>
        </div>
        <div id="iframeContainer" class="iframe-container"></div>
        <div id="iframeContainer1" class="iframe-container1"></div>
        <div id="iframeContainer2" class="iframe-container2"></div>
    </div>

    <script>
        function togglePanelDrawer() {
            var panelDrawer = document.getElementById('panelDrawer');
            panelDrawer.classList.toggle('open'); // Toggle the open class on panel drawer
        }

        function openRegisterPage() {
            var panelDrawer = document.getElementById('panelDrawer');
            var iframeContainer = document.getElementById('iframeContainer');
            var iframeContainer1 = document.getElementById('iframeContainer1');
            var iframeContainer2 = document.getElementById('iframeContainer2');

            // Clear content of iframeContainer1 if it's active
            iframeContainer1.innerHTML = '';
            iframeContainer1.classList.remove('active');

            iframeContainer2.innerHTML = '';
            iframeContainer2.classList.remove('active');

            iframeContainer.classList.add('active'); // Show the iframe
            iframeContainer.innerHTML = `<iframe class="iframe-content" src="../pages/register.php"></iframe>`;
            panelDrawer.classList.remove('open'); // Close the panel drawer
        }

        function openLoginPage() {
            var panelDrawer = document.getElementById('panelDrawer');
            var iframeContainer = document.getElementById('iframeContainer');
            var iframeContainer1 = document.getElementById('iframeContainer1');
            var iframeContainer2 = document.getElementById('iframeContainer2');

            // Clear content of iframeContainer if it's active
            iframeContainer.innerHTML = '';
            iframeContainer.classList.remove('active');

            iframeContainer2.innerHTML = '';
            iframeContainer2.classList.remove('active');

            iframeContainer1.classList.add('active'); // Show the iframe
            iframeContainer1.innerHTML = `<iframe class="iframe-content1" src="../login.php"></iframe>`;
            panelDrawer.classList.remove('open'); // Close the panel drawer
        }

        function openForgotPage() {
            var panelDrawer = document.getElementById('panelDrawer');
            var iframeContainer = document.getElementById('iframeContainer');
            var iframeContainer1 = document.getElementById('iframeContainer1');
            var iframeContainer2 = document.getElementById('iframeContainer2');

            // Clear content of other iframeContainers if they're active
            iframeContainer.innerHTML = '';
            iframeContainer.classList.remove('active');

            iframeContainer1.innerHTML = '';
            iframeContainer1.classList.remove('active');

            // Add active class to iframeContainer2 and load the forgot password page
            iframeContainer2.classList.add('active');
            iframeContainer2.innerHTML = `<iframe class="iframe-content2" src="forgotpw.php"></iframe>`;

            // Close the panel drawer
            panelDrawer.classList.remove('open');
        }

        function resetPage() {
            var panelDrawer = document.getElementById('panelDrawer');
            var iframeContainer = document.getElementById('iframeContainer');
            var iframeContainer1 = document.getElementById('iframeContainer1');
            var iframeContainer2 = document.getElementById('iframeContainer2');

            // Clear content of all iframeContainers
            iframeContainer.innerHTML = '';
            iframeContainer.classList.remove('active');

            iframeContainer1.innerHTML = '';
            iframeContainer1.classList.remove('active');

            iframeContainer2.innerHTML = '';
            iframeContainer2.classList.remove('active');

            // Close the panel drawer
            panelDrawer.classList.remove('open');
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/fontawesome.min.js" integrity="sha512-C8qHv0HOaf4yoA7ISuuCTrsPX8qjolYTZyoFRKNA9dFKnxgzIHnYTOJhXQIt6zwpIFzCrRzUBuVgtC4e5K1nhA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>