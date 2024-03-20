$(document).ready(function () {
  $(document).on("click", ".accept-btn", function () {
    var userId = $(this).data("id");
    var action = "Accepted";
    updateAction(userId, action);
  });

  $(document).on("click", ".reject-btn", function () {
    var userId = $(this).data("id");
    var action = "Rejected";
    updateAction(userId, action);
  });

  $(document).on("click", ".delete-btn", function () {
    var userId = $(this).data("id");
    var action = "delete";
    updateAction(userId, action);
  });

  function updateAction(userId, action) {
    $.post(action + "_user.php", { id: userId }, function (data) {
      alert(data); // Display success or error message
      $("#userTable").load("fetch_users.php"); // Reload the table
      $("#rejTable").load("rejected_users.php"); // Reload the table
      makechart();
    });
  }
  // Function to load rejected users when "Rejected" tab is clicked
  $("#pills-rejected-tab").on("click", function () {
    $.get("rejected_users_data.php", function (data) {
      $("#pills-rejected").html(data); // Load rejected users dynamically
    });
  });
  // Function to load rejected users when "Rejected" tab is clicked
  $("#pills-contact-tab").on("click", function () {
    $.get("accepted_users_data.php", function (data) {
      $("#pills-contact").html(data); // Load accepted users dynamically
    });
  });

  // const logoutChannel = new BroadcastChannel('logout_channel');

  // // Logout button click event
  // $("#logout-btn").on("click", function () {
  //     // Set the logout flag in localStorage
  //     window.localStorage.setItem('logout', 'true');
  //     // Broadcast the logout event to other tabs
  //     logoutChannel.postMessage('logout');
  // });

  // // Listen for logout events from other tabs
  // logoutChannel.onmessage = function (event) {
  //     // If a logout event is received, redirect to the login page
  //     window.location.href = '../login.php';
  // };

  // Logout button click event
  $("#logout-btn").on("click", function () {
    // Set the logout flag in localStorage
    window.localStorage.setItem("logout", "true");
  });

  // Function to check for logout event
  function checkLogout() {
    if (window.localStorage.getItem("logout") === "true") {
      // Clear the logout flag
      window.localStorage.removeItem("logout");
      // Reload the page
      window.location.reload();
    }
  }

  // Check for logout event periodically
  setInterval(checkLogout, 1000);

  makechart();

  function makechart() {
    $.ajax({
      url: "chart_data.php",
      method: "POST",
      data: { action: "fetch" },
      dataType: "JSON",
      success: function (data) {
        var action = [];
        var total = [];
        var color = [];

        for (var count = 0; count < data.length; count++) {
          action.push(data[count].action);
          total.push(data[count].total);
          color.push(data[count].color);
        }

        var chart_data = {
          labels: action,
          datasets: [
            {
              label: "Accepted",
              backgroundColor: color,
              color: "#fff",
              data: total,
            },
          ],
        };

        var options = {
          responsive: true,
          scales: {
            yAxes: [
              {
                ticks: {
                  min: 0,
                },
              },
            ],
          },
        };

        var group_chart1 = $("#pie_chart");

        var graph1 = new Chart(group_chart1, {
          type: "pie",
          data: chart_data,
        });

        var group_chart2 = $("#doughnut_chart");

        var graph2 = new Chart(group_chart2, {
          type: "doughnut",
          data: chart_data,
        });

        var group_chart3 = $("#bar_chart");

        var graph3 = new Chart(group_chart3, {
          type: "bar",
          data: chart_data,
          options: options,
        });
      },
    });
  }

  var total = [];

  function fetchChartData() {
    $.ajax({
      url: "chart_data.php",
      method: "POST",
      data: { action: "fetch" },
      dataType: "JSON",
      success: function (data) {
        var action = [];
        var total = [];
        var color = [];

        for (var count = 0; count < data.length; count++) {
          action.push(data[count].action);
          total.push(data[count].total);
          color.push(data[count].color);
        }

        var acpt = parseInt(total[0]);
        var rej = parseInt(total[1]);

        // Initialize Highcharts after fetching data
        Highcharts.chart("container", {
          chart: {
            type: "pie",
          },
          title: {
            text: "Action Analysis",
          },
          tooltip: {
            valueSuffix: "%",
          },
          // subtitle: {
          //   text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>',
          // },
          plotOptions: {
            series: {
              allowPointSelect: true,
              cursor: "pointer",
              dataLabels: [
                {
                  enabled: true,
                  distance: 20,
                },
                {
                  enabled: true,
                  distance: -40,
                  format: "{point.percentage:.1f}%",
                  style: {
                    fontSize: "1.2em",
                    textOutline: "none",
                    opacity: 0.7,
                  },
                  filter: {
                    operator: ">",
                    property: "percentage",
                    value: 10,
                  },
                },
              ],
            },
          },
          series: [
            {
              name: "Percentage",
              colorByPoint: true,
              data: [
                {
                  name: "Accepted",
                  y: acpt,
                },
                {
                  name: "Rejected",
                  sliced: true,
                  selected: true,
                  y: rej,
                },
              ],
            },
          ],
        });
      },
    });
  }
  // Call fetchChartData initially
  fetchChartData();

  function fetchTemparatureChartData() {
    $.ajax({
      url: "temparaturechart.php",
      method: "POST",
      data: { action: "fetch" },
      dataType: "JSON",
      success: function (data) {
        var firstname = [];
        var class1 = [];
        var class2 = [];
        var class3 = [];

        for (var count = 0; count < data.length; count++) {
          firstname.push(data[count].firstname);
          class1.push(parseInt(data[count].class1));
          class2.push(parseInt(data[count].class2));
          class3.push(parseInt(data[count].class3));
        }
        // console.log(class1);
        // console.log(class2);
        // console.log(class3);
        Highcharts.chart("container1", {
          chart: {
            type: "spline",
          },
          title: {
            text: "Marks Analysis",
          },
          // subtitle: {
          //   text:
          //     "Source: " +
          //     '<a href="https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature" ' +
          //     'target="_blank">Wikipedia.com</a>',
          // },
          xAxis: {
            categories: ["class1", "class2", "class3"],
            accessibility: {
              description: "Months of the year",
            },
          },
          yAxis: {
            title: {
              text: "Marks",
            },
            labels: {
              format: "{value}",
            },
          },
          tooltip: {
            crosshairs: true,
            shared: true,
          },
          plotOptions: {
            spline: {
              marker: {
                radius: 4,
                lineColor: "#666666",
                lineWidth: 1,
              },
            },
          },
          series: [
            {
              name: firstname[0],
              marker: {
                symbol: "square",
              },
              data: class1,
            },
            {
              name: firstname[1],
              marker: {
                symbol: "diamond",
              },
              data: class2,
            },
            {
              name: firstname[2],
              marker: {
                symbol: "circle",
              },
              data: class3,
            },
          ],
        });
      },
    });
  }

  fetchTemparatureChartData();

  function fetchTemperatureStockpilesData() {
    fetch("userMarks.php")
      .then(function (response) {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then(function (data) {
        // Check if data is not empty
        if (Object.keys(data).length === 0 && data.constructor === Object) {
          throw new Error("Empty response");
        }
        // Assuming data is an object, you might want to handle it accordingly
        // alert(JSON.stringify(data));
        var firstname = [];
        var class1 = [];
        var class2 = [];
        var class3 = [];

        for (var count = 0; count < data.length; count++) {
          firstname.push(data[count].firstname);
          class1.push(parseInt(data[count].class1));
          class2.push(parseInt(data[count].class2));
          class3.push(parseInt(data[count].class3));
        }
        Highcharts.chart("container2", {
          chart: {
            type: "area",
          },
          accessibility: {
            description:
              "Image description: An area chart compares the nuclear stockpiles of the USA and the USSR/Russia between 1945 and 2017. The number of nuclear weapons is plotted on the Y-axis and the years on the X-axis. The chart is interactive, and the year-on-year stockpile levels can be traced for each country. The US has a stockpile of 6 nuclear weapons at the dawn of the nuclear age in 1945. This number has gradually increased to 369 by 1950 when the USSR enters the arms race with 6 weapons. At this point, the US starts to rapidly build its stockpile culminating in 32,040 warheads by 1966 compared to the USSR’s 7,089. From this peak in 1966, the US stockpile gradually decreases as the USSR’s stockpile expands. By 1978 the USSR has closed the nuclear gap at 25,393. The USSR stockpile continues to grow until it reaches a peak of 45,000 in 1986 compared to the US arsenal of 24,401. From 1986, the nuclear stockpiles of both countries start to fall. By 2000, the numbers have fallen to 10,577 and 21,000 for the US and Russia, respectively. The decreases continue until 2017 at which point the US holds 4,018 weapons compared to Russia’s 4,500.",
          },
          title: {
            text: "Marks Anlysis",
          },
          // subtitle: {
          //   text:
          //     'Source: <a href="https://fas.org/issues/nuclear-weapons/status-world-nuclear-forces/" ' +
          //     'target="_blank">FAS</a>',
          // },
          xAxis: {
            allowDecimals: false,
            accessibility: {
              rangeDescription: "Range: 1940 to 2017.",
            },
          },
          yAxis: {
            title: {
              text: "Nuclear weapon states",
            },
          },
          tooltip: {
            pointFormat:
              "{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}",
          },
          plotOptions: {
            area: {
              pointStart: 1,
              marker: {
                enabled: false,
                symbol: "circle",
                radius: 2,
                states: {
                  hover: {
                    enabled: true,
                  },
                },
              },
            },
          },
          series: [
            {
              name: "class1",
              data: class1,
            },
            {
              name: "class2",
              data: class2,
            },
            {
              name: "class3",
              data: class3,
            },
          ],
        });
      })
      .catch(function (error) {
        console.error("Error fetching temperature data:", error);
      });

    // $.ajax({
    //   url: "temparaturechart.php",
    //   method: "POST",
    //   data: { action: "fetch" },
    //   dataType: "JSON",
    //   success: function (data) {
    //     var firstname = [];
    //     var class1 = [];
    //     var class2 = [];
    //     var class3 = [];

    //     for (var count = 0; count < data.length; count++) {
    //       firstname.push(data[count].firstname);
    //       class1.push(parseInt(data[count].class1));
    //       class2.push(parseInt(data[count].class2));
    //       class3.push(parseInt(data[count].class3));
    //     }
    //     // Data retrieved from https://fas.org/issues/nuclear-weapons/status-world-nuclear-forces/
    //   },
    // });
  }
  fetchTemperatureStockpilesData();
});
