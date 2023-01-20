// Function to define innerHTML for HTML table
function show(dimensionAndMetricsData) {
    console.log(dimensionAndMetricsData.rows[0]);

    // gettting top locations data ..................

    const locationData = document.querySelector("#locationData");
    for (let topLocation of dimensionAndMetricsData.rows) {
        // console.log(topLocation)
        locationData.innerHTML += `<tr>
        <td>${topLocation.dimensionValues[0].value}</td>
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
    document.getElementById("avgUserSession").innerHTML =
avgUserSession.toFixed(1);
    document.getElementById("bounceRate").innerHTML = bounceRate.toFixed(2);
}

function show3(TopPagesData) {
    // console.log(TopPagesData.rows[1]);

    // gettting top pages data ..................

    const PagesData = document.querySelector("#topPages");
    for (let topPagesData of TopPagesData.rows) {
        // console.log(topPagesData)
        PagesData.innerHTML += `<tr>
    <td>${topPagesData.dimensionValues[0].value}</td>
    <td>${topPagesData.metricValues[0].value}</td>
    <td>${topPagesData.dimensionValues[1].value}</td>
    
    </tr>`;
    }

    // end of top locations data ..................
}

// ....... Showing trafficSource data  .............

function show4(trafficSource) {
    console.log(trafficSource.rows[0].dimensionValues[0].value);
    console.log(trafficSource.rows[0].metricValues[0].value);
    console.log(trafficSource.rows[1].dimensionValues[0].value);
    console.log(trafficSource.rows[1].metricValues[0].value);
    console.log(trafficSource.rows[2].dimensionValues[0].value);
    console.log(trafficSource.rows[2].metricValues[0].value);
    console.log(trafficSource.rows[3].dimensionValues[0].value);
    console.log(trafficSource.rows[3].metricValues[0].value);
    console.log(trafficSource.rows[4].dimensionValues[0].value);
    console.log(trafficSource.rows[4].metricValues[0].value);
    console.log(trafficSource.rows[5].dimensionValues[0].value);
    console.log(trafficSource.rows[5].metricValues[0].value);

    let Direct = trafficSource.rows[0].metricValues[0].value;
    let sogou = trafficSource.rows[1].metricValues[0].value;
    let baidu = trafficSource.rows[2].metricValues[0].value;
    let google = trafficSource.rows[3].metricValues[0].value;
    let facebook = trafficSource.rows[4].metricValues[0].value;

    var yValues = [Direct, sogou,baidu, google,facebook];
    var xValues = ["Direct", "sogou","baidu", "google","facebook"];
    var barColors = ["#2b5797", "red", "#1e7145","#0dcaf0","#fd7e14"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [
                {     labels: xValues,
                    backgroundColor: barColors,
                    data: yValues,
                },
            ],
        },
    });
}

// .............end .................

// ....... Showing Device Category data in id of pychart .............
function show2(DimensionsData) {
    console.log(DimensionsData.rows);
    let DesktopData = DimensionsData.rows[0].metricValues[0].value;
    let MobileData = DimensionsData.rows[1].metricValues[0].value;
    let TabletData = DimensionsData.rows[2].metricValues[0].value;

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


