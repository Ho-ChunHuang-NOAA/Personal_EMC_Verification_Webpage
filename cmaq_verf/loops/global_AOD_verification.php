
<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>CMAQ</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions_global_AOD_verification.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>



<!-- Head element -->
<div class="page-top">
	<span><a style="color:#ffffff">COMMUNITY MULTISCALE AIR QUALITY (CMAQ) MODELING SYSTEM</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
	
        <div class="element">
                <span class="bold">Year:</span>
                <select id="annual" onchange="changeAnnual(this.value);"></select>
        </div> 

        <div class="element">
                <span class="bold">Month:</span>
                <select id="month" onchange="changeMonth(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Model:</span>
                <select id="model" onchange="changeModel(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Statistics:</span>
                <select id="variable" onchange="changeVariable(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Cycle:</span>
                <select id="cycle" onchange="changeCycle(this.value)"></select>
        </div> 
        <div class="element">
                <span class="bold">Satellite:</span>
                <select id="satellite" onchange="changeSatellite(this.value)"></select>
        </div>
<!-- /Top menu -->
</div></div>

<!-- Middle menu -->
<div class="page-middle" id="page-middle">
Left/Right arrow keys = Change statistic | Up/Down arrow keys = Change hourly average
<br>For additional information on this image, <button class="infobutton" id="myBtn">click here</button>
<div id="myModal" class="modal">
  <div class="modal-content" style="font-size:130%;">
    <span class="close">&times;</span>
    Additional Image Information
    <embed width=100% height=90% src="gefs_info.php">
  </div>
</div>
<!-- /Middle menu -->
</div>

<div id="loading"><img style="width:100%" src="loading.png"></div>

<!-- Image -->
<div id="page-map">
	<image name="map" style="width:100%">
</div>

<!-- /Footer -->
<div class="page-footer">
        <span></div>


<script type="text/javascript">
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
//====================================================================================================
//User-defined variables
//====================================================================================================

//Global variables
var minFrame = 0; //Minimum frame for every variable
var maxFrame = 26; //Maximum frame for every variable
var incrementFrame = 1; //Increment for every frame

var startFrame = 0; //Starting frame

var cycle = 2018100600;

/*
When constructing the URL below, DDD = domain, VVV = variable, LLL = level, SSS = season, Y = frame number.
For X and Y, labeling one X or Y represents an integer (e.g. 0, 10, 20). Multiple of these represent a string
format (e.g. XX = 00, 06, 12 --- XXX = 000, 006, 012).
*/

var url = "https://www.emc.ncep.noaa.gov/mmb/aq/verification_diagnostics/MET/YYYYMM/NNN_SSS_VVV_CC.png";
// var url = "https://www.emc.ncep.noaa.gov/gmb/yluo/test/ECMWF/DDDzLLL_VVV_SSS.gif";
/* var url = "https://www.emc.ncep.noaa.gov/mmb/gmanikin/fv3gfs/20180301/fv3_DDD_VVV_2018030100_0Y.png"; */
/*  var url = "https://www.emc.ncep.noaa.gov/users/Alicia.Bentley/fv3gefs/2018030100/images/DDD/mean_diff/VVV_Y.png"; */

//====================================================================================================
//Add variables & domains
//====================================================================================================
var annuals = [];
var months = [];
var models = [];
var variables = [];
var cycles = [];
var satellites = [];


annuals.push({
        displayName: "2022",
        name: "2022",
});
annuals.push({
        displayName: "2021",
        name: "2021",
});
annuals.push({
        displayName: "2020",
        name: "2020",
});
annuals.push({
        displayName: "2019",
        name: "2019",
});
//        displayName: "2019",
//        name: "2019",
//});

months.push({
        displayName: "January",
        name: "01",
});
months.push({
        displayName: "February",
        name: "02",
});
months.push({
        displayName: "March",
        name: "03",
});
months.push({
        displayName: "April",
        name: "04",
});
months.push({
        displayName: "May",
        name: "05",
});
months.push({
        displayName: "June",
        name: "06",
});
months.push({
        displayName: "July",
        name: "07",
});
months.push({
        displayName: "August",
        name: "08",
});
months.push({
        displayName: "September",
        name: "09",
});
months.push({
        displayName: "October",
        name: "10",
});
months.push({
        displayName: "November",
        name: "11",
});
months.push({
        displayName: "December",
        name: "12",
});

models.push({
        displayName: "Retro",
        name: "RETROS",
});
models.push({
        displayName: "Production",
        name: "PROD",
});


