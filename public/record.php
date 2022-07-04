<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/function.php") ?>
<?php 
if(!isset($_SESSION["admin_id"]) && !isset($_SESSION["username"]))
{
  redirect_to("login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
	<title>Add Equipment</title>
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
					</div>
				<div class="collapse navbar-collapse" id="collapse">
					<ul class="nav navbar-nav nav-pills pull-right">
						<li><a href="admin.php">Back</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="content">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><strong><h2 class="center">Add Equipment</h2></strong></h3>
					</div>
					<div class="panel-body">
<!-- here form start --><form action="manage_record.php" method="post" class="col-xs-8">
                            <div class="form-group">
								<label for="InputId">Game Name</label>
								<input type="text" class="form-control" name="game_name" id="InputName" required  placeholder="Enter game name.." autofocus>
							</div>

							<div class="form-group">
								<label for="InputId">Stock</label>
								<input type="text" class="form-control" name="stock" id="InputNumber" required  placeholder="Enter Stock .." autofocus>
							</div>

							<button type="submit" name="submit" class="btn btn-info btn-lg width1" >Add</button>
						</form>	
					</div>
				</div>	
			</div>
		</div>	

	</div>
</body>
</html>
				