function show(dimensionAndMetricsData) {
  console.log(dimensionAndMetricsData.rows[0]);

  // getting top locations data ..................

  const locationData = document.querySelector("#locationData");
  for (let topLocation of dimensionAndMetricsData.rows) {
    const metricValue = topLocation.metricValues[0].value;
    const progressBar = `<div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: ${metricValue}%" height: 150px; aria-valuenow="${metricValue}" aria-valuemin="0" aria-valuemax="100">${metricValue}</div>
                          </div>`;
    locationData.innerHTML += `<tr>
                                  <td>${topLocation.dimensionValues[0].value}
                                  ${progressBar}
                                  </td>
                                  <td>${topLocation.metricValues[0].value}</td>
                                </tr>`;
  }

  // end of top locations data ..................
}




function show1(Metricsdata) {
    console.log(Metricsdata.rows[0]);

    // getting web traffic data.........

    const totalVisitor = Metricsdata.rows[0].metricValues[0].value;
    const pageViews = Metricsdata.rows[0].metricValues[1].value;
    const avgUserSession = Metricsdata.rows[0].metricValues[2].value / 60;
    const bounceRate = Metricsdata.rows[0].metricValues[3].value * 100;
    document.getElementById("totalVisitor").innerHTML = totalVisitor;
    document.getElementById("pageViews").innerHTML = pageViews;
    document.getElementById("avgUserSession").innerHTML = avgUserSession.toFixed(1);
    document.getElementById("bounceRate").innerHTML = bounceRate.toFixed(2);
}
//<-*********** Start Toppages *************->
function show3(TopPagesData) {
    const table = $("#topPagesTable").DataTable({
        data: TopPagesData.rows,
        columns: [
            { data: "dimensionValues.0.value" },
            { data: "metricValues.0.value" },
            { data: "dimensionValues.1.value" },
        ]
    });
}

// <-********** end Toppages  ************ ->

// ....... Showing trafficSource data  .............

// function show4(trafficSource) {
 
//     let Direct = trafficSource?.rows?.[0]?.metricValues?.[0]?.value ?? 0;
//     let Sogou = trafficSource?.rows?.[1]?.metricValues?.[0]?.value ?? 0;
//     let Baidu = trafficSource?.rows?.[2]?.metricValues?.[0]?.value ?? 0;
//     let Google = trafficSource?.rows?.[3]?.metricValues?.[0]?.value ?? 0;
//     let Facebook = trafficSource?.rows?.[4]?.metricValues?.[0]?.value ?? 0;

//     var yValues = [Direct, Sogou, Baidu, Google, Facebook];
//     var xValues = ["Direct", "Sogou", "Baidu", "Google", "Facebook"];
//     var barColors = ["#2b5797", "red", "#1e7145", "#0dcaf0", "#fd7e14"];

//     new Chart("myChart", {
//         type: "bar",
//         data: {
//             labels: xValues,
//             datasets: [{
//                 labels: xValues,
//                 backgroundColor: barColors,
//                 data: yValues,
//             }, ],
//         },
//     });
// }

fetch('https://analyticsdashboard.dotzoo.net/api/IERM/IERM_Traffic_Source.php')
    .then(response => response.json())
  .then(data => {
    // Extract the data from the response
    const labels = data.rows.slice(0, 10).map(row => row.dimensionValues[0].value);
    const values = data.rows.slice(0, 10).map(row => row.metricValues[0].value);
    var barColors = [
                  'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(75, 192, 192, 0.7)',
            'rgba(153, 102, 255, 0.7)',
            'rgba(255, 159, 64, 0.7)',
            'rgba(25, 158, 64, 0.7)',
            'rgba(100, 160, 70, 0.7)',
          ];

    // Create a bar chart using Chart.js
    const chart = new Chart(document.getElementById('myChart'), {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Total Users',
          data: values,
          backgroundColor: barColors,
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(256, 158, 63, 1)',
            'rgba(200, 128, 83, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  })
  .catch(error => {
    // Handle errors
    console.error(error);
  });



// .............end .................

// ....... Showing Device Category data in id of pychart .............
function show2(DimensionsData) {
 // console.log(DimensionsData?.rows); // use optional chaining operator
  let DesktopData =
    DimensionsData?.rows?.[0]?.metricValues?.[0]?.value ?? 0; // use optional chaining and nullish coalescing operator
  let MobileData =
    DimensionsData?.rows?.[1]?.metricValues?.[0]?.value ?? 0; // use optional chaining and nullish coalescing operator
  let TabletData =
    DimensionsData?.rows?.[2]?.metricValues?.[0]?.value ?? 0; // use optional chaining and nullish coalescing operator

  var yValues = [DesktopData, MobileData, TabletData];
  var xValues = ["Desktop", "Mobile", "Tab"];
  var barColors = ["#2b5797", "red", "#1e7145"];

  new Chart("pychart", {
    type: "pie",
    data: {
      labels: xValues,
      datasets: [
        {
          backgroundColor: barColors,
          data: yValues,
        },
      ],
    },
  });
}


// .............end .................

// function show5(searchConsoleData) {
//   // console.log(searchConsoleData[2].query);

//     // gettting top pages data ..................

//     const consoleData = document.querySelector("#searchconsole");
//     for (let scData of searchConsoleData) {
//         // console.log(scData.query)
//         consoleData.innerHTML += `<tr>
//     <td>${scData.query}</td>
//     <td>${scData.clicks}</td>
//     <td>${scData.impressions}</td>
//     <td>${scData.position}</td>
//     </tr>`;
//     }

//   // end of search console data ..................
// }

