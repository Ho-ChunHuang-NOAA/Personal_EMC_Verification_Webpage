var pics=new Array();
var count=0;
var i=0;
var ith=0;
var speed=1000;
var fld="";
var k;
var dateStr;
var filename="";


  function myWin(){
    newWin = open ("../../gif_js/main.htm", "displayWindow", "width=850,height=750,menubar=yes,resizable=yes,scrollbars=yes,toolbar=yes,location=yes,status=yes");
                                                                                                                                                             
  }
                                                                                                                                                             
function preload(img){
     pics[count] = new Image();
     pics[count].src = img;
     count++;
}

function get_speed(frm){
  if(frm.elements["spd"].selectedIndex == 0) speed=1000;
  if(frm.elements["spd"].selectedIndex == 1) speed=100;
  if(frm.elements["spd"].selectedIndex == 2) speed=2000;
  return speed;
}
                                                                                                                                                             
function increse_i(){
   i++;
   return i;
}
                                                                                                                                                             
function anim(){
     if(i>=47){
       i=0;
     }
     document.my_image.src =  pics[i].src;
     window.setTimeout("increse_i(); anim()", speed);
}
                                                                                                                                                             
function show(i){
  ith=i;
  document.my_image.src=pics[ith].src;
}

function next(){
  ith=ith+1;
  if(ith >= 47) ith=47;
   document.my_image.src=pics[ith].src;
}
                                                                                                                                                             
function prev(){
  ith=ith-1;
  if(ith < 0) ith=0;
   document.my_image.src=pics[ith].src;
}
                                                                                                                                                             
function rewind(){
  ith=0;
   document.my_image.src=pics[ith].src;
}
                                                                                                                                                             
function last(){
  ith=47;
   document.my_image.src=pics[ith].src;
}
                                                                                                                                                             
function openWin(url) {
  newWin=window.open(url);
}
                                                                                                                                                             
function reload(){
   open(this);
}

function load_image(frm){
  count=0;
    if(frm.typ.options[frm.typ.selectedIndex].value=="regular.html"){
      filename="../../"+frm.tim.options[frm.tim.selectedIndex].value+frm.yr.options[frm.yr.selectedIndex].value+"/"+frm.fld.options[frm.fld.selectedIndex].value+frm.ahr.options[frm.ahr.selectedIndex].value+frm.plvl.options[frm.plvl.selectedIndex].value+frm.sts.options[frm.sts.selectedIndex].value+frm.fhr.options[frm.fhr.selectedIndex].value+frm.reg.options[frm.reg.selectedIndex].value+".gif";
      preload(filename);
    }
    if(frm.typ.options[frm.typ.selectedIndex].value=="regularPM.html"){
      filename="../../"+frm.tim.options[frm.tim.selectedIndex].value+frm.yr.options[frm.yr.selectedIndex].value+"/"+frm.fld.options[frm.fld.selectedIndex].value+frm.ahr.options[frm.ahr.selectedIndex].value+frm.plvl.options[frm.plvl.selectedIndex].value+frm.sts.options[frm.sts.selectedIndex].value+frm.fhr.options[frm.fhr.selectedIndex].value+frm.reg.options[frm.reg.selectedIndex].value+".gif";
      preload(filename);
    }
    if(frm.typ.options[frm.typ.selectedIndex].value=="fho.html"){
      if(frm.fhr.options[frm.fhr.selectedIndex].value=="FHO48") fld="OZMX-";
      else fld=frm.fld.options[frm.fld.selectedIndex].value;
      filename="../../"+frm.tim.options[frm.tim.selectedIndex].value+frm.yr.options[frm.yr.selectedIndex].value+"/"+fld+frm.ahr.options[frm.ahr.selectedIndex].value+frm.plvl.options[frm.plvl.selectedIndex].value+frm.sts.options[frm.sts.selectedIndex].value+frm.fhr.options[frm.fhr.selectedIndex].value+frm.reg.options[frm.reg.selectedIndex].value+".gif";
      preload(filename);
    }
    if(frm.typ.options[frm.typ.selectedIndex].value=="fhoPM.html"){
      fld=frm.fld.options[frm.fld.selectedIndex].value;
      filename="../../"+frm.tim.options[frm.tim.selectedIndex].value+frm.yr.options[frm.yr.selectedIndex].value+"/"+fld+frm.plvl.options[frm.plvl.selectedIndex].value+frm.sts.options[frm.sts.selectedIndex].value+frm.fhr.options[frm.fhr.selectedIndex].value+frm.reg.options[frm.reg.selectedIndex].value+".gif";
      preload(filename);
    }
    if(frm.typ.options[frm.typ.selectedIndex].value=="fhoAOD.html"){
      if(frm.fhr.options[frm.fhr.selectedIndex].value=="FHO01-48") fld="AOD";
      else fld=frm.fld.options[frm.fld.selectedIndex].value;
      filename="../../"+frm.tim.options[frm.tim.selectedIndex].value+frm.yr.options[frm.yr.selectedIndex].value+"/"+fld+frm.plvl.options[frm.plvl.selectedIndex].value+frm.sts.options[frm.sts.selectedIndex].value+frm.fhr.options[frm.fhr.selectedIndex].value+frm.reg.options[frm.reg.selectedIndex].value+".gif";
      preload(filename);
    }
 if(frm.typ.options[frm.typ.selectedIndex].value=="regularAOD.html"){
      if(frm.fhr.options[frm.fhr.selectedIndex].value=="01-24") fld="AOD";
      else fld=frm.fld.options[frm.fld.selectedIndex].value;
      filename="../../"+frm.tim.options[frm.tim.selectedIndex].value+frm.yr.options[frm.yr.selectedIndex].value+"/"+fld+frm.ahr.options[frm.ahr.selectedIndex].value+frm.plvl.options[frm.plvl.selectedIndex].value+frm.sts.options[frm.sts.selectedIndex].value+frm.fhr.options[frm.fhr.selectedIndex].value+frm.reg.options[frm.reg.selectedIndex].value+".gif";
      preload(filename);
    }
  show(0);
}


