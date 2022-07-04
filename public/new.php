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
	</head>
	<body>

		<?php
		                              $teacher_name1 = intval($_GET['teacher_name']);
		                              print_r($teacher_name1);
									$teacher_id=$_SESSION["teacher_id"];
									$safe_teacher_id=mysqli_real_escape_string($conn, $teacher_id);
									$query="SELECT teacher_name FROM teacher_detail WHERE teacher_id = {$safe_teacher_id} ";

                                     $result_set = mysqli_query($conn,$query);
                                     //confirm_query($student_set);
                                     $teacher_name=mysqli_fetch_assoc($result_set);
									 print_r($teacher_name);
									 $teacher=implode(" ", $teacher_name);
									 print_r($teacher);
									//$query="SELECT * FROM issue_detail WHERE teacher_name = {$teacher} AND  status='not seen your request yet'";
                                    //print_r($query);
									$student_set = mysqli_query($conn,"SELECT * FROM issue_detail WHERE teacher_name = {$teacher} AND  status='not seen your request yet'");
									//confirm_query($student_set);
									$student_count= mysqli_num_rows($student_set);
									print_r($student_set);
									//echo "<option value=\"default\">Select Subject..</option>";
									for($count=1;$count<=$student_count;$count++)
									{
										$student=mysqli_fetch_assoc($student_set);
										echo $student["subject"]-by-$student["student_id"];
									}
								
									  
								                                     

								                                     ?>
                                                                    </body>
                                                                    </html>