<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php 
if(!isset($_SESSION["admin_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}
?>
<?php

if(isset($_POST['submit']))
{       $game_name=mysql_prep($_POST["game_name"]);
	$stock=mysql_prep($_POST["stock"]);
	if($game_name!="default")
	{
		$query="INSERT INTO equipment_detail(game_name,stock) VALUES('{$game_name}','{$stock}')";
		$equipment_set=mysqli_query($conn, $query);
		//confirm_query($student_set);
		$stock=mysqli_insert_id($conn);
		if($equipment_set)
		{
			$_SESSION["message"] ="Equipment recorde created successfully."."<br>"."Game:"."<b>"."{$game_name}"."</b>"."<br>"."Stock:"."<b>"."{$stock}"."</b>";
			redirect_to("record.php");
		}
		else
		{
			$_SESSION["message"]="Equipment recorde Creation failed.";
			redirect_to("record.php");
		}
	}
	else
	{
		$_SESSION["message"]="Please enter stock";
		redirect_to("record.php");
	}
}

?>

<!--/*==================>Closing connection<===========================*/-->
<?php 
	// 5.closing database connection
	if(isset($conn))
	mysqli_close($conn);
?> 