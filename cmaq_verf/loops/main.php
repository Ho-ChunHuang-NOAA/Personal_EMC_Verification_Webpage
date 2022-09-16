
<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>CMAQ Homepage</title>
<link rel="stylesheet" type="text/css" href="main.css">
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>



<!-- Head element -->
<div class="page-top">
	<span><a style="color:#ffffff">COMMUNITY MULTISCALE AIR QUALITY (CMAQ) MODELING SYSTEM</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
	
<!--        <div class="element">
                <span class="bold">Valid:</span>
                <select id="validtime" onchange="changeValidtime(this.value);"></select>
            </div> 

        <div class="element">
                <span class="bold">Season:</span>
                <select id="season" onchange="changeSeason(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Region:</span>
                <select id="domain" onchange="changeDomain(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Statistic:</span>
                <select id="variable" onchange="changeVariable(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Level:</span>
                <select id="level" onchange="changeLevel(this.value)"></select>
        </div>

-->

<!-- /Top menu -->
</div></div>

<!-- Middle menu -->
<!-- <div class="page-middle" id="page-middle"> -->
<!-- /Middle menu -->
</div>


<div id="loading"><img style="width:100%" src="loading.png"></div>


<body>
<div id="pageContents">
<center>
<img src="https://www.emc.ncep.noaa.gov/users/verification/style/images/cmaq_logo.png" alt="" width="150" />
<br>
<br>
The Community Multiscale Air Quality (CMAQ) modeling system combines current knowledge of atmospheric science and air quality modeling with multi-processor computing techniques to deliver fast, technically sound estimates of ozone (O<sub>3</sub>) and particulate matter (PM<sub>2.5</sub>).
<br>
<br>
<a style="color:#ff0000">This webpage provides information on <u>operational CMAQ forecast skill</u>.
<br>
Please use the links on the left to navigate to CMAQ verification statistics.</a> 
<br>
<br>
<b>Additional Information:</b>
<br>
CMAQ is an active open-source development project of the U.S. Environmental Protection Agency <a href=https://www.epa.gov/ target="_blank">(EPA)</a> and, although not verified here, can also forecast toxins and acid deposition.<br>You can learn more about CMAQ <a href=https://www.epa.gov/cmaq/cmaq-models-0 target="_blank">here</a>. 
<br>
<br>
<b>Note to Users:</b>
<br>
This site and its content are subject to frequent changes during testing and implentation periods that may lead to changes in model configurations and presentation of graphics. Please contact the team lead for more information.
<br> 
</center>
</div>
</body>





<!-- Image -->
<div id="page-map">
	<image name="map" style="width:100%">
</div>

<!-- /Footer -->
<div class="page-footer">
        <span></div>


<script type="text/javascript">
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

var url = "https://www.emc.ncep.noaa.gov/mmb/aq/verification_diagnostics/MET/YYYYMM/VVV_FFF_III_HH_DDD.png"
/* var url = "https://www.emc.ncep.noaa.gov/gmb/yluo/naefs/VRFY_STATS/NCEP_NCEPb/DDDzLLL_VVV_SSS.gif";
/* var url = "https://www.emc.ncep.noaa.gov/mmb/gmanikin/fv3gfs/20180301/fv3_DDD_VVV_2018030100_0Y.png"; */
/*  var url = "https://www.emc.ncep.noaa.gov/users/Alicia.Bentley/fv3gefs/2018030100/images/DDD/mean_diff/VVV_Y.png"; */

//====================================================================================================
//Add variables & domains
//====================================================================================================

var variables = [];
var domains = [];
var fields = [];
var validtimes = [];
var indeps = [];
var annuals = [];
var months = [];
var models = [];
var sites = [];


/* var levels = [];
var seasons = [];
var maptypes = [];
var validtimes = []; */



variables.push({
        displayName: "Root-Mean-Squared-Error",
        name: "RMSE",
});
variables.push({
        displayName: "Average",
        name: "Average",
});
variables.push({
        displayName: "False Alarm Ratio",
        name: "FAR",
});
variables.push({
        displayName: "Critical Success Index",
        name: "CSI",
});
variables.push({
        displayName: "Probability of False Detection",
        name: "POFD",
});
variables.push({
        displayName: "Taylor Diagram",
        name: "TaylorDiagram",
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
fields.push({
        displayName: "10-m Wind Speed",
        name: "WSPD10",
});
fields.push({
        displayName: "2-m Dewpoint",
        name: "DPT",
});
fields.push({
        displayName: "2-m Temperature",
        name: "TMP",
});
fields.push({
        displayName: "Particulate Matter 2.5",
        name: "PM25TOT",
});
fields.push({
        displayName: "Ozone",
        name: "O3",
});
fields.push({
        displayName: "Wind Speed",
        name: "WSPD",
});
fields.push({
        displayName: "Cloud Fraction",
        name: "CFRAC3D",
});
fields.push({
        displayName: "Wind Direction",
        name: "WDIR",
});
fields.push({
        displayName: "Nitrogen Monoxide",
        name: "NO",
});
fields.push({
        displayName: "Nitrogen Dioxide",
        name: "NO2",
});
fields.push({
        displayName: "Specific Humidity",
        name: "QV",
});
fields.push({
        displayName: "Cloud Water",
        name: "QC",
});
fields.push({
        displayName: "Vertical Wind",
        name: "WWIND",
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
        displayName: "Forecast Lead",
        name: "FL",
});
indeps.push({
        displayName: "Valid Time",
        name: "FVB",
});
indeps.push({
        displayName: "Observation Threshold",
        name: "OT",
});
indeps.push({
        displayName: "undefined",
        name: "undefined",
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
        displayName: "PROD",
        name: "PROD",
})
models.push({
        displayName: "PARA6C",
        name: "PARA6C",
})

sites.push({
        displayName: "Averaged over PM 2.5 sites",
        name: "pm253d",
})
sites.push({
        displayName: "Averaged over Ozone sites",
        name: "awpozcon3d",
})

/*periods.push({
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
                month: "August",
                domain: "CONUS",
                field: "Particulate Matter 2.5",
                variable: "Average",
                validtime: "06z",
                indep: "Forecast Lead",
//                validtime: "00Z",
//                frame: startFrame,
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
        populateMenu('domain');
        populateMenu('field');
        populateMenu('variable');
        populateMenu('validtime');      
        populateMenu('indep'); 
//       populateMenu('validtime');
	
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
\\

</script>


</body></html>
