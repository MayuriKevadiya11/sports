<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/function.php") ?>
<?php
if(isset($_GET["logout"]))
{
	$_SESSION["admin_id"]=null;
	$_SESSION["username"]=null;
	$_SESSION["teacher_id"]=null;
	$_SESSION["student_id"]=null;
	$_SESSION["message"]=null;
	$_SESSION["errors"]=null;
	session_destroy();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
	<title>Login</title>
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

				</div>
				<div class="collapse navbar-collapse" id="collapse">
					<ul class="nav navbar-nav pull-right">
						<li><a id="selected" href="login.php">Login</a></li>
                         <li><a href="view.php">View</a></li>

					</ul>
				</div>
			</nav>
		</div><div class="row">

			<div class="col-md-7">
				<div id="myCarousel" class="carousel slide pad-bottom " data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img src="image/image1.jpg" alt="image1" class="img-responsive img-rounded">
						</div>
						<div class="item">
							<img src="image/image2.jpg" alt="image2" class="img-responsive img-rounded">
						</div>
						<div class="item">
							<img src="image/image3.jpg" alt="image3" class="img-responsive img-rounded">
						</div>
		
						<a href="#myCarousel" class="carousel-control left pad-top" data-slide="prev"><span class="glyphicon glyphicon-menu-left"></span></a>
						<a href="#myCarousel" class="carousel-control right pad-top" data-slide="next"><span class="glyphicon glyphicon-menu-right"></span></a>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="panel panel-info ">
					<div class="panel-heading">
						<h3 class="panel-title"><strong><h2 class="center">Login</h2></strong></h3>
					</div>
					<div class="panel-body">
						<form action="manage_login.php" method="post">
							<div class="form-group">
								<label for="InputUserID"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login ID</label>
								<input type="number" name="user_id" required class="form-control" id="InputUserID" placeholder="Enter your ID" autofocus aria-describedby="basic-addon1">
							</div>
							<div class="form-group">
								<label for="InputPassword"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Password</label>
								<input type="password" name="password" required class="form-control" id="InputPassword" placeholder="Password">
							</div>
							<select name="login_type" id="login_type" class="form-control b1">
								<option value="default">Select Login Type..</option>
								<option value="1">Admin</option>
								<option value="2">Student</option>
								<option value="3">Teacher</option>
							</select>
							<button type="submit" name="submit" class="btn btn-info btn-lg width1" >Sign in</button>
						</form>
					</div>
					<!-- <pre>
					<?php //print_r($_POST);  ?>
					</pre> -->
					<?php echo message(); ?>
        			<?php echo form_errors($errors); ?>
				</div> <!-- end of panale -->
			</div>
		</div> <!-- end of row -->
	
<!--/*==================>javascipt<===========================*/-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>