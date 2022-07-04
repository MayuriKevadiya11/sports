<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php") ?>
<?php 
if(!isset($_SESSION["student_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
	<title>Issue Application</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="js/jquery-ui.min.css">
	<link rel="stylesheet" href="js/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="js/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="style.css" />
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
	        xmlhttp.open("GET","show_teacher_name.php?teacher_id="+str,true);
	        xmlhttp.send();
	    }
	}
	</script>

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
			<div class="content"> <!-- jumbo torn --> 
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><strong><h2 class="center">Issue Application Form</h2></strong></h3>
					</div>
					<div class="panel-body">
						<form action="manage_issue_application.php" method="post" class="col-xs-8">
							<div class="form-group">
								<label for="InputTeacherName">Teacher name<span class="required">*</span></label>
							</div>

							<div class="form-group">
								<select name="teacher_name" id="InputTeacherID" class="form-control" onchange="showUser(this.value)">
									<?php
                                                                $student_name= intval($_GET['student_name']);
                                                                       $safe_student_name=mysqli_real_escape_string($conn, $student_name);
                                                                        
									$query="SELECT * FROM assign_teacher_detail WHERE student_name= {$safe_student_name}";
                                                                        //Print_r($query); 
                                                                        $teacher_set = mysqli_query($conn,$query);
                                                                      
									//confirm_query($teacher_set);
									$teacher_count= mysqli_num_rows($teacher_set);
									echo "<option value=\"default\">select name..</option>";
									for($count=1;$count<=$teacher_count;$count++)
									{
										$teacher=mysqli_fetch_assoc($teacher_set);
										echo "<option value=\"{$teacher["teacher_name"]}\">{$teacher["teacher_name"]}</option>";
									}
									?>
								</select>
								<div id="txtHint"></div>
							</div>


  <fieldset>
    
       <div class="form-group">
     <?php

     $teacher_name1=$_POST['teacher_name'];
       $query1="SELECT teacher_id FROM teacher_detail WHERE teacher_name={$teacher_name1}";
        $teacher_set1 = mysqli_query($conn,$query1);
        ?>
     
      <input type="hidden" name="teacher_id" value="1">
</div>

    
    <div class="form-group">
      <label  for="branch">Branch</label>
</div>
      
                                                   <div class="form-group">
				                        <input type ="text" class="form-control" id="branch"  name="branch" 
								<?php
									$student_id=$_SESSION["student_id"];
									$safe_student_id=mysqli_real_escape_string($conn, $student_id);
									$query="SELECT branch FROM student_detail WHERE student_id = {$safe_student_id}";
                                                                         $student_set = mysqli_query($conn,$query);
									confirm_query($student_set);
                                                                        $student=mysqli_fetch_assoc($student_set);
								      echo "value=\"{$student["branch"]}\""; 
                                                                ?>
                                                                > 
                                                                </div>

     <!--   <select  input type ="text" class="form-control" id="branch"  name="branch">
          <option value="default">Select Branch..</option>
          <option>COMPUTER</option>
          <option>INFORMATION TECHNOLOGY</option>
          <option>ELECTRICAL</option>
          <option>CIVIL</option>
          <option>MECHANICAL</option>-->
          
        
      
 
   
    
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
								<label for="InputSubject">Subject</label>
								<input type="text" class="form-control" name="subject" id="InputSubject" required placeholder="Enter subject.." >
							</div>
							<div class="form-group">
								<label for="InputDescription">Description</label>
								<textarea name="student_description" class="form-control" rows="15" required placeholder="Enter the description here." id="InputDescription"></textarea>
							</div>



<div class="form-group">
								<label for="InputStartDate"> Starting Date and Time</label>
								<input type="text" name="start_date" class="form-control " id="datetimepicker1" required placeholder="Enter  Starting Date ..">
							</div>
<div class="form-group">
								<label for="InputEndDate"> Ending Date and Time</label>
								<input type="text" name="end_date" class="form-control " id="datetimepicker2" required placeholder="Enter Ending Date..">
							</div>
<form class="form-horizontal">
  <fieldset>
    
    <div class="form-group">
      <label class="col-lg-2 control-label" for="starting_time">Starting Time</label>
      <div class="col-lg-10">
        <select
input type="text" name="start_time" class="form-control" id="starting_time">
          <option>12:00 AM</option>
          <option>12:15 AM</option>
          <option>12:30 AM</option>
          <option>12:45 AM</option>
          <option>1:00 AM</option>
          <option>1:15 AM</option>
          <option>1:30 AM</option>
          <option>1:45 AM</option>
          <option>2:00 AM</option>
          <option>2:15 AM</option>
          <option>2:30 AM</option>
          <option>2:45 AM</option>
          <option>3:00 AM</option> 
          <option>3:15 AM</option>
          <option>3:30 AM</option>
          <option>3:45 AM</option>
          <option>4:00 AM</option>
          <option>4:15 AM</option>
          <option>4:30 AM</option>
          <option>4:45 AM</option>
          <option>5:00 AM</option>
          <option>5:15 AM</option>
          <option>5:30 AM</option>
          <option>5:45 AM</option>
          <option>6:00 AM</option>
          <option>6:15 AM</option>
          <option>6:30 AM</option>
          <option>6:45 AM</option>
          <option>7:00 AM</option>
          <option>7:15 AM</option>
          <option>7:30 AM</option>
          <option>7:45 AM</option>
          <option>8:00 AM</option>
          <option>8:15 AM</option>
          <option>8:30 AM</option>
          <option>8:45 AM</option>
          <option>9:00 AM</option>
          <option>9:15 AM</option>
          <option>9:30 AM</option>
          <option>9:45 AM</option>
          <option>10:00 AM</option>
          <option>10:15 AM</option>
          <option>10:30 AM</option>
          <option>10:45 AM</option>
          <option>11:00 AM</option>
          <option>11:15 AM</option>
          <option>11:30 AM</option>
          <option>11:45 AM</option>
          <option>12:00 PM</option>
          <option>12:15 PM</option>
          <option>12:30 PM</option>
          <option>12:45 PM</option>
          <option>1:00 PM</option>
          <option>1:15 PM</option>
          <option>1:30 PM</option>
          <option>1:45 PM</option>
          <option>2:00 PM</option>
          <option>2:15 PM</option>
          <option>2:30 PM</option>
          <option>2:45 PM</option>
          <option>3:00 PM</option> 
          <option>3:15 PM</option>
          <option>3:30 PM</option>
          <option>3:45 PM</option>
          <option>4:00 PM</option>
          <option>4:15 PM</option>
          <option>4:30 PM</option>
          <option>4:45 PM</option>
          <option>5:00 PM</option>
          <option>5:15 PM</option>
          <option>5:30 PM</option>
          <option>5:45 PM</option>
          <option>6:00 PM</option>
          <option>6:15 PM</option>
          <option>6:30 PM</option>
          <option>6:45 PM</option>
          <option>7:00 PM</option>
          <option>7:15 PM</option>
          <option>7:30 PM</option>
          <option>7:45 PM</option>
          <option>8:00 PM</option>
          <option>8:15 PM</option>
          <option>8:30 PM</option>
          <option>8:45 PM</option>
          <option>9:00 PM</option>
          <option>9:15 PM</option>
          <option>9:30 PM</option>
          <option>9:45 PM</option>
          <option>10:00 PM</option>
          <option>10:15 PM</option>
          <option>10:30 PM</option>
          <option>10:45 PM</option>
          <option>11:00 PM</option>
          <option>11:15 PM</option>
          <option>11:30 PM</option>
          <option>11:45 PM</option>
        </select>
      
      </div>
    </div>
    
    <br>
    <div class="form-group">
      <label class="col-lg-2 control-label" for="ending_time"> Ending Time</label>
       <div class="col-lg-10">
        <select
 input type="text" name="end_time" class="form-control" id="ending_time">
          <option>12:00 AM</option>
          <option>12:15 AM</option>
          <option>12:30 AM</option>
        <option>12:45 AM</option>
          <option>1:00 AM</option>
          <option>1:15 AM</option>
          <option>1:30 AM</option>
          <option>1:45 AM</option>
          <option>2:00 AM</option>
          <option>2:15 AM</option>
          <option>2:30 AM</option>
          <option>2:45 AM</option>
          <option>3:00 AM</option> 
          <option>3:15 AM</option>
          <option>3:30 AM</option>
          <option>3:45 AM</option>
          <option>4:00 AM</option>
          <option>4:15 AM</option>
          <option>4:30 AM</option>
          <option>4:45 AM</option>
          <option>5:00 AM</option>
          <option>5:15 AM</option>
          <option>5:30 AM</option>
          <option>5:45 AM</option>
          <option>6:00 AM</option>
          <option>6:15 AM</option>
          <option>6:30 AM</option>
          <option>6:45 AM</option>
          <option>7:00 AM</option>
          <option>7:15 AM</option>
          <option>7:30 AM</option>
          <option>7:45 AM</option>
          <option>8:00 AM</option>
          <option>8:15 AM</option>
          <option>8:30 AM</option>
          <option>8:45 AM</option>
          <option>9:00 AM</option>
          <option>9:15 AM</option>
          <option>9:30 AM</option>
          <option>9:45 AM</option>
          <option>10:00 AM</option>
          <option>10:15 AM</option>
          <option>10:30 AM</option>
          <option>10:45 AM</option>
          <option>11:00 AM</option>
          <option>11:15 AM</option>
          <option>11:30 AM</option>
          <option>11:45 AM</option>
          <option>12:00 pM</option>
          <option>12:15 pM</option>
          <option>12:30 pM</option>
          <option>12:45 pM</option>
          <option>1:00 PM</option>
          <option>1:15 PM</option>
          <option>1:30 PM</option>
          <option>1:45 PM</option>
          <option>2:00 PM</option>
          <option>2:15 PM</option>
          <option>2:30 PM</option>
          <option>2:45 PM</option>
          <option>3:00 PM</option> 
          <option>3:15 PM</option>
          <option>3:30 PM</option>
          <option>3:45 PM</option>
          <option>4:00 PM</option>
          <option>4:15 PM</option>
          <option>4:30 PM</option>
          <option>4:45 PM</option>
          <option>5:00 PM</option>
          <option>5:15 PM</option>
          <option>5:30 PM</option>
          <option>5:45 PM</option>
          <option>6:00 PM</option>
          <option>6:15 PM</option>
          <option>6:30 PM</option>
          <option>6:45 PM</option>
          <option>7:00 PM</option>
          <option>7:15 PM</option>
          <option>7:30 PM</option>
          <option>7:45 PM</option>
          <option>8:00 PM</option>
          <option>8:15 PM</option>
          <option>8:30 PM</option>
          <option>8:45 PM</option>
          <option>9:00 PM</option>
          <option>9:15 PM</option>
          <option>9:30 PM</option>
          <option>9:45 PM</option>
          <option>10:00 PM</option>
          <option>10:15 PM</option>
          <option>10:30 PM</option>
          <option>10:45 PM</option>
          <option>11:00 PM</option>
          <option>11:15 PM</option>
          <option>11:30 PM</option>
          <option>11:45 PM</option>
        </select>
      
      </div>
    </div>
    </br>
  </fieldset>






<button type="submit" name="submit" class="btn btn-info btn-lg width1" >Apply</button>
						</form>
					</div><!-- end of panle body -->
					<?php echo message(); ?>
        			<?php echo form_errors($errors); ?>
				</div> <!-- end of panale -->
			</div>
		</div> <!-- end of row -->
	
	
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/date.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php


    include('way2sms-api.php');
    sendWay2SMS ( '9664595920' , 'A2789M' , '9428590613' , 'New Application Found'); 
	//sendWay2SMS ( 'username' , 'password' , '8140056040' , 'test message');  
    
?>