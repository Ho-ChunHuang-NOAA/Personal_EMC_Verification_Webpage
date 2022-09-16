
<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>CMAQ</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions_performance_diagrams.js"></script>
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
                <span class="bold">Day:</span>
                <select id="day" onchange="changeDay(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Region:</span>
                <select id="domain" onchange="changeDomain(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Variable:</span>
                <select id="field" onchange="changeField(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Diagram:</span>
                <select id="variable" onchange="changeVariable(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Forecast Cycle:</span>
                <select id="validtime" onchange="changeValidtime(this.value)"></select>
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

var url = "https://www.emc.ncep.noaa.gov/mmb/aq/verification_diagnostics/MET/YYYYMM/VVV_FFF_III_TTT_HH_DDD.png";

// var url = "https://www.emc.ncep.noaa.gov/gmb/yluo/test/ECMWF/DDDzLLL_VVV_SSS.gif";
/* var url = "https://www.emc.ncep.noaa.gov/mmb/gmanikin/fv3gfs/20180301/fv3_DDD_VVV_2018030100_0Y.png"; */
/*  var url = "https://www.emc.ncep.noaa.gov/users/Alicia.Bentley/fv3gefs/2018030100/images/DDD/mean_diff/VVV_Y.png"; */

//====================================================================================================
//Add variables & domains
//====================================================================================================

var annuals = [];
var months = [];
var days = [];
var domains = [];
var fields = [];
var variables = [];
var validtimes = [];
var indeps = [];


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

days.push({
        displayName: "Day 1",
        name: "Day1",
});
days.push({
        displayName: "Day 2",
        name: "Day2",
});
days.push({
        displayName: "Day 3",
        name: "Day3",
});

domains.push({
        displayName: "Appalachia",
        name: "APL",
});
domains.push({
        displayName: "Midwest",
        name: "MDW",
});
domains.push({
        displayName: "CONUS",
        name: "CONUS",
});
domains.push({
        displayName: "Eastern CONUS",
        name: "EAST",
});
domains.push({
        displayName: "Western CONUS",
        name: "WEST",
});
domains.push({
        displayName: "Northeast Coast",
        name: "NEC",
});
domains.push({
        displayName: "Northwest Coast",
        name: "NWC",
});
domains.push({
        displayName: "Southeast Coast",
        name: "SEC",
});
domains.push({
        displayName: "Southwest Coast",
        name: "SWC",
});
domains.push({
        displayName: "Lower Mississippi Valley",
        name: "LMV",
});
domains.push({
        displayName: "Great Basin",
        name: "GRB",
});
domains.push({
        displayName: "Southern Plains",
        name: "SPL",
});
domains.push({
        displayName: "Northern Plains",
        name: "NPL",
});
domains.push({
        displayName: "Northern Rockies",
        name: "NMT",
});
domains.push({
        displayName: "Southern Rockies",
        name: "SMT",
});
domains.push({
        displayName: "Southwest Desert",
        name: "SWD",
});
domains.push({
        displayName: "Gulf of Mexico",
        name: "GMC",
});
domains.push({
        displayName: "CMAQ Domain",
        name: "FULL",
});


fields.push({
        displayName: "Particulate Matter 2.5",
        name: "PMTF",
});
fields.push({
        displayName: "Daily Max. Particulate Matter 2.5",
        name: "PDMAX1",
});
fields.push({
        displayName: "Daily Average Particulate Matter 2.5",
        name: "PMAVE",
});
fields.push({
        displayName: "Ozone",
        name: "OZCON",
});
fields.push({
        displayName: "Max. Hourly Ozone",
        name: "OZMAX1",
});
fields.push({
        displayName: "8-hour Maximum Ozone",
        name: "OZMAX8",
});

variables.push({
        displayName: "Taylor Diagram",
        name: "TaylorDiagram",
});

validtimes.push({
        displayName: "06z",
        name: "06",
});
validtimes.push({
        displayName: "12z",
        name: "12",
});
indeps.push({
        displayName: "undefined",
        name: "undefined",
});
/*periods.push({
        displayName: "Diurnal",
        name: "DIU",
});
periods.push({
        displayName: "1-24 h",
        name: "01-24",
});
periods.push({
        displayName: "25-48 h",
        name: "25-48",
});



levels.push({
        displayName: "1h",
        name: "1",
});
levels.push({
        displayName: "8h",
        name: "8",
});



seasons.push({
        displayName: "Current",
        name: "current",
});
seasons.push({
	displayName: "January",
        name: "jan",
});
seasons.push({
        displayName: "February",
        name: "feb",
});
seasons.push({
        displayName: "March",
        name: "mar",
});
seasons.push({
        displayName: "April",
        name: "apr",
});
seasons.push({
        displayName: "May",
        name: "may",
});
seasons.push({
        displayName: "June",
        name: "jun",
});
seasons.push({
        displayName: "July",
        name: "jul",
});
seasons.push({
        displayName: "August",
        name: "aug",
});
seasons.push({
        displayName: "September",
        name: "sep",
});
seasons.push({
        displayName: "October",
        name: "oct",
});
seasons.push({
        displayName: "November",
        name: "nov",
});
seasons.push({
        displayName: "December",
        name: "dec",
});

*/




/*maptypes.push({
        url: "geo_00Z.php",
        displayName: "0000 UTC",
        name: "geo_00Z",
});
maptypes.push({
        url: "geo_12Z.php",
        displayName: "1200 UTC",
        name: "geo_12Z",
});
*/
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
                annual: "2020",
                month: "08",
                day: "Day1",
                domain: "FULL",
                field: "PMTF",
                variable: "TaylorDiagram",
                validtime: "12",
                frame: startFrame,
	};
	
        //Change domain based on passed argument, if any
        var passed_domain = "";
        if(passed_domain!=""){
                if(searchByName(passed_domain,domains)>=0){
                        imageObj.domain = passed_domain;
                }
        }

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
        populateMenu("day");
	populateMenu('domain');
	populateMenu('field');
        populateMenu('variable');
	populateMenu('validtime');	
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
