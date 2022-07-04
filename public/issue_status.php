<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php") ?>
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
	<title>Issue Satus</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">

	<script type="text/javascript" src="js/respond.js"></script>
	<script>
	function showUser(str) 
	{
		if (str == "default") {
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
	        xmlhttp.open("GET","show_teacher_name_for_issue_status.php?issue_id="+str,true);
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
						<li><a href="index.php">Home</a></li>
						<li><a href="issue_application.php">Issue Application</a></li>
						<li><a href="issue_status.php">Issue Status</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="content"> <!-- jumbo torn --> 
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><strong><h2 class="center">Issue Status</h2></strong></h3>
					</div>
					<div class="panel-body">
						<form action="issue_status.php" method="post" class="col-xs-8">
							<div class="form-group">
								<label for="InputTeacherID">Issue status of:</label>
							</div>
							<div class="form-group">
								<select name="issue_id" id="InputTeacherID" class="form-control" onchange="showUser(this.value)">
									<?php
									$student_id=$_SESSION["student_id"];
									$safe_student_id=mysqli_real_escape_string($conn, $student_id);
									$query="SELECT * FROM issue_detail WHERE student_id = {$safe_student_id}";

									$subject_set = mysqli_query($conn,$query);
                  					//confirm_query($subject_set);
									$subject_count= mysqli_num_rows($subject_set);
									echo "<option value=\"default\">select subject..</option>";
									for($count=1;$count<=$subject_count;$count++)
									{
										$subject=mysqli_fetch_assoc($subject_set);
										echo "<option value=\"{$subject["issue_id"]}\">{$subject["subject"]}</option>";
									}
									?>
								</select>
								<div id="txtHint"></div>
							</div>
							<button type="submit" name="submit" class="btn btn-info btn-lg width1" >Show</button>
						</form>
						<br>
						
					</div><!-- end of panle body -->
					<div class="row pad-left pad-right">
						<?php 
						if(isset($_POST['submit']))
						{ 
							$issue_id=mysql_prep($_POST["issue_id"]);
							$safe_issue_id=mysqli_real_escape_string($conn, $issue_id);

							if($safe_issue_id!=0)
							{
								$query="SELECT * FROM issue_detail WHERE issue_id = {$safe_issue_id}";
								$issue_set = mysqli_query($conn,$query);
            						//confirm_query($issue_set);
            						//$subject_count= mysqli_num_rows($subject_set);
								echo"<div class=\"table-responsive\">";
								echo"<table class=\"table table-hover table-bordered\">
								<tr>
								<th>Issue ID</th>
								<th>Student ID</th>
								<th>Teacher Name</th>
								<th>Subject</th>
								<th>Issue Start Date</th>
								<th>Issue End Date</th>
<th>Issue Starting Time</th>

<th>Issue Ending Time</th>
								<th>Student Description</th>
								<th>Teacher Description</th>
								<th>Status</th>
								</tr>";
								while($row = mysqli_fetch_array($issue_set)) {
									echo "<tr>";
									echo "<td>" . $row['issue_id'] . "</td>";
									echo "<td>" . $row['student_id'] . "</td>";
									echo "<td>" . $row['teacher_name'] . "</td>";
									echo "<td>" . $row['subject'] . "</td>";
									echo "<td>" . $row['issue_start_date'] . "</td>";
									echo "<td>" . $row['issue_end_date'] . "</td>";
echo "<td>" . $row['starting_time'] . "</td>";
echo "<td>" . $row['ending_time'] . "</td>";
									echo "<td>" . $row['student_description'] . "</td>";
									echo "<td>" . $row['teacher_description'] . "</td>";
									echo "<td>";
									if($row['status']==="not seen your request yet")
									{
										echo "<font color=\"#CC6600\"><b>".$row['status']."</b></font>" . "</td>";
									}
									elseif($row['status']==="Not Approved")
									{
										echo "<font color=\"#FF0000\"><b>".$row['status']."</b></font>" . "</td>";
									}
									else
									{
										echo "<font color=\"#008A00\"><b>".$row['status']."</b></font>" . "</td>";
									}
									echo "</tr>";
								}
								echo "</table>";
								echo "</div>";
							}
							else
							{
								$_SESSION["message"]="Please select subject";
								redirect_to("issue_status.php");
							}
						}
						?> 
					</div>
				</div> <!-- end of panale -->
			</div>
			<?php echo message(); ?>
			<?php echo form_errors($errors); ?>
		</div> <!-- end of row -->

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>