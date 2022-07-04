<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/function.php"); ?>
<?php 
if(!isset($_SESSION["student_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
	<title>Student Home</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">

	<script type="text/javascript" src="js/respond.js"></script>
	
</head>
<body>
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<?php
						echo "<p class=\"navbar-brand\">";
						echo "<strong>"; 
						echo "Hi ".$_SESSION["username"]."&nbsp;&nbsp;&nbsp;";
						echo "</strong>";
						echo "<a href=\"login.php?logout\" class=\"\" >logout</a>";
						echo "</p>";
					?>
				</div>
				<div class="collapse navbar-collapse" id="collapse">
					<ul class="nav navbar-nav pull-right">
						<li><a href="index.php">Home</a></li>
						<li><a href="issue_application.php">Issue Application</a></li>
						<li><a href="issue_status.php">Issue Status</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="jumbotron"> <!-- jumbo torn --> 
				<img src="image/student.png" alt="student" class="pull-right img-responsive" >
				<h1>Issue Application</h1>
				<br>
				<p>Here you can aaply fro the issue.</p>
				<p>just folow these steps:</p>
				<ol>
					<li>Select <b>"Issue navigation menu.</li>
					<li>Fill the form and <b>"click"</b> apply.</li>
					<li>Check your Status from <b>"Issue Status"</b> navigation menu.</li>
					<li>You can <b>"logout"</b> any time you want.</li>
				</ol>
				
			</div>
		</div> <!-- end of row -->
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>