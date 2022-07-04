<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php 
if(!isset($_SESSION["student_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}




?>

<?php
     $teacher_name=mysql_prep($_POST["teacher_name"]);
     $query="SELECT teacher_id FROM teacher_detail WHERE teacher_name={$teacher_name}";

      $result_set=mysqli_query($conn,$query);
       $teacher_id=mysqli_fetch_assoc($result_set);
	if(isset($_POST['submit']))
	{
		//Attemp to insert data to table
		$student_id=$_SESSION["student_id"];
		$safe_student_id=mysqli_real_escape_string($conn, $student_id);
		//$teacher_id1=intval($_POST['teacher_id']);
		//$query="SELECT * FROM teacher_detail WHERE teacher_id={$teacher_id1}";
		//print_r($query);
	   //$result_set=mysqli_query($conn,$query);
       //$student=mysqli_fetch_assoc($result_set);
       //$teacher_id=$student['teacher_id1'];
       //echo "$teacher_id";
		$teacher_name=mysql_prep($_POST["teacher_name"]);

		$teacher_id=mysql_prep($_POST["teacher_id"]);
		$branch=mysql_prep($_POST["branch"]);
		$semester=mysql_prep($_POST["semester"]);
		$subject=mysql_prep($_POST["subject"]);
		$student_description=mysql_prep($_POST["student_description"]);
		$start_date=mysql_prep($_POST["start_date"]);
		$end_date=mysql_prep($_POST["end_date"]);
                
		$starting_time=mysql_prep($_POST["start_time"]);

		$ending_time=mysql_prep($_POST["end_time"]);

		if($teacher_name!="default")
		{
			$query="INSERT INTO issue_detail(student_id,teacher_id,teacher_name,branch,semester,subject,student_description,issue_start_date,issue_end_date,starting_time,ending_time) VALUES('{$safe_student_id}','{$teacher_id}','{$teacher_name}','{$branch}','{$semester}','{$subject}','{$student_description}','{$start_date}','{$end_date}','{$starting_time}','{$ending_time}')";
			$result_set=mysqli_query($conn,$query);
			//confirm_query($result_set);
			$issue_id=mysqli_insert_id($conn);
			if($result_set)
			{
				$_SESSION["message"] ="Issue submit successfully."."<br>"."Your Issue ID: "."<b>"."{$issue_id}"."</b>";
				redirect_to("issue_application.php");			
			}
			else
			{
				$_SESSION["message"]="Issue submition failed.";
				redirect_to("issue_application.php");
			}	
		}
		else
		{
			$_SESSION["message"]="Please select teacher ID.";
			redirect_to("issue_application.php");
		}
		
		
	}
?>
<!--/*==================>Closing connection<===========================*/-->
<?php 
	// 5.closing database connection
	if(isset($conn))
	mysqli_close($conn);
?> 