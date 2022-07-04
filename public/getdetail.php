<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php") ?>
<?php
$issue_id = intval($_GET['issue_id']);

$sql="SELECT * FROM issue_detail WHERE issue_id = {$issue_id}";
$result = mysqli_query($conn,$sql);

echo "<table class=\"table table-hover\">
		<tr class=\"success\">
			<th>Issue ID</th>
			<th>Student ID</th>
			<th>Teacher ID</th>
			<th>Subject</th>
			<th>Issue Start Date</th>
			<th>Issue  End Date</th>

                       <th>Issue Start Time</th>
                        <th>Issue End Time</th>

                        
			<th>Student Description</th>
			<th>Teacher Description</th>

			<th colspan=\"2\">Status</th>
		</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['issue_id'] . "</td>";
    echo "<td>" . $row['student_id'] . "</td>";
    echo "<td>" . $row['teacher_id'] . "</td>";
    echo "<td>" . $row['subject'] . "</td>";
    $newDate1 = date("l jS F Y", strtotime($row['issue_start_date']));
    echo "<td>" . $newDate1 . "</td>";
    $newDate2 = date("l jS F Y", strtotime($row['issue_end_date']));
    echo "<td>" . $newDate2 . "</td>";

echo "<td>" . $row['starting_time'] . "</td>";
echo "<td>" . $row['ending_time'] . "</td>";
echo "<td>" . $row['student_description'] . "</td>";
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
    echo "<td>" . "<a href=\"update_history.php?issue_id={$row['issue_id']}\">Update</a></td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>