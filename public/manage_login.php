<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>

<?php
if($_POST["login_type"]=="default")
{
	$_SESSION["message"]="Please Select Login Type";
	redirect_to("login.php");
}
elseif(isset($_POST['submit']))
{


	echo $_POST["submit"];

			// Attempt Login

	$user_id=mysql_prep($_POST["user_id"]);
	// echo "$username";
	$password=mysql_prep($_POST["password"]);
	// echo "$password";
	$login_type=mysql_prep($_POST["login_type"]);
	// print_r(expression)
	if($login_type==1)
	{
		$query="SELECT * FROM admin_login WHERE id={$user_id} AND password='{$password}' LIMIT 1";
		$res=mysqli_query($conn, $query);
	
		//confirm_query($res);
		if($res->num_rows > 0)
		{
			$admin=mysqli_fetch_assoc($res);
			echo "<pre>";
			print_r($admin);
			echo "</pre>";
			$_SESSION["admin_id"]=$admin["id"];
			$_SESSION["username"]=$admin["username"];
			redirect_to("admin.php");
		}
		else
		{
			$_SESSION["message"]="Username or Password is incorrect";
			redirect_to("login.php");
		}
	}
	elseif($login_type==3)
	{
		$query="SELECT * FROM teacher_detail WHERE teacher_id={$user_id} AND teacher_password='{$password}' LIMIT 1";
		
		$res=mysqli_query($conn, $query);

		confirm_query($res);
		if($res->num_rows > 0)
		{
			$teacher=mysqli_fetch_assoc($res);
			echo "<pre>";
			print_r($teacher);
			echo "</pre>";
			$_SESSION["teacher_id"]=$teacher["teacher_id"];
			$_SESSION["username"]=$teacher["teacher_name"];
			redirect_to("teacher.php");
		}
		else
		{
			$_SESSION["message"]="Username or Password is incorrect";
			redirect_to("login.php");
		}
	}
	elseif($login_type==2)
	{
		$query="SELECT * FROM student_detail WHERE student_id={$user_id} AND student_password='{$password}' LIMIT 1";

		$res=mysqli_query($conn, $query);
	
		confirm_query($res);
		if($res->num_rows > 0)
		{
			$student=mysqli_fetch_assoc($res);
			echo "<pre>";
			print_r($student);
			echo "</pre>";
			$_SESSION["student_id"]=$student["student_id"];
			$_SESSION["username"]=$student["student_name"];
			redirect_to("index.php");
		}
		else{
			$_SESSION["message"]="Username or Password is incorrect";
			redirect_to("login.php");
		}
	}
}
else
{

} 
?>

	<?php 
	// 5.closing database connection
	if(isset($conn))
		mysqli_close($conn);
	?> 