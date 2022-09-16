<!--

/* ============================================================================================================= */
/* Preloading & displaying functions */
/* ============================================================================================================= */

//Populate the dropdown menu with items
function populateMenu(mode){
//	if(mode == 'valid'){
//		var element = document.getElementById("valid");
//		for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
//		
//		for(i=minFrame; i<=maxFrame; i=i+incrementFrame){
//			var option = document.createElement("option");
//			var increment = (i*6) - (startFrame*6);
//			option.text = formatDate(increment,'valid') + " (" + increment + " h)";
//			option.value = i;
//			element.add(option);
//		}
//	}
	if(mode == 'domain'){
		var element = document.getElementById("domain");
		for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
		
		for(i=0; i<domains.length; i++){
			var option = document.createElement("option");
			option.text = domains[i].displayName;
			option.value = domains[i].name;
			element.add(option);
		}
	}
//        else if(mode == 'level'){
 //               var element = document.getElementById("level");
  //              for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
//
//                for(i=0; i<levels.length; i++){
 //                       var option = document.createElement("option");
 //                       option.text = levels[i].displayName;
 //                       option.value = levels[i].name;
 //                       element.add(option);
//                }
//        }
        else if(mode == 'month'){
                var element = document.getElementById("month");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<months.length; i++){
                        var option = document.createElement("option");
                        option.text = months[i].displayName;
                        option.value = months[i].name;
                        element.add(option);
                }
        }
//        else if(mode == 'period'){
//                var element = document.getElementById("period");
//                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
//
//                for(i=0; i<periods.length; i++){
//                        var option = document.createElement("option");
//                        option.text = periods[i].displayName;
//                        option.value = periods[i].name;
 //                       element.add(option);
//                }
//        }
        else if(mode == 'annual'){
                var element = document.getElementById("annual");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<annuals.length; i++){
                        var option = document.createElement("option");
                        option.text = annuals[i].displayName;
                        option.value = annuals[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'field'){
                var element = document.getElementById("field");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<fields.length; i++){
                        var option = document.createElement("option");
                        option.text = fields[i].displayName;
                        option.value = fields[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'validtime'){
                var element = document.getElementById("validtime");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<validtimes.length; i++){
                        var option = document.createElement("option");
                        option.text = validtimes[i].displayName;
                        option.value = validtimes[i].name;
                        element.add(option);
                }
        }
	else if(mode == 'variable'){
		var element = document.getElementById("variable");
		for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
		
		for(i=0; i<variables.length; i++){
			var option = document.createElement("option");
			option.text = variables[i].displayName;
			option.value = variables[i].name;
			element.add(option);
		}
	}
        else if(mode == 'indep'){
                var element = document.getElementById("indep");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<indeps.length; i++){
                        var option = document.createElement("option");
                        option.text = indeps[i].displayName;
                        option.value = indeps[i].name;
                        element.add(option);
                }      
        }
        else if(mode == 'model'){
                var element = document.getElementById("model");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<models.length; i++){
                        var option = document.createElement("option");
                        option.text = models[i].displayName;
                        option.value = models[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'site'){
                var element = document.getElementById("site");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<sites.length; i++){
                        var option = document.createElement("option");
                        option.text = sites[i].displayName;
                        option.value = sites[i].name;
                        element.add(option);
                }
        }

//	else if(mode == 'maptype'){
//		var element = document.getElementById("maptype");
//		for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
//		
//		for(i=0; i<maptypes.length; i++){
//			var option = document.createElement("option");
//			option.text = maptypes[i].displayName;
//			option.value = maptypes[i].name;
//			element.add(option);
//		}
//	}
}

//Format URL to the requested domain, variable, run & frame
function getURL(annual,month,domain,variable,validtime,indep,field,model,site,frame){
	var newurl = url.replace("VVV",variable);
	newurl = newurl.replace("FFF",field);
        newurl = newurl.replace("MM",month);
	newurl = newurl.replace("DDD",domain);
        newurl = newurl.replace("III",indep);
	newurl = newurl.replace("HH",validtime);
        newurl = newurl.replace("YYYY",annual);
        newurl = newurl.replace("NNN",model);
        newurl = newurl.replace("OOO",site);
	return newurl;
}

