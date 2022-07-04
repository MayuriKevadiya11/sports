<?php
require '../includes/db_connection.php';

$teacher_id = intval($_GET['teacher_id']);
$query="SELECT * FROM teacher_detail WHERE teacher_id={$teacher_id}";
$result_set=mysqli_query($conn,$query);
//print_r($query);
$description=mysqli_fetch_assoc($result_set);

echo nl2br("Deal by: ".$description["teacher_name"]);

?>