<?php
// include_once '../includes/db.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('location: ../login.php');
    exit();
}
// Set cache control headers to prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboardcontent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body>
    <div class="con">
        <div class="container" id="dashboard">
            <div class="d-flex justify-content-end">
                <a id="logout-btn" href="../pages/logout.php" class="btn btn-primary">Logout</a>
            </div>
            <h2 class="text-center mt-5 mb-4" id="act-ana">Welcome to Dashboard</h2>
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">New User</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Accepted</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-rejected-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-rejected" type="button" role="tab" aria-controls="pills-rejected"
                        aria-selected="false">Rejected</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <?php include 'fetch_users.php'; ?>
                    <h2 class="text-center mt-5 mb-4" id="act-ana">Action Analysis</h2>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-header">Pie Chart</div>
                                    <div class="card-body">
                                        <div class="chart-container pie-chart">
                                            <canvas id="pie_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-header">Doughnut Chart</div>
                                    <div class="card-body">
                                        <div class="chart-container pie-chart">
                                            <canvas id="doughnut_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mt-4 mb-4">
                                    <div class="card-header">Bar Chart</div>
                                    <div class="card-body">
                                        <div class="chart-container pie-chart">
                                            <canvas id="bar_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-header">Pie Chart Using Highcharts</div>
                                    <figure class="highcharts-figure">
                                        <div id="container" style="height: 400px;"></div>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-header">Line Using Highcharts</div>
                                    <figure class="highcharts-figure">
                                        <div id="container1" style="height: 400px;"></div>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mt-4">
                                    <div class="card-header">Stockpiles Highcharts</div>
                                    <figure class="highcharts-figure">
                                        <div id="container2" style="height: 400px;"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <?php include '../pages/register.php'; ?>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php include 'accepted_users_data.php'; ?>
                </div>
                <div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab">
                    <?php include 'rejected_users_data.php'; ?>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/fontawesome.min.js"
        integrity="sha512-C8qHv0HOaf4yoA7ISuuCTrsPX8qjolYTZyoFRKNA9dFKnxgzIHnYTOJhXQIt6zwpIFzCrRzUBuVgtC4e5K1nhA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../js/dashboardcontent.js"></script>
</body>

</html>