//Search for a name within an object
function searchByName(keyname, arr){
    for (var i=0; i < arr.length; i++){
        if (arr[i].name === keyname){
            return i;
        }
    }
	return -1;
}

//function updateHTML(elmId, value) {
//  var elem = document.getElementById(elmId);
//  if(typeof elem !== 'undefined' && elem !== null) {
//    elem.innerHTML = value;
//  }
//}

//Display the current image object
function showImage(){
	
	//Variable index
	var idx_var = searchByName(imageObj.variable,variables);
	
	//Update user on whether image is still loading
	if(variables[idx_var].images[imageObj.frame].loaded == false){
		document.getElementById('loading').style.display = "block";
	}
	else{
		document.getElementById('loading').style.display = "none";
		document.map.src = variables[idx_var].images[imageObj.frame].src;
	}
	
	//Update dropdown menus
	//document.getElementById("valid").selectedIndex = frames.indexOf(parseInt(imageObj.frame));//(parseInt(imageObj.frame) / incrementFrame);
        
        if (searchByName(imageObj.variable,variables) !== undefined && searchByName(imageObj.variable,variables) !== null) {
         	document.getElementById("variable").selectedIndex = searchByName(imageObj.variable,variables);
        }
        if (searchByName(imageObj.domain,domains) !== undefined && searchByName(imageObj.domain,domains) !== null) {
	        document.getElementById("domain").selectedIndex = searchByName(imageObj.domain,domains);
        }
        if (searchByName(imageObj.field,fields) !== undefined && searchByName(imageObj.field,fields) !== null) {
                document.getElementById("field").selectedIndex = searchByName(imageObj.field,fields);
        }
        if (searchByName(imageObj.month,months) !== undefined && searchByName(imageObj.month,months) !== null) {
                document.getElementById("month").selectedIndex = searchByName(imageObj.month,months);
        }
        if (searchByName(imageObj.validtime,validtimes) !== undefined && searchByName(imageObj.validtime,validtimes) !== null) {
                document.getElementById("validtime").selectedIndex = searchByName(imageObj.validtime,validtimes);
        }
        if (searchByName(imageObj.indep,indeps) !== undefined) {
                document.getElementById("indep").selectedIndex = searchByName(imageObj.indep,indeps);
        }
        if (searchByName(imageObj.annual,annuals) !== undefined && searchByName(imageObj.annual,annuals) !== null) {
                document.getElementById("annual").selectedIndex = searchByName(imageObj.annual,annuals);
        }
        if (searchByName(imageObj.model,models) !== undefined && searchByName(imageObj.model,models) !== null) {
                document.getElementById("model").selectedIndex = searchByName(imageObj.model,models);
        }
        if (searchByName(imageObj.site,sites) !== undefined && searchByName(imageObj.site,sites) !== null) {
            document.getElementById("site").selectedIndex = searchByName(imageObj.site,sites);	
        }
	//Update URL in address bar
	generate_url();
}



//Format integer as a string by number of characters
function formatString(i,val){
	if(val==3){
		if(i<10){return "00"+i;}
		if(i<100){return "0"+i;}
		return i;
	}
}

//Preload images for the current run, variable & projection
function preload(obj){
	
	//Variable index
	var idx_var = searchByName(obj.variable,variables);
	
	//alert(obj.variable);
	//alert(idx_var);
	
	variables[idx_var].images[i] = [];
    variables[idx_var].images[i] = [];
	variables[idx_var].images[i] = [];
	
	//Arrange list of hour indices to loop through
	var frameidx = frames.indexOf(imageObj.frame);
	var hrs_loop = [frameidx];
	
	for(i=1; i<frames.length; i++){
		
		var idx_up = frameidx + i;
		var idx_down = frameidx - i;
		
		if(idx_up<=frames.indexOf(maxFrame)){hrs_loop.push(idx_up);}
		if(idx_down>=frames.indexOf(minFrame)){hrs_loop.push(idx_down);}
	}
	
	//Loop through all forecast hours & pre-load image
	for (i2=0; i2<hrs_loop.length; i2++){
		var i1 = hrs_loop[i2];
		var i = frames[i1];

		var urls = getURL(obj.annual,obj.month,obj.domain,obj.variable,obj.validtime,obj.indep,obj.field,obj.model,obj.site,i);
		
		variables[idx_var].images[i] = new Image();
		variables[idx_var].images[i].loaded = false;
		variables[idx_var].images[i].id = i;
		variables[idx_var].images[i].onload = function(){this.loaded = true; remove_loading(this.varid,this.id);};
//		variables[idx_var].images[i].onerror = function(){remove_loading(this.varid,this.id);};
                variables[idx_var].images[i].onerror = function(){remove_loading(this.varid,this.id); this.src='https://www.emc.ncep.noaa.gov/users/verification/style/images/noimage.png';};
		variables[idx_var].images[i].src = urls;
		variables[idx_var].images[i].variable = obj.variable;
		variables[idx_var].images[i].varid = idx_var;
    }
}

