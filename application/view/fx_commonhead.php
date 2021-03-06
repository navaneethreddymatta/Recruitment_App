<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Flexeye</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	<!-- Stylesheets -->
	<!-- Bootstrap is included in its original form, unaltered -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Related styles of various icon packs and plugins -->
	<link rel="stylesheet" href="assets/css/plugins.css">

	<!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

	<!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
	<link rel="stylesheet" href="assets/css/themes.css">
	<!-- END Stylesheets -->
	<script src="assets/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
	<script type="text/javascript" src="assets/js/d3.v3.js"></script>
	<style>
	#ex1Slider .slider-selection {
		background: #6AD2EB;
	}
	#errMsg{
		color:Red;
	}
	</style>
	<style>
		.grid .tick {
		stroke: lightgrey;
		stroke-opacity: 0.7;
		shape-rendering: crispEdges;
	}
	.detailsLabel{
		float:left;
		font-size:9pt;
		font-family:Arial;
		font-weight:bold;
		margin-left:8px;
	}
	.detailsValue{
		float:left;
		border-bottom:1px solid black;
		font-size:9pt;
		font-family:Arial;
		margin-right:5px;
	}
	.sectionBlocks{
		height:80px;
		border-right:1px solid black;
		float:left;
		text-align:center;
		font-size:10pt;
		font-family:Arial;
		font-weight:bold;
	}
	.section{
		line-height:20px;
		text-align:left;
		border-top:1px solid black;
		padding-left:5px;
		height:20px;
	}
	.regNum{
		float:left;
		font-size:20pt;
		font-family:Arial;
		font-weight:bold;
		margin-top:5px;
		width:33%;
	}
	.regSet{
		float:left;
		font-size:16pt;
		font-family:Arial;
		font-weight:bold;
		margin-top:8px;
		width:33%;
	}
	.partLabel{
		line-height:25px;
		text-align:center;
		font-family:Arial;
		font-weight:bold;
		font-size:11pt;
	}
	.part2Index{
		width:40px;
		border-right:1px solid black;
		line-height:62px;
		height:62px;
		font-family:Arial;
		font-size:11pt;
		text-align:center;
	}
	</style>
</head>
<body class="page-loading" >
	<script>setTimeout(function() {$('body').removeClass('page-loading');}, 2000);</script>
	<div class="preloader themed-background">
		<h1 class="push-top-bottom text-light text-center"><strong>Please Wait </strong>a moment</h1>
		<div class="inner">
			<h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
			<br/>
			</br>
		<div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
		</div>
	</div>
	<div class="header-fixed-top sidebar-partial sidebar-visible-lg sidebar-no-animations footer-fixed" id="page-container">
