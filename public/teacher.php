<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php 
if(!isset($_SESSION["teacher_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
	<title>Teacher</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">


	<script type="text/javascript" src="js/respond.js"></script>
	<script>
	function showUser(str) 
	{
		if (str == "default")
		{
				document.getElementById("txtHint").innerHTML = "";
				return;
			} 
			else
			{ 
				if (window.XMLHttpRequest) 
				{
	            	// code for IE7+, Firefox, Chrome, Opera, Safari
	            	xmlhttp = new XMLHttpRequest();
	        	} 
	        	else 
	        	{
	            	// code for IE6, IE5
	            	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        	}
	        xmlhttp.onreadystatechange = function() 
	        {
	        	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	        	{
	        		document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
	        	}
	        }
	        xmlhttp.open("GET","show_student_description.php?issue_id="+str,true);
	        xmlhttp.send();
	    }
	}
</script>
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
						<li id="selected"><a href="teacher.php">Sanction Issue</a></li>
            			<li><a href="issue_history.php">issue history</a></li>
            			<li><a href="new.php">new</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="content">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><strong><h2 class="center">Sanction Issue</h2></strong></h3>
					</div>
					<div class="panel-body">
						<form action="manage_teacher.php" method="post" class="col-xs-8">
							<div class="form-group">
								<label for="issueApplicationSubject">Issue Application subject:</label>
								<select id="issueApplicationSubject" name="issue_id" onchange="showUser(this.value)" class="form-control">
									<?php
									

									/*$teacher_name=$_SESSION["username"];
									$safe_teacher_name=mysqli_real_escape_string($conn, $teacher_name);
									//$query="SELECT teacher_name FROM teacher_detail WHERE teacher_id = {$safe_teacher_id} ";

                                     //$result_set = mysqli_query($conn,$query);
                                     //confirm_query($student_set);
                                     //$teacher_name=mysqli_fetch_assoc($result_set);
									 //print_r($teacher_name);

                                  // $teacher=implode(" ", $teacher_name);




									$query="SELECT * FROM issue_detail WHERE teacher_name = {$safe_teacher_name} AND  status='not seen your request yet'";

									$student_set = mysqli_query($conn,$query);
									//confirm_query($student_set);
									$student_count= mysqli_num_rows($student_set);
									echo "<option value=\"default\">Select Subject..</option>";
									for($count=1;$count<=$student_count;$count++)
									{
										$student=mysqli_fetch_assoc($student_set);
										echo "<option value=\"{$student["issue_id"]}\">{$student["subject"]}-by-{$student["student_id"]}</option>";
									}*/

                            $teacher_name = intval($_GET['teacher_name']);
                               
                              $query="SELECT * FROM issue_detail WHERE teacher_name = {$teacher_name} AND  status='not seen your request yet'";
                                $student_set = mysqli_query($conn,$query);
									//confirm_query($student_set);
									$student_count= mysqli_num_rows($student_set);
									echo "<option value=\"default\">Select Subject..</option>";
									for($count=1;$count<=$student_count;$count++)
									{
										$student=mysqli_fetch_assoc($student_set);
										echo "<option value=\"{$student["issue_id"]}\">{$student["subject"]}-by-{$student["student_id"]}</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="status">Status:</label>
							</div>
							<div class="form-group">
								<input type="radio" name="status" id="status" value="Approved" required >Approved
							</div>
							<div class="form-group">
								<input type="radio" name="status" id="status" value="Not Approved" required>Not Approved
							</div>
							<div class="form-group">
								<label for="description">Description:</label>
							</div>
							<div class="form-group">
								<textarea name="teacher_description" placeholder="Enter the description here." rows="15" class="form-control" id="description" required></textarea>
							</div>
							<button type="submit" name="submit" class="btn btn-info btn-lg width1" >Sanction Issue</button>
						</form>
						<div class="row">
							<div><b>Reason For Issue</b></div>
							<div id="txtHint"></div>
						</div>
					</div><!-- end of panle body -->
					
				</div> <!-- end of panale -->
			</div>
			<?php echo message(); ?>
        	<?php echo form_errors($errors); ?>
		</div> <!-- end of row -->
	
<!--/*==================>javascipt<===========================*/-->
	<script src="js/jquery.min.js"></script>
	<!--<script type="text/javascript" src="jqery_ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/date.js"></script> -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>