//Remove sign of loading image
function remove_loading(idx_var,idx_frame){
	check1a = parseInt(idx_var);
	check1b = searchByName(imageObj.variable,variables);
	check2a = frames.indexOf(parseInt(idx_frame));
	check2b = frames.indexOf(parseInt(imageObj.frame));
	
	//Remove if the image just loaded for the currently displayed image
	if((check1a == check1b) && (check2a == check2b)){
		document.getElementById('loading').style.display = "none";
		document.map.src = variables[idx_var].images[imageObj.frame].src;
	}
}

/* ============================================================================================================= */
/* Dropdown menu functions */
/* ============================================================================================================= */

//Change the valid frame from dropdown menu
//function changeValid(id){
//	imageObj.frame = id;
	
	//Determine if need to preload (coming off of dprog/dt)
	//if(imageObj.images[0].run != imageObj.run){preload(imageObj);}
	
//	showImage();
//	document.getElementById("valid").blur();
//}

//Change the map domain from dropdown menu
function changeDomain(id){
	imageObj.domain = id;
	preload(imageObj);
	showImage();
	document.getElementById("domain").blur();
}

//Change the map level from dropdown menu
//function changeLevel(id){
//        imageObj.level = id;
//        preload(imageObj);
//        showImage();
//        document.getElementById("level").blur();
//}

//Change the map season from dropdown menu
function changeMonth(id){
        imageObj.month = id;
        preload(imageObj);
        showImage();
        document.getElementById("month").blur();
}

//Change the map period from dropdown menu
//function changePeriod(id){
//        imageObj.period = id;
//        preload(imageObj);
//        showImage();
//        document.getElementById("period").blur();
//}

//Change the map annual from dropdown menu
function changeAnnual(id){
        imageObj.annual = id;
        preload(imageObj);
        showImage();
        document.getElementById("annual").blur();
}


//Change the map validtime from dropdown menu
function changeValidtime(id){
        imageObj.validtime = id;
        preload(imageObj);
        showImage();
        document.getElementById("validtime").blur();
}

//Change the variable from dropdown menu
function changeVariable(id){
	imageObj.variable = id;
	preload(imageObj);
	showImage();
	document.getElementById("variable").blur();
}


// Change independent variable from dropdown menu
function changeIndep(id){
        imageObj.indep = id;
        preload(imageObj);
        showImage();
        document.getElementById("indep").blur();
}

// Change model output field name from dropdown menu
function changeField(id){
        imageObj.field = id;
        preload(imageObj);
        showImage();
        document.getElementById("field").blur();
}

// Change the model names
function changeModel(id){
        imageObj.model = id;
        preload(imageObj);
        showImage();
        document.getElementById("model").blur();
}

// Change the site type
function changeSite(id){
        imageObj.site = id;
        preload(imageObj);
        showImage();
        document.getElementById("site").blur();
}
//Change the map type
//function changeMaptype(id){
//	var newUrl = maptypes[searchByName(id,maptypes)].url;
//	window.open(newUrl,"_self");
//}

/* ============================================================================================================= */
/* Keyboard controls */
/* ============================================================================================================= */

