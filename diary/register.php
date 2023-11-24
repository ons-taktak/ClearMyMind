<?php  
	session_start();
	// if user is already logged in, ,redirect to homepage
	if (isset($_SESSION["user"])){
		header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./media/favicon.ico" type="image/ico">
  <title>ClearMyMind Signup</title> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="stylesheet" href="registerStyle.css"> 
</head>
</head>


<body>
	<header>
	    <div class="ourLogo">
	      <p>Clear My Mind</p>
	    </div>
	 </header>

  <div class="container">
  	<!-- PHP sign up methods -->
  	<?php
		if (isset($_POST["submit"])){
			$fullName = $_POST["fullname"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$passwordRepeat = $_POST["repeat_password"];

			$passwordHash = password_hash($password, PASSWORD_DEFAULT);
			
			// An array to keep track of any errors in the entry fields
			$errors = array();

			// if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)){
			// 	array_push($errors, "All fields are required");
			// }
			// if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			// 	array_push($errors, "Email is not valid");
			// }
			if (strlen($password)<8){
				array_push($errors, "Password must be at least 8 characters long");
			}
			if ($password!== $passwordRepeat){
				array_push($errors, "Passwords do not match");
			}

			require_once "database.php";
			// Check if email already exists in datbase
			// and if it does, add the error to the error array
			$sql = "SELECT * FROM users WHERE email = '$email' ";
			$result = mysqli_query($conn, $sql);
			$rowCount = mysqli_num_rows($result);
			if ($rowCount>0){
				array_push($errors, "Email already exists!");
			}

			// If the errors array is not empty, display the errors to the user
			if (count($errors)>0){
				foreach($errors as $error){
					echo "<div class='alert alert-danger'>$error</div>";
				}

			}
			// If there are no errors, save data into database
			else {
				
				$sql = "INSERT INTO users (full_name, email, password) VALUES (?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				$prepareStmt = mysqli_stmt_prepare($stmt, $sql);
				if ($prepareStmt){
					mysqli_stmt_bind_param($stmt,"sss",$fullName,$email,$passwordHash);
					mysqli_stmt_execute($stmt);
					echo "<div class='alert alert-success'>You are registered Successfully.</div>";
				}else{
					die("Something went wrong.");
				}
				
			}	
		}

   ?>
  	<form action="register.php" method="post">
  		<label>Sign up</label>
  		<div class="form-group">
  			<input class="form-control" type="text" name="fullname" placeholder="Full Name" required="">
  		</div>
  		<div class="form-group">
  			<input class="form-control" type="email" name="email" id="" placeholder="Email" required="">
  		</div>
  		<div class="form-group">
  			<input class="form-control" type="password" name="password" id="" placeholder="Password" required="">
  		</div>
  		<div class="form-group">
  			<input class="form-control" type="password" name="repeat_password" id="" placeholder="Confirm Password" required="">
  		</div>
  		<div class="form-btn">
  			<input type="submit" name="submit" value="Sign up" class="btn btn-primary">
  		</div>
  		
  	</form>

  	<div class="link">
		<p> Already have an account? <br> <a href="login.php">Login Here</a> </p>
	</div>
  	
  </div>

	

</body>
</html>