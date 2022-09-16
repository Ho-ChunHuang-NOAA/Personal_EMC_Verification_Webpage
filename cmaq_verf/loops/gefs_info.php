<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="main.css" rel="stylesheet" type="text/css" media="all" />
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://d3js.org/d3.v4.min.js"></script>
</head>

<?php
$randomtoken = base64_encode( openssl_random_pseudo_bytes(32));
$_SESSION['csrfToken']=$randomtoken;
?>

<body>
<b>A Brief Description of Verification Graphics</b>
<br>
<br>
<u>All Images:</u>
<br>
The <font style="font-weight: bold" color="black">black line</font> represents observations where relevant.
<br>
The <font style="font-weight: bold" color="blue">blue line</font> represents the operation AQ model, where the solid line is raw and the dashed is bias-corrected.
<br>
The <font style="font-weight: bold" color="red">red line</font> represents the primary experimental configuration being tested, where the solid line is raw and the dashed is bias-corrected..
<br>
All other colors - if present - represent additional experimental configurations
<br>
<br>
<u>Skill Scores and Time Series Plots:</u>
<br>
The description above about line colors is followed in plots such as CSI, FAR, POFD, and any time series-type plots.
<br>
<br>
<u>Taylor Diagrams:</u>
<br>
Symbols are used instead of lines. Here, the squares represent bias-corrected while circles are the raw. The plot colors follow the same explanation as mentioned previously.  The Taylor Diagrams are used to assess correlation strength, which is the axis along the semi-circle; and standard deviation, which is along the bottom axis.  
</body>
</html>