function keys(e){
	//Left
	if(e.keyCode == 37){
		prevFrame();
		return !(e.keyCode);
	}
	//Up
	else if(e.keyCode == 38){
		pressUp();
		return !(e.keyCode);
	}
	//Right
	else if(e.keyCode == 39){
		nextFrame();
		return !(e.keyCode);
	}
	//Down
	else if(e.keyCode == 40){
		pressDown();
		return !(e.keyCode);
	}
}

function prevFrame(){
//	var curFrame = parseInt(imageObj.frame);
//	if(curFrame > minFrame){curFrame = curFrame - incrementFrame;}
//	changeValid(curFrame);
	var curVar = searchByName(imageObj.variable,variables);
	if(curVar > 0){curVar = curVar - 1; changeVariable(variables[curVar].name);}
//	changeLevel(curFrame);
}

function nextFrame(){
//	var curFrame = parseInt(imageObj.frame);
//	if(curFrame < maxFrame){curFrame = curFrame + incrementFrame;}
//	changeValid(curFrame);
	var curVar = searchByName(imageObj.variable,variables);
	if(curVar < variables.length-1){curVar += 1; changeVariable(variables[curVar].name);}
}

// function pressDown(){
//	var curVar = searchByName(imageObj.level,levels);
//	if(curVar < levels.length-1){curVar += 1; changeLevel(levels[curVar].name);}
//}

//function pressUp(){
//	var curVar = searchByName(imageObj.level,levels);
//	if(curVar > 0){curVar = curVar - 1; changeLevel(levels[curVar].name);}
//}

/* ============================================================================================================= */
/* Additional functions */
/* ============================================================================================================= */

//Update the URL in the address bar by the current domain and variable
function generate_url(){
	
	var url = window.location.href.split('?')[0] + "?";
	var append = "";
	
	//Add domain
	append += "domain=" + imageObj.domain;
	
	//Add variable
	append += "&variable=" + imageObj.variable;
	
	//Get new URL
	var total = url + append;
	
	//Update in address bar without reloading page
	var pagename = window.location.href.split('/');
	pagename = pagename[pagename.length-1];
	pagename = pagename.split(".php")[0];
	var stateObj = { foo: "bar" };
	history.replaceState(stateObj, "", pagename+".php?"+append);
	
	//Update selected menu item based on this
//	document.getElementById('maptype').selectedIndex = searchByName(pagename,maptypes);

	return total;
}

function updateMobile(){
	if( navigator.userAgent.match(/Android/i)
	|| navigator.userAgent.match(/webOS/i)
	|| navigator.userAgent.match(/iPhone/i)
	|| navigator.userAgent.match(/iPod/i)
        || navigator.userAgent.match(/Samsung/i)
	//|| navigator.userAgent.match(/iPad/i)
	|| navigator.userAgent.match(/BlackBerry/i)
	|| navigator.userAgent.match(/Windows Phone/i)
	){
		document.getElementById('page-middle').innerHTML = "Swipe Left/Right on Image = Change statistic | Swipe Up/Down on Image = Change hourly average";
	}


	//Swipe for mobile devices only when focused on image
	var element = document.getElementsByName("map")[0];
	element.addEventListener("touchstart", touchStart, false);
	element.addEventListener("touchend", touchEnd, false);
	element.addEventListener("touchmove", touchMove, false);

}

function touchStart(e){
    xInit = e.touches[0].clientX;
    yInit = e.touches[0].clientY;
};

function touchMove(e){
	e.preventDefault();
    xPos = e.touches[0].clientX;
    yPos = e.touches[0].clientY;
};

function touchEnd() {
    if ( ! xPos || ! yPos ) {
        return;
    }
	
    //Get difference in x & y positions
    var xDiff = xInit - xPos;
    var yDiff = yInit - yPos;
	
	//Determine whether swipe was vertical or horizontal
    if ( Math.abs(xDiff) > Math.abs(yDiff) ){
        if( xDiff > 0 ){
            //Left swipe
			nextFrame();
        }
		else{
            //Right swipe
			prevFrame();
        }                       
    }
	else{
        if ( yDiff > 0 ){
            //Up swipe
			pressDown();
        }
		else{ 
            //Down swipe
			pressUp();
        }                                                                 
    }
	
    //reset values
    xInit = null;
    yInit = null;  
	xPos = null;
	yPos = null;
};

-->
