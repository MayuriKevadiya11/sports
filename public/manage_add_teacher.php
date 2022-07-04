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
	$teacher_id=mysql_prep($_POST["teacher_id"]);
	$teacher_name=mysql_prep($_POST["teacher_name"]);
	$teacher_password=mysql_prep($_POST["teacher_password"]);
	$teacher_gender=mysql_prep($_POST["teacher_gender"]);
	$teacher_email=mysql_prep($_POST["teacher_email"]);
	$teacher_phone_no=mysql_prep($_POST["teacher_phone_no"]);
	if($teacher_gender!="default")
	{
		$query="INSERT INTO teacher_detail(teacher_id,teacher_name,teacher_password,teacher_gender,teacher_email,teacher_phone_no) VALUES('{$teacher_id}','{$teacher_name}','{$teacher_password}','{$teacher_gender}','{$teacher_email}',{$teacher_phone_no})";
		$teacher_set=mysqli_query($conn, $query);
		//confirm_query($teacher_set);
		$teacher_id=mysqli_insert_id($conn);
		if($teacher_set)
		{
		$_SESSION["message"] ="teacher recorde created successfully."."<br>"."your id:"."<b>"."{$teacher_id}"."</b>"."<br>"."Password:"."<b>"."{$teacher_password}"."</b>";
		redirect_to("add_teacher.php");			
		}
		else
		{
		$_SESSION["message"]="teacher recorde Creation failed.";
		redirect_to("add_teacher.php");
		}
	}
	else
	{
		$_SESSION["message"]="Please select any gender";
		redirect_to("add_teacher.php");
	}
}

?>

<!--/*==================>Closing connection<===========================*/-->
<?php 
	// 5.closing database connection
	if(isset($conn))
	mysqli_close($conn);
?> 