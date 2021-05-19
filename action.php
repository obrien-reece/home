<?php
session_start();
include("dbconnect.php");

// if(isset($_POST['logoutBtn'])){
// 	session_start();
// 	session_unset();
// 	session_destroy();
// 	header("Location:login.php");
// }

if(isset($_POST['registerBtn'])){
	$id = mysqli_real_escape_string($connect, $_POST['id']);
	$fname = mysqli_real_escape_string($connect, $_POST['fname']);
	$lname = mysqli_real_escape_string($connect, $_POST['lname']);
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$cPassword = mysqli_real_escape_string($connect, $_POST['cPassword']);

	if($password!=$cPassword){
		$_SESSION['status'] = "Passwords do not match";
		header("Location:register.php");
	}else{
		$checkEmail = mysqli_query($connect, "SELECT *FROM home_users WHERE email='$email'");
		if(mysqli_num_rows($checkEmail)>0){
			$_SESSION['status'] = "E-mail already exists";
	        header("Location:register.php");
		}else{
			$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
		    $saveUser = mysqli_query($connect, "INSERT INTO home_users(fname,lname,username,email,password)VALUES('$fname','$lname','$username','$email','$hashedPassword')");

			if(!$saveUser){
					$_SESSION['status'] = "An error occured...please try again";
					header("Location:register.php");							
			}else{
				$_SESSION['loggedInUser'] = $email;
				header("Location:index.php");
			}
		}
	}
}

if(isset($_POST['loginBtn'])){	
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	
	$checkEmail = mysqli_query($connect, "SELECT *FROM home_users WHERE email='email'");
	$row = mysqli_fetch_assoc($checkEmail);
	$user_pass = trim($row['password']);
	if($row['email'] === $email){
		if(password_verify($password, $user_pass)){
            $_SESSION['loggedInUser'] = $email;
            header("Location:index.php");
		}else{
                $_SESSION['status'] = "Password and E-mail combination is invalid";
                header("Location:login.php");			
		}
	}else{
		$_SESSION['status'] = "Password and E-mail combination is invalid";
		header("Location:index.php");
	}
}

if(isset($_POST['commentBtn'])){
	$id = mysqli_real_escape_string($connect, $_POST['id']);
	$comments = mysqli_real_escape_string($connect, $_POST['comments']);
	$email = $_SESSION['loggedInUser'];

	$postComment = mysqli_query($connect, "INSERT INTO home_comments(comments,email)VALUES('$comments','$email')");
	if(!$postComment){
	        $_SESSION['status'] = "An error occured...Please try again";
            header("Location:index.php");	
	}else{
            $_SESSION['status'] = "<hr>Comment posted successfully";
            header("Location:index.php?reason=".$_SESSION['status']);	
	}
}
?>
