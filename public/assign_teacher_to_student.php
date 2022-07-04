<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
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
	<title>Assign Teacher To Student</title>
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
						<li><a href="add_teacher.php">Add Teacher</a></li>
						<li><a id="selected" href="assign_teacher_to_student.php">Assign Teacher</a></li>
<li><a href="display_history.php">Display history</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="content"> <!-- jumbo torn --> 
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><strong><h2 class="center">Assign Teacher To Student</h2></strong></h3>
					</div>
					<div class="panel-body">
<!-- here form start --><form action="manage_assign_teacher_to_student.php" method="post" class="col-xs-8">
							<div class="form-group">
								<label for="InputTeacherID">Teacher Name</label>
							</div>
							<div class="form-group">
								<select name="teacher_name" id="InputTeacherID" class="form-control">
									<?php
									
									$query="SELECT * FROM teacher_detail";

									$teacher_set = mysqli_query($conn,$query);
									confirm_query($teacher_set);
									$teacher_count= mysqli_num_rows($teacher_set);
									echo "<option value=\"default\">select name..</option>";
									for($count=1;$count<=$teacher_count;$count++)
									{
										$teacher=mysqli_fetch_assoc($teacher_set);
										echo "<option value=\"{$teacher["teacher_name"]}\">{$teacher["teacher_id"]}-{$teacher["teacher_name"]}</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="InputStudentID">Student Name</label>
							</div>
							<div class="form-group">
								<select name="student_name" id="InputStudentID" class="form-control">
									<?php

									$query="SELECT * FROM student_detail";

									$student_set = mysqli_query($conn,$query);
									confirm_query($student_set);
									$student_count= mysqli_num_rows($student_set);
									echo "<option value=\"default\">select ID..</option>";
									for($count=1;$count<=$student_count;$count++)
									{
										$student=mysqli_fetch_assoc($student_set);
										echo "<option value=\"{$student["student_name"]}\">{$student["student_id"]}-{$student["student_name"]}</option>";
									}
									?>
								</select>
							</div>
							<button type="submit" name="submit" class="btn btn-info btn-lg width1" >Assign</button>
						</form>
					</div><!-- end of panle body -->
				</div> <!-- end of panale -->
			</div>
			<?php echo message(); ?>
      		<?php echo form_errors($errors); ?>
		</div> <!-- end of row -->
	<!--/*==================>footer<===========================*/--
<!--/*==================>javascipt<===========================*/-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>