variables.push({
        displayName: "FCST - Obs.",
        name: "FCSTMINUSOBS",
});
variables.push({
        displayName: "Forecast Mean",
        name: "seriescntFBAR",
});
variables.push({
        displayName: "Observational Mean",
        name: "seriescntOBAR",
});
variables.push({
        displayName: "Root Mean Squared Error",
        name: "seriescntRMSE",
});
variables.push({
        displayName: "Mean Absolute Deviation",
        name: "seriescntMAD",
});
variables.push({
        displayName: "Mean Absolute Error",
        name: "seriescntMAE",
});
variables.push({
        displayName: "Mean Error",
        name: "seriescntME",
});
variables.push({
        displayName: "Mean Squared Error",
        name: "seriescntMSE",
});
variables.push({
        displayName: "Standard Dev. of the Error",
        name: "seriescntESTDEV",
});
variables.push({
        displayName: "Bias-Corrected MSE",
        name: "seriescntBCMSE",
});
variables.push({
        displayName: "Pearson Correlation Coefficient",
        name: "seriescntPRCORR",
});
variables.push({
        displayName: "Spearman's Rank Correlation Coefficient",
        name: "seriescntSPCORR",
});
variables.push({
        displayName: "Kendall's tau stat.",
        name: "seriescntKTCORR",
});
variables.push({
        displayName: "10th Percentile of the Error",
        name: "seriescntE10",
});
variables.push({
        displayName: "25th Percentile of the Error",
        name: "seriescntE25",
});
variables.push({
        displayName: "50th Percentile of the Error",
        name: "seriescntE50",
});
variables.push({
        displayName: "75th Percentile of the Error",
        name: "seriescntE75",
});
variables.push({
        displayName: "90th Percentile of the Error",
        name: "seriescntE90",
});
variables.push({
        displayName: "Total Number of Matched Pairs",
        name: "seriescntTOTAL",
});
variables.push({
        displayName: "CSI AOD >= 0.2",
        name: "seriesctsCSIge0p2",
});
variables.push({
        displayName: "CSI AOD >= 0.4",
        name: "seriesctsCSIge0p4",
});
variables.push({
        displayName: "FAR AOD >= 0.2",
        name: "seriesctsFARge0p2",
});
variables.push({
        displayName: "FAR AOD >= 0.4",
        name: "seriesctsFARge0p4",
});
variables.push({
        displayName: "GSS AOD >= 0.2",
        name: "seriesctsGSSge0p2",
});
variables.push({
        displayName: "GSS AOD >= 0.4",
        name: "seriesctsGSSge0p4",
});
variables.push({
        displayName: "FRATE AOD >= 0.2",
        name: "seriesfhoFRATEge0p2",
});
variables.push({
        displayName: "FRATE AOD >= 0.4",
        name: "seriesfhoFRATEge0p4",
});
variables.push({
        displayName: "ORATE AOD >= 0.2",
        name: "seriesfhoORATEge0p2",
});
variables.push({
        displayName: "ORATE AOD >= 0.4",
        name: "seriesfhoORATEge0p4",
});
variables.push({
        displayName: "TOTAL AOD >= 0.2",
        name: "seriesfhoTOTALge0p2",
});
variables.push({
        displayName: "TOTAL AOD >= 0.4",
        name: "seriesfhoTOTALge0p4",
});
variables.push({
        displayName: "AOD Thresholds (Number of Points)",
        name: "AODThreshDistribution",
});

cycles.push({
        displayName: "00",
        name: "00",
});
cycles.push({
        displayName: "06",
        name: "06",
});
cycles.push({
        displayName: "12",
        name: "12",
});
cycles.push({
        displayName: "18",
        name: "18",
});


satellites.push({
        displayName: "VIIRS",
        name: "VIIRS",
});
//validtimes.push({
//        displayName: "06z",
//        name: "06",
//});
// validtimes.push({
//        displayName: "12z",
//        name: "12",
//});



//====================================================================================================
//Initialize the page
//====================================================================================================

//function for keyboard controls
document.onkeydown = keys;

//Decare object containing data about the currently displayed map
imageObj = {};

//Initialize the page
initialize();

//Format initialized run date & return in requested format
function formatDate(offset,format){
	var newdate = String(cycle);
	var yyyy = newdate.slice(0,4);
	var mm = newdate.slice(4,6);
	var dd = newdate.slice(6,8);
	var hh = newdate.slice(8,10);
	var curdate = new Date(yyyy,parseInt(mm)-1,dd,hh);
	
	//Offset by run
	var newOffset = curdate.getHours() + offset;
	curdate.setHours(newOffset);
	
	var yy = String(curdate.getFullYear()).slice(2,4);
	yyyy = curdate.getFullYear();
	mm = curdate.getMonth()+1;
	dd = curdate.getDate();
	if(dd < 10){dd = "0" + dd;}
	hh = curdate.getHours();
	if(hh < 10){hh = "0" + hh;}
	
	var wkday = curdate.getDay();
	var day_str = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
	
	//Return in requested format
	if(format == 'valid'){
		//06Z Thu 03/22/18 (90 h)
		var txt = hh + "Z " + day_str[wkday] + " " + mm + "/" + dd + "/" + yy;
		return txt;
	}
}

//Initialize the page
function initialize(){
	
	//Set image object based on default variables
	imageObj = {
                annual: "2022",
                month: "01",
                model: "PROD",
		variable: "FCSTMINUSOBS",
                satellite: "VIIRS",
                cycle: "00",
                frame: startFrame,
	};
	
        //Change domain based on passed argument, if any
//        var passed_domain = "";
//        if(passed_domain!=""){
//                if(searchByName(passed_domain,domains)>=0){
//                        imageObj.domain = passed_domain;
//                }
//        }

        //Change variable based on passed argument, if any
        var passed_variable = "";
        if(passed_variable!=""){
                if(searchByName(passed_variable,variables)>=0){
                        imageObj.variable = passed_variable;
                }
        }

	
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('annual');
	populateMenu('month');
        populateMenu('model');
        populateMenu('variable');
        populateMenu('satellite');
        populateMenu('cycle');
	//Populate the frames arrays
	frames = [];
	for(i=minFrame;i<=maxFrame;i=i+incrementFrame){frames.push(i);}
	
	//Predefine empty array for preloading images
	for(i=0; i<variables.length; i++){
		variables[i].images = [];
		variables[i].loaded = [];
		variables[i].dprog = [];
	}
	
	//Preload images and display map
	preload(imageObj);
	showImage();
	
	//Update mobile display for swiping
	updateMobile();

}

var xInit = null;                                                        
var yInit = null;                  
var xPos = null;
var yPos = null;


</script>


</body></html>
