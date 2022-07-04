<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php") ?>
<?php 
if(!isset($_SESSION["teacher_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
	<title>Update History</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<script type="text/javascript" src="js/respond.js"></script>
</head>
<body>
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
						echo "Hi ".$_SESSION["username"]."&nbsp;&nbsp;&nbsp;";
						echo "</strong>";
						echo "<a href=\"login.php?logout\" class=\"\" >logout</a>";
						echo "</p>";
					?>
				</div>
				<div class="collapse navbar-collapse" id="collapse">
					<ul class="nav navbar-nav pull-right">
            			<li><a href="issue_history.php"><--Back to issue history</a></li>
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
					<div class="panel-body">
						<form action="manage_Update_history.php" method="post" class="col-xs-8">
							<div class="form-group">
								<label for="issueApplicationSubject">Issue Application subject:</label>
								<select id="issueApplicationSubject" name="issue_id" class="form-control">
									<?php
									$issue_id=intval($_GET['issue_id']);
									$safe_issue_id=mysqli_real_escape_string($conn, $issue_id);
									$query="SELECT * FROM issue_detail WHERE issue_id = {$safe_issue_id}";

									$issue_set = mysqli_query($conn,$query);
									//confirm_query($issue_set);
									$issue=mysqli_fetch_assoc($issue_set);
									print_r($issue);
									echo "<option value=\"{$issue_id}\">{$issue["subject"]}-by-{$issue["student_id"]}</option>";
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="status">Status:</label>
							</div>
							<div class="form-group">
								<input type="radio" name="status" id="status" value="Approved" <?php if($issue["status"]==="Approved"){echo "checked";} ?>>Approved
							</div>
							<div class="form-group">
								<input type="radio" name="status" id="status" value="Not Approved" <?php if($issue["status"]==="Not Approved"){echo "checked";} ?>>Not Approved
							</div>
							<div class="form-group">
								<label for="description">Description:</label>
							</div>
							<div class="form-group">
								<textarea name="teacher_description"  rows="15" class="form-control" id="description" ><?php echo $issue["teacher_description"]; ?></textarea>
							</div>
							<button type="submit" name="submit" class="btn btn-info btn-lg width1" >Update</button>
						</form>
					</div><!-- end of panle body -->
				</div> <!-- end of panale -->
			</div>
		</div> <!-- end of row -->
	
<!--/*==================>javascipt<===========================*/-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>