<?php
require '../includes/db_connection.php';

$issue_id = intval($_GET['issue_id']);
$query="SELECT * FROM issue_detail WHERE issue_id={$issue_id}";
$result_set=mysqli_query($conn,$query);
//print_r($query);
$Issue=mysqli_fetch_assoc($result_set);
echo nl2br($Issue["student_description"]);
echo "<br>";
echo "<br>";
echo "Issue Start Date:&nbsp;";
echo "<b>";
$newDate1 = date("l jS F Y", strtotime($Issue['issue_start_date']));
echo $newDate1;
echo "</b>";
echo "<br>";
echo "<br>";
echo "Issue End Date:&nbsp;";
echo "<b>";
$newDate2 = date("l jS F Y", strtotime($Issue['issue_end_date']));
echo $newDate2;
echo "</b>";
echo "<br>";
echo "<br>";
echo "Issue starting time:";
echo "<b>";
echo nl2br($Issue["starting_time"]);
echo "</b>";
echo "<br>";
echo "<br>";
echo "Issue Ending time:";
echo "<b>";
echo nl2br($Issue["ending_time"]);
?>