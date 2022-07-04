
<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=divice-width, initial-scale=1.0">
    <title>Issue History</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script type="text/javascript" src="js/respond.js"></script>
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
                    </button>                   
                    <?php
                        echo "<p class=\"navbar-brand\">";
                        echo "<strong>"; 
                        echo "Hi "."admin" ."&nbsp;&nbsp;&nbsp;";
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
<?php
$branch = $_POST['branch']; 
$semester = $_POST['semester'];

//$sql= " SELECT * FROM issue_detail WHERE branch = '$branch' AND semester= '$semester ' ";
$result = mysqli_query( $conn," SELECT * FROM issue_detail WHERE branch = '$branch' AND semester = '$semester' ");

	
		//confirm_query($res);
		//if($result->num_rows > 0)
		//{
		//$_SESSION["message"]="Username or Password is incorrect";
			//redirect_to("display_history.php");
		//}
		//else
		//{
		

	
//if($result === FALSE) { 
    //die("database failed") ; // TODO: better error handling
//}
if($_POST["branch"]!="$branch")
{
    $_SESSION["message"]="Please Select Login Type";
    redirect_to("display_history.php");
}
else
{
echo "<table class=\"table table-hover\">
        <tr class=\"success\">
            <th>Issue ID</th>
            <th>Student ID</th>
            <th>Teacher Name</th>
            <th>Branch</th>
            <th>Semester</th>
            <th>Subject</th>
            <th>Issue Start Date</th>
            <th>Issue  End Date</th>
            <th>Issue Start Time</th>
             <th>Issue End Time</th>

                        
           
            <th>Teacher Description</th>

            <th colspan=\"2\">Status</th>
        </tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['issue_id'] . "</td>";
    echo "<td>" . $row['student_id'] . "</td>";
    echo "<td>" . $row['teacher_name'] . "</td>";

    echo "<td>" . $row['branch'] . "</td>";

    echo "<td>" . $row['semester'] . "</td>";
    echo "<td>" . $row['subject'] . "</td>";
    $newDate1 = date("l jS F Y", strtotime($row['issue_start_date']));
    echo "<td>" . $newDate1 . "</td>";
    $newDate2 = date("l jS F Y", strtotime($row['issue_end_date']));
    echo "<td>" . $newDate2 . "</td>";
    echo "<td>" . $row['starting_time'] . "</td>";
    echo "<td>" . $row['ending_time'] . "</td>";
   
    echo "<td>" . $row['teacher_description'] . "</td>";
    echo "<td>";
    if($row['status']==="Not Approved")
    {
        echo  "<font color=\"#FF0000\"><b>".$row['status']."</b></font>" . "</td>";
    }
    else
    {
        echo  "<font color=\"#008A00\"><b>".$row['status']."</b></font>" . "</td>";
    }
  
}
echo "</table>";

}
mysqli_close($conn);

?>
<div id="txtHint" class="table-responsive"> </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>