<?php  
	session_start();
	// if user is already logged in, ,redirect to homepage
	if (isset($_SESSION["user"])){
		header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="./media/favicon.ico" type="image/ico">
	<title>ClearMyMind Login</title> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="registerStyle.css"> 
</head>
<body>

	<header>
	    <div class="ourLogo">
	      <p>Clear My Mind</p>
	    </div>
	 </header>

	<div class="container">
		<?php
			if (isset($_POST["login"])){
				$email = $_POST["email"];
				$password = $_POST["password"];

				require_once "database.php";
				$sql = "SELECT * FROM users WHERE email = '$email'";
				$result = mysqli_query($conn, $sql);
				$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
				if ($user){
					if (password_verify($password, $user["password"])){
						session_start();
						$_SESSION["user"] = $user["id"];
						header("Location: home.php");
						die();
					}
					else{
						echo "<div class='alert alert-danger'>Password is incorrect.</div>";
					}

				}else{
					echo "<div class='alert alert-danger'>Email does not exist.</div>";
				}
			}
		?>

		<form action="login.php" method="post">
			<label>Login</label>
			<div class="form-group">
  				<input class="form-control" type="email" name="email" id="" placeholder="Email" required="">
  			</div>
			<div class="form-group">
  				<input class="form-control" type="password" name="password" id="" placeholder="Password" required="">
  			</div>
  			<div class="form-btn">
	  			<input type="submit" name="login" value="Log in" class="btn btn-primary">
	  		</div>
		</form>

		<div class="link">
			<p> Don't have an account? <br> <a href="register.php">Register Here</a> </p>
		</div>
		
	</div>

</body>
</html>