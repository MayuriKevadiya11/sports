<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php 
if(!isset($_SESSION["admin_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}
?>


<!--/*==================>add teacher code part<===========================*/-->
<?php
if(isset($_POST['submit']))
{

	$student_name=mysql_prep($_POST["student_name"]);
	$teacher_name=mysql_prep($_POST["teacher_name"]);
        echo $student_name;
        echo $teacher_name;
	if($student_name!="default" && $teacher_name!="default")
	{
               
		$query="INSERT INTO assign_teacher_detail(student_name,teacher_name) VALUES('{$student_name}','{$teacher_name}')";
		$result_set=mysqli_query($conn,$query);
		//confirm_query($result_set);
		if($result_set)
		{
			$_SESSION["message"] ="teacher assigned successfully."."<br>"."<br>"."Student with name: "."{$student_name}"." is assing to teacher with name: "."{$teacher_name}";
			redirect_to("assign_teacher_to_student.php");			
		}
		elseif(!$result_set)
		{
			$_SESSION["message"]="Already assigned";
			redirect_to("assign_teacher_to_student.php");
		}
	}
	else
	{
		$_SESSION["message"]="Please select any student or teacher";
		redirect_to("assign_teacher_to_student.php");
	}
}	

?>

<!--/*==================>Closing connection<===========================*/-->
<?php 
	// 5.closing database connection
	if(isset($conn))
	mysqli_close($conn);
?> 