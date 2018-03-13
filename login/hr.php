<!DOCTYPE html>
<?php
// Initialize the session
session_start();

// Checking Group Permission
$sql = "SELECT count(*) FROM usrgrp WHERE username = '$_SESSION[username]' AND grpname = 'admin' OR username = '$_SESSION[username]' AND grpname = 'hr'";
$link = mysql_connect('mysql.gproject.svc', 'root', '2c5efd15c8572817af9eaf798349068aa31f8d15');
if (!$link) {
    die('Could not connect: ' . mysql_error());
} 
if (!mysql_select_db('users')) {
    die('Could not select database: ' . mysql_error());
}
$result = mysql_query($sql);
if (!$result) {
    die('Could not query:' . mysql_error());
}
if(mysql_result($result, 0) == 0){
  openlog('ACCESS_DENIED', LOG_PID | LOG_PERROR, LOG_LOCAL0);
  $time = date("Y/m/d_H:i:s");
  syslog(LOG_WARNING, "$time Unauthorized client: $_SESSION[username] requesting: $_SERVER[REQUEST_URI]");
  closelog();
  header("location: access_denied.html");
}
mysql_close($link);


// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
}
?>
<!-- Template by quackit.com -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Google Project - FileServer - HR </title>
		<style type="text/css">
		
		body {
			margin: 0;
			padding: 0;
			overflow: hidden;
			height: 100%; 
			max-height: 100%; 
			font-family:Sans-serif;
			line-height: 1.5em;
		}
		
		#header {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100px; 
			overflow: hidden; /* Disables scrollbars on the navigation frame. To enable scrollbars, change "hidden" to "scroll" */
			background: #BCCE98;
		}
		
		#logo {
			padding:10px;
			float:left;
		}
		
		main {
			position: fixed;
			top: 100px; /* Set this to the height of the header */
			left: 0; 
			right: 0;
			bottom: 0;
			overflow: auto; 
			background: #fff;
		}
		
		.innertube {
			margin: 15px; /* Provides padding for the content */
		}
		
		p {
			color: #555;
		}

		/* Menu */
		nav { 
			margin:0 auto; 
			padding:0; 
			float:right;
		}
		nav ul { 
			list-style:none; 
			padding:0; 
			float:left;
		}
		nav ul li { 
			margin:0; 
			padding:0 0 0 8px; 
			float:left;
		}
		nav ul li a { 
			display:block; 
			margin:0; 
			padding:8px 20px; 
			color:darkgreen; 
			text-decoration:none;
		}
		nav ul li.active a, #top-nav ul li a:hover { 
			color:#d3d3f9;
		}
				
		/*IE6 fix*/
		* html body{
			padding: 100px 0 0 0; /* Set the first value to the height of the header */
		}
		
		* html main{ 
			height: 100%; 
			width: 100%; 
		}
		
		</style>
		
	</head>
	
	<body>		

		<header id="header">
			<div id="logo">
				<h1>FileServer: HR</h1>
			</div>
			<nav>
				<div class="innertube">
				<ul>
					<li><a href="http://188.84.224.35.bc.googleusercontent.com">Home</a></li>
<li><select onChange="window.location.href=this.value">
  <option value="" selected>Grupos</option>
  <option value="http://188.84.224.35.bc.googleusercontent.com/legal.php">Legal</option>
  <option value="http://188.84.224.35.bc.googleusercontent.com/product.php">ProductDesign</option>
  <option value="http://188.84.224.35.bc.googleusercontent.com/market.php">MarketResearch</option>
</select></li>

					<li><a href="#">Admin</a></li>
					<li><a href="http://188.84.224.35.bc.googleusercontent.com/logout.php">LogOut</a></li>
				</ul>
				</div>
			</nav>
		</header>
				
		<main>
			<div class="innertube">
<object type="text/html" data="http://35.202.0.79:8080/elfinder.src.html" width="100%" height="1024px" style="overflow:auto;border:0px ridge blue">

</object>
				
				
			</div>
		</main>
	
	</body>
</html>
