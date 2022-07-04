<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/function.php"); ?>
<?php 
if(!isset($_SESSION["admin_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
	<title>Admin</title>
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
						<li><a id="selected" href="admin.php">Home</a></li>
						<li><a href="add_student.php">Add Student</a></li>
						<li><a href="add_teacher.php">Add Teacher</a></li>
						<li><a href="assign_teacher_to_student.php">Assign Teacher</a></li>
<li><a href="display_history.php">Display history</a></li>
<li><a href="record.php">Add Equipment</a></li>



					
					</ul>
				</div>
			</nav>
		</div>
		<div class="jumbotron"> <!-- jumbo torn --> 
				<img src="image/admin.png" alt="admin" class="pull-right img-responsive img-circle">
				<h1>Admin Page</h1>
				<p><strong>This is admin page.</strong></p>
				<p><strong>Please add "student" or "teacher"</strong><strong> and assign teacher to student </strong></p>
		</div> <!-- end of row -->
	<!--/*==================>footer<===========================*/-->
		
<!--/*==================>javascipt<===========================*/-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>