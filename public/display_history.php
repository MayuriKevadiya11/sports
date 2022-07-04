<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
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
	<title>Issue history</title>
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
        xmlhttp.open("GET","getdetail_admin.php?issue_id="+str,true);
        xmlhttp.send();
    }
}
</script>>
	
</head>
<body>
<form action ="getdetail_admin.php" method="post">
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>					<?php
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


  <fieldset>
    
    <div class="form-group">
      <label  for="branch">Branch</label>
      <form action ="getdetail_admin.php" method="post">
        <select  input type ="text" class="form-control" id="branch"  name="branch">
          <option value="default">Select branch..</option>
          <option>COMPUTER</option>
          <option>INFORMATION TECHNOLOGY</option>
          <option>ELECTRICAL</option>
          <option>CIVIL</option>
          <option>MECHANICAL</option>
          
        </select>
      
 
    </div>
   
    <div class="form-group">
      <label  for="semester">Semester</label>

      <form action ="getdetail_admin.php" method="post">
     
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
  </fieldset>

							<button type="submit" name="submit" class="btn btn-info btn-lg width1" ><a href="getdetail_admin.php">Submit</a></button>
						
									<?php
									$admin_id=$_SESSION["admin_id"];
									
									//$safe_branch=mysqli_real_escape_string($conn,$branch);
									//$safe_semester=mysqli_real_escape_string($conn,$semester);
						
									//$query="SELECT * FROM issue_detail WHERE branch={$safe_branch} AND semester={$safe_semester
								//}";

									//$student_set = mysqli_query($conn,$query);
									//confirm_query($student_set);
									//$student_count= mysqli_num_rows($student_set);
							
										
									
									?>
							
							<div id="txtHint" class="table-responsive"></div>
					<!-- end of panel body -->
				 <!-- end of panale -->
			</div>
		</div> <!-- end of row -->
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</form>
</body>
</html>
	
			