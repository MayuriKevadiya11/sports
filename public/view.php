
<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/function.php") ?>
<?php
if(isset($_GET["logout"]))
{
	$_SESSION["admin_id"]=null;
	$_SESSION["username"]=null;
	$_SESSION["teacher_id"]=null;
	$_SESSION["student_id"]=null;
	$_SESSION["message"]=null;
	$_SESSION["errors"]=null;
	session_destroy();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
	<title>view</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">

	<script type="text/javascript" src="js/respond.js"></script>
	
</head>
<body>
<div class="container">
		
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
					<ul class="nav navbar-nav pull-right">
						<li><a href="login.php">Login</a></li>

					</ul>
				</div>
			</nav>
		</div>
	
<div class="container-fluide">	
  <div class="row">	
	<div class="col-md-3">
				<div class="panel panel-info ">
					 <div class="panel-heading">
						  <h3 class="panel-title"><h2 class="center">Cricket Kit</h2></h3>
					 </div>
					  <div class="panel-body">
							   <div class="form-group">
							        <div class="item">
		                                 <img src="image/p5.jpg" alt="image3" class="img-responsive img-rounded" height="200" width="200">
                                    
                                    <!--<div class="panel panel-info ">
                                    <div class="panel-heading">-->
                                    <div>
									<h2 class="panel-title"><h1 class="center">5-Kit</h1></h2>
								    <!-- <label for="InputUserID">hfjdsbjfdv</label> --> 
							   </div>
							  
					  </div>
				  </div>
				</div>
		</div>
					
	</div>
             
	<div class="col-md-3">
           <div class="panel panel-info ">
					<div class="panel-heading">
						<h3 class="panel-title"><h2 class="center">Badminton Kit</h2></h3>
					</div>
					<div class="panel-body">
							<div class="form-group">
							   <div class="item">
		                            <img src="image/p4.jpg" alt="image3" class="img-responsive img-rounded" height="200" width="200">
                                 <div>
                                     <label for="InputUserID">hfjdsbjfdv</label>
							     </div>
							    </div>
							 </div>    
					</div>		
            </div>							
				
	</div>

	<div class="col-md-3">
           <div class="panel panel-info ">
					<div class="panel-heading">
						<h3 class="panel-title"><h2 class="center">Table Tennis Kit</h2></h3>
					</div>
					<div class="panel-body">
							<div class="form-group">
							   <div class="item">
		                            <img src="image/p6.jpg" alt="image3" class="img-responsive img-rounded" height="200" width="200">
                                 <div>
                                     <label for="InputUserID">hfjdsbjfdv</label>
							     </div>
							    </div>
							 </div>    
					</div>		
            </div>							
				
	</div>


<div class="col-md-3">
           <div class="panel panel-info ">
					<div class="panel-heading">
						<h3 class="panel-title"><h2 class="center">Carrom</h2></h3>
					</div>
					<div class="panel-body">
							<div class="form-group">
							   <div class="item">
		                            <img src="image/p7.jpg" alt="image3" class="img-responsive img-rounded" height="200" width="200">
                                 <div>
                                     <label for="InputUserID">hfjdsbjfdv</label>
							     </div>
							    </div>
							 </div>    
					</div>		
            </div>							
				
	</div>
</div>
</div>


<div class="row">	
<div class="col-md-3">
           <div class="panel panel-info ">
					<div class="panel-heading">
						<h3 class="panel-title"><strong></strong><h2 class="center">volleyball</h2></strong></h3>
					</div>
					<div class="panel-body">
							<div class="form-group">
							   <div class="item">
		                            <img src="image/p9.jpg" alt="image3" class="img-responsive img-rounded" height="500" width="240">
                                 <div>
                                     <label for="InputUserID">hfjdsbjfdv</label>
							     </div>
							    </div>
							 </div>    
					</div>		
            </div>							
				
	</div>

    
	<div class="col-md-3">
           <div class="panel panel-info ">
					<div class="panel-heading">
						<h3 class="panel-title"><strong></strong><h2 class="center">Chess</h2></strong></h3>
					</div>
					<div class="panel-body">
							<div class="form-group">
							   <div class="item">
		                            <img src="image/p8.jpg" alt="image3" class="img-responsive img-rounded" height="200" width="200">
                                 <div>
                                     <label for="InputUserID">hfjdsbjfdv</label>
							     </div>
							    </div>
							 </div>    
					</div>		
            </div>							
				
	</div>
</div>	



</div>
<?php echo message(); ?>
        			<?php echo form_errors($errors); ?>
				<!-- end of panale -->
			
		 <!-- end of row -->
	
<!--/*==================>javascipt<===========================*/-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script> 
</body>	
</html> 