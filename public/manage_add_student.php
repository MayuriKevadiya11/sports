<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php 
if(!isset($_SESSION["admin_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}
?>


<!--/*==================>add student code part<===========================*/-->
<?php

if(isset($_POST['submit']))
{       $student_id=mysql_prep($_POST["student_id"]);
	$student_name=mysql_prep($_POST["student_name"]);
	$student_password=mysql_prep($_POST["student_password"]);
$branch=mysql_prep($_POST["branch"]);
$semester=mysql_prep($_POST["semester"]);
	$student_gender=mysql_prep($_POST["student_gender"]);
	$student_email=mysql_prep($_POST["student_email"]);
	$student_phone_no=mysql_prep($_POST["student_phone_no"]);
	if($student_gender!="default")
	{
		$query="INSERT INTO student_detail(student_id,student_name,student_password,branch,semester,student_gender,student_email,student_phone_no) VALUES('{$student_id}','{$student_name}','{$student_password}','{$branch}','{$semester}','{$student_gender}','{$student_email}',{$student_phone_no})";
		$student_set=mysqli_query($conn, $query);
		//confirm_query($student_set);
		$student_id=mysqli_insert_id($conn);
		if($student_set)
		{
			$_SESSION["message"] ="Student recorde created successfully."."<br>"."your id:"."<b>"."{$student_id}"."</b>"."<br>"."Password:"."<b>"."{$student_password}"."</b>";
			redirect_to("add_student.php");
		}
		else
		{
			$_SESSION["message"]="student recorde Creation failed.";
			redirect_to("add_student.php");
		}
	}
	else
	{
		$_SESSION["message"]="Please select any gender";
		redirect_to("add_student.php");
	}
}

?>

<!--/*==================>Closing connection<===========================*/-->
<?php 
	// 5.closing database connection
	if(isset($conn))
	mysqli_close($conn);
?> 