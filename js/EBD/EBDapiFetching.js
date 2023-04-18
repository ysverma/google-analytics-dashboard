// api url
const dimensionAndMetrics = "https://analyticsdashboard.dotzoo.net/api/Edmonds_Bay_Dental/EBDRunReport.php";
const metrics = "https://analyticsdashboard.dotzoo.net/api/Edmonds_Bay_Dental/EBDmetrics.php";
const deviceCategory = "https://analyticsdashboard.dotzoo.net/api/Edmonds_Bay_Dental/EBDdeviceCategory.php";
const topPages = "https://analyticsdashboard.dotzoo.net/api/Edmonds_Bay_Dental/EBDtopPages.php";
const trafficSource = "https://analyticsdashboard.dotzoo.net/api/Edmonds_Bay_Dental/EBDtrafficSource.php";
const searchConsole = "https://analyticsdashboard.dotzoo.net/api/Edmonds_Bay_Dental/EBDsearchConsole.php";

// ............Using dimensionAndMetrics.........


// Defining async function
async function getapi(url) {
    // Storing response
    const response = await fetch(url);

    // Storing data in form of JSON
    var dimensionAndMetricsData = await response.json();
    // console.log(dimensionAndMetricsData.rows[1]);
    if (response) {
        hideloader();
    }
    show(dimensionAndMetricsData);
}
// Calling that async function
getapi(dimensionAndMetrics);

// Function to hide the loader
function hideloader() {
    document.getElementById("loading").style.display = "none";
}

//****************** */.End of Using dimensionAndMetrics.....*******************..


// web traffic data.
// ******************  start of Using getMetricsApi *******************..
// Defining async function
async function getMetricsApi(metricsUrl) {
    // Storing result
    const result = await fetch(metricsUrl);

    // Storing data in form of JSON
    var Metricsdata = await result.json();
    // console.log(Metricsdata.rows[1]);
    if (result) {
        hideloader2();
    }
    show1(Metricsdata);
}
// Calling that async function
getMetricsApi(metrics);

// Function to hide the loader
function hideloader2() {
    document.getElementById("loading").style.display = "none";
}

// ............End of Using getMetricsApi.........

// Defining async function
async function getDimensionsApi(dimensionsUrl) {
    // Storing result
    const dimensionResult = await fetch(dimensionsUrl);

    // Storing data in form of JSON
    var DimensionsData = await dimensionResult.json();
    // console.log(DimensionsData.rows[1]);
    if (dimensionResult) {
        hideloader2();
    }
    show2(DimensionsData);
}
// Calling that async function
getDimensionsApi(deviceCategory);

// Function to hide the loader
function hideloader2() {
    document.getElementById("loading").style.display = "none";
}

// ............End of Using getDimensionsApi for gettting data of deviceCategory.........

// Defining async function
async function getTrafficSourceApi(trafficSourceUrl) {
    // Storing result
    const trafficSourceResult = await fetch(trafficSourceUrl);

    // Storing data in form of JSON
    var trafficSourceData = await trafficSourceResult.json();
    // console.log(trafficSourceData.rows[1]);
    if (trafficSourceResult) {
        hideloader2();
    }
    show4(trafficSourceData);
}
// Calling that async function
getTrafficSourceApi(trafficSource);

// Function to hide the loader
function hideloader2() {
    document.getElementById("loading").style.display = "none";
}

// ............End of Using getDimensionsApi for gettting data of deviceCategory.........

// Defining async function
async function getTopPagesApi(topPagesURL) {
    // Storing result
    const topPagesResult = await fetch(topPagesURL);

    // Storing data in form of JSON
    var TopPagesData = await topPagesResult.json();
    // console.log(TopPagesData.rows[1]);
    if (topPagesResult) {
        hideloader2();
    }
    show3(TopPagesData);
}
// Calling that async function
getTopPagesApi(topPages);

// Function to hide the loader
function hideloader2() {
    document.getElementById("loading").style.display = "none";
}

// ............End of Using getDimensionsApi.........

// Defining async function for Get search console 
// async function getSearchConsoleApi(searchConsoleURL) {
//     // Storing result
//     const searchConsoleResult = await fetch(searchConsoleURL);

//     // Storing data in form of JSON
//     var searchConsoleData = await searchConsoleResult.json();
//     // console.log(searchConsoleData);
//     if (searchConsoleResult) {
//         hideloader2();
//     }
//     show5(searchConsoleData);
// }
// // Calling that async function
// getSearchConsoleApi(searchConsole);

// // Function to hide the loader
// function hideloader2() {
//     document.getElementById("loading").style.display = "none";
// }

// ............End of Using getSearchConsoleApi.........