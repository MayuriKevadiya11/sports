<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/function.php") ?>
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
	<title>Issue History</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<script type="text/javascript" src="js/respond.js"></script>
	<script>
	function showUser(str) {
    	if (str == "") {
      	  document.getElementById("txtHint").innerHTML = "";
     	   return;
    	} else { 
       	 if (window.XMLHttpRequest) {
      	      // code for IE7+, Firefox, Chrome, Opera, Safari
       	     xmlhttp = new XMLHttpRequest();
       	 } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getdetail.php?issue_id="+str,true);
        xmlhttp.send();
    }
}
</script>>
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
						<li ><a href="teacher.php">Sanction Issue</a></li>
            			<li><a id="selected" href="issue_history.php">issue history</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="content"> <!-- jumbo torn --> 
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><strong><h2 class="center">Issue History</h2></strong></h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
								<label for="issueApplicationSubject">Issue Application subject:</label>
								<select id="issueApplicationSubject" name="issue_id" onchange="showUser(this.value)" class="form-control">
									<?php
									$teacher_id=$_SESSION["teacher_id"];
									$safe_teacher_id=mysqli_real_escape_string($conn, $teacher_id);
									$query="SELECT * FROM issue_detail WHERE teacher_id = {$safe_teacher_id} AND NOT status='not seen your request yet'";

									$student_set = mysqli_query($conn,$query);
									confirm_query($student_set);
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
							
							<div id="txtHint" class="table-responsive"><b>Person info will be listed here...</b></div>
					</div><!-- end of panel body -->
				</div> <!-- end of panale -->
			</div>
		</div> <!-- end of row -->
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>