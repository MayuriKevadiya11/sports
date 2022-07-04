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
	<title>Add Student</title>
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
					<ul class="nav navbar-nav nav-pills pull-right">
						<li><a href="admin.php">Home</a></li>
						<li><a id="selected" href="add_student.php">Add Student</a></li>
						<li><a href="add_teacher.php">Add Teacher</a></li>
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
						<h3 class="panel-title"><strong><h2 class="center">Add Student</h2></strong></h3>
					</div>
					<div class="panel-body">
<!-- here form start --><form action="manage_add_student.php" method="post" class="col-xs-8">
<div class="form-group">
								<label for="InputId">Student Id</label>
								<input type="text" class="form-control" name="student_id" id="InputId" required  placeholder="Enter your id.." autofocus>
							</div>
							<div class="form-group">
								<label for="InputName">Student Name</label>
								<input type="text" class="form-control" name="student_name" id="InputName" required  placeholder="Enter your name.." autofocus>
							</div>
							<div class="form-group">
								<label for="InputPassword">Password</label>
								<input type="password" class="form-control" id="InputPassword" required placeholder="Password.." name="student_password">
							</div>

  <fieldset>
    
    <div class="form-group">
      <label  for="branch">Branch</label>
      
        <select  input type ="text" class="form-control" id="branch"  name="branch">
          <option value="default">Select Branch..</option>
          <option>COMPUTER</option>
          <option>INFORMATION TECHNOLOGY</option>
          <option>ELECTRICAL</option>
          <option>CIVIL</option>
          <option>MECHANICAL</option>
          
        </select>
      
 
    </div>
    
    <br>
    <div class="form-group">
      <label  for="semester">Semester</label>
     
        <select  input type ="text" class="form-control" id="semester"
 name="semester">
          <option value="default">Select semester..</option>
          <option>SEM 1</option>
          <option>SEM 2</option>
          <option>SEM 3</option>
          <option>SEM 4</option>
          <option>SEM 5</option>
          <option>SEM 6</option>
          <option>SEM 7</option>
          <option>SEM 8</option>
        </select>
      
      
    </div>
    </br>
  </fieldset>
 
    
   
         
          
          
        
 <div class="form-group">
								<label for="InputGender">Gender</label>
						
							<div class="form-group">
								<select name="student_gender" id="InputGender" class="form-control">
									<option value="default">Select Gender..</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</div>
</div>
							<div class="form-group">
								<label for="InputEmail">Email</label>
								<input type="email" name="student_email" class="form-control" id="InputEmail" placeholder="abc@exaple.com" pattern="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" required>
							</div>
							<div class="form-group">
								<label for="InputMobile">Mobile no:</label>
								<input type="text" name="student_phone_no"  required placeholder="Enter 10 digit no." pattern="^[0-9]{10}$" class="form-control" id="InputMobile">
							</div>
							<button type="submit" name="submit" class="btn btn-info btn-lg width1" >Add Student</button>
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