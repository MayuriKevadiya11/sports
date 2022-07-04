<?php
require '../includes/db_connection.php';

$issue_id = intval($_GET['issue_id']);
//echo $issue_id;
$query="SELECT * FROM issue_detail WHERE issue_id={$issue_id}";
$result_set1=mysqli_query($conn,$query);
//print_r($query);
$issue_detail=mysqli_fetch_assoc($result_set1);
//$teacher_name=$issue_detail['teacher_name'];
//$query="SELECT * FROM teacher_detail WHERE teacher_name={$teacher_name}";
//$result_set=mysqli_query($conn,$query);
//print_r($query);
//$teacher_detail=mysqli_fetch_assoc($result_set);

echo nl2br("Deal by: ".$issue_detail["teacher_name"]);

?>