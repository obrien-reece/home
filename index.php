<?php
include("security.php");
include("dbconnect.php");
include("includes/header.php");
require('action.php');

$fetchUserData = mysqli_query($connect, "SELECT *FROM home_users WHERE email='".$_SESSION['loggedInUser']."'");
$row = mysqli_fetch_assoc($fetchUserData);
$user_fname = trim($row['fname']);
$user_lname = trim($row['lname']);
$user_username = trim($row['username']);
$user_email = trim($row['email']);
?>

<div class="container-fluid">
	<div class="col-md-9 m-auto">
		<div class="card-header bg-dark mt-2 text-light">
			<span>This is a CRUD Test Application system</span>
			<span class="float-right">
				<form method="POST" action="action.php">
				<button class="mb-1 btn btn-link" name="logoutBtn">Logout</button>
			</span>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6 mb-2">
					<label><strong>First Name</strong></label><br>
					<span style="color: grey"><?php echo $user_fname?></span>
					<hr>
					
				</div>
				<div class="col-md-6 mb-2">
					<label><strong>Last Name</strong></label><br>
					<span style="color: grey"><?php echo $user_lname?></span>
					<hr>
					
				</div>
				<div class="col-md-6 mb-2">
					<label><strong>Username</strong></label><br>
					<span style="color: grey"><?php echo $user_username?></span>
					<hr>
					
				</div>				
				<div class="col-md-6 mb-2">
					<label><strong>E-Mail</strong></label><br>
					<span style="color: grey"><?php echo $user_email?></span>
					<hr>
					
				</div>
				
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="card-header bg-dark text-light">
						<span>Make your comments here</span>
						
					</div>
					<form method="POST" action="action.php" enctype="multipart/form-data">
                   
                        <div class="text-danger">
                        <?php
                        if(isset($_SESSION['status'])){
                        	echo $_SESSION['status'];
                        	unset($_SESSION['status']);
                        }
                        ?>
                        </div>

						<div class="form-group">
							<hr>
							<label><strong>Post a comment</strong></label>
							<textarea class="form-control" rows="5" name="comments"></textarea>
							
						</div>

						<button name="commentBtn" class="btn btn-block btn-primary" type="submit">
						Post Comment
					    </button>
						
					</form>
					
				</div>
				<div class="col-md-6">


                    <?php
                    $selectUserComments = mysqli_query($connect, "SELECT *FROM home_comments ORDER BY id");
                    if(mysqli_num_rows($selectUserComments)>0){
                    while($row = mysqli_fetch_assoc($selectUserComments)){
                    $user_comments = trim($row['comments']);
                    $user_email = trim($row['email']);
                    ?>


                    <div class="card-header mb-2 bg-dark text-light">
                    	<span>Comment posted by: <span style="color: grey"><?php echo $user_email?></span></span>
                    </div>

					<div class="card-body" style="color: grey">						
						<?php echo $user_comments?>
					</div>	

					<div style="text-align: right;" class="text-light mb-2 card-footer bg-dark">
						<span>Edit</span>
					</div>			

					<?php
						}
					}else{
						echo "No Records";
					}
					?>
					
				</div>
				
			</div>
			
		</div>
		
<?php
include("includes/scripts.php");
include("includes/footer.php");
?>