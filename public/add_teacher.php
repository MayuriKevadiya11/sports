<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/function.php") ?>
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
	<title>Add Teacher</title>
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
						<li><a href="admin.php">Home</a></li>
						<li><a href="add_student.php">Add Student</a></li>
						<li><a id="selected" href="add_teacher.php">Add Teacher</a></li>
						<li><a href="assign_teacher_to_student.php">Assign Teacher</a></li>
<li><a href="display_history.php">Display history</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="content">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><strong><h2 class="center">Add Teacher</h2></strong></h3>
					</div>
					<div class="panel-body">
<!-- here form start --><form action="manage_add_teacher.php" method="post" class="col-xs-8">
                                                        <div class="form-group">
								<label for="InputId">Teacher Id</label>
								<input type="text" class="form-control" name="teacher_id" id="InputId" placeholder="Enter your id.." required autofocus>
							</div>
							<div class="form-group">
								<label for="InputName">Teacher Name</label>
								<input type="text" class="form-control" name="teacher_name" id="InputName" placeholder="Enter your name.." required autofocus>
							</div>
							<div class="form-group">
								<label for="InputPassword">Password</label>
								<input type="password" class="form-control" id="InputPassword" placeholder="Password.." name="teacher_password" required>
							</div>
							<div class="form-group">
								<label for="InputGender">Gender</label>
							</div>
							<div class="form-group">
								<select name="teacher_gender" id="InputGender" class="form-control">
									<option value="default">Select Gender..</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</div>
							<div class="form-group">
								<label for="InputEmail">Email</label>
								<input type="email" name="teacher_email" class="form-control" id="InputEmail" placeholder="abc@example.com" pattern="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" required>
							</div>
							<div class="form-group">
								<label for="InputMobile">Mobile no:</label>
								<input type="text" name="teacher_phone_no"  required placeholder="Enter 10 digit no." pattern="^[0-9]{10}$" class="form-control" id="InputMobile">
							</div>
							<button type="submit" name="submit" class="btn btn-info btn-lg width1" >Add Teacher</button>
						</form>
					</div><!-- end of panle body -->
				</div> <!-- end of panale -->
			</div>
			<?php echo message(); ?>
      		<?php echo form_errors($errors); ?>
		</div> <!-- end of row -->
	<!--/*==================>footer<===========================*/-->
		
<!--/*==================>javascipt<===========================*/-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>