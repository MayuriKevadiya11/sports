<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php 
if(!isset($_SESSION["teacher_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}
?>


<!--/*==================>add teacher code part<===========================*/-->
<?php
if(isset($_POST['submit']))
{
	
	$issue_id=mysql_prep($_POST["issue_id"]);
	$status=mysql_prep($_POST["status"]);
	$teacher_description=mysql_prep($_POST["teacher_description"]);
	if($issue_id!="default")
	{
		$query="UPDATE issue_detail SET status='{$status}', teacher_description='{$teacher_description}' WHERE issue_id={$issue_id}";
		$result_set=mysqli_query($conn,$query);
		//confirm_query($result_set);
		if($result_set)
		{
			$_SESSION["message"] ="Status Updated.";
			redirect_to("teacher.php");
		}
		else
		{
			$_SESSION["message"] ="Status Updation Failed.";
			redirect_to("teacher.php");
		}
	}
	else
	{
		$_SESSION["message"] ="Please Select any subject";
		redirect_to("teacher.php");
	}
	
}
?>
<!--/*==================>Closing connection<===========================*/-->
<?php 
	// 5.closing database connection
	if(isset($conn))
	mysqli_close($conn);
?> 