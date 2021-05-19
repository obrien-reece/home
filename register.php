<?php
session_start();
include("includes/header.php");
?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Register Details Here</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
<!--       <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div> -->
  </nav>

<div class="container-fluid">
  <div class="col-md-6 m-auto py-3">
    <div class="card-header bg-dark text-center text-light">
      <span><h3>Registration Form</h3></span>      
    </div>


    <div style="text-align: center;" class="text-danger">
    <?php
    if(isset($_SESSION['status'])){
      echo $_SESSION['status'];
      unset($_SESSION['status']);
    }
    ?>
    </div>

    <div class="card-body">
      <form method="POST" action="action.php" enctype="multipart/form-data">
      <div class="row form-group">
        <div class="col-md-6 m-auto mb-4">
          <label>First Name</label>
          <input type="text" placeholder="e.g Evance" name="fname" class="form-control">
        </div>
        <div class="col-md-6 m-auto">
          <label>Last Name</label>
          <input type="text" placeholder="e.g Indeche" name="lname" class="form-control">          
        </div>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" placeholder="e.g Thatboy Reece" name="username" class="form-control">
          
        </div>
        <div class="form-group">
          <label>E-Mail</label>
          <input type="email" name="email" placeholder="e.g indecheevans@gmail.com" class="form-control">
          
        </div>
        <div class="form-group row">
          <div class="col-md-6 mb-4 ml-auto">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="col-md-6 mb-4 ml-auto">
            <label>Repeat Password</label>
            <input type="password" name="cPassword" class="form-control">
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="registerBtn">Register</button>
        <div style="text-align: center;">
          <span><small><a href="login.php">Already have an account...Login Here</a></small></span>
          
        </div>        
      </form>
    </div>
    
  </div>
  
</div>


<?php
include("includes/scripts.php");
include("includes/footer.php");
?>