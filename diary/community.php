<?php  
	session_start();
	// if user is not logged in, ,don't allow access to homepage, instead redirect to login page
	if (!isset($_SESSION["user"])){
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="./media/favicon.ico" type="image/ico">
	<title>Community</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<header>
		<div class="navbar">
			<div class="logo">
				<p>Clear My Mind</p>
			</div>
			<ul class="links">
				<li class="link"><a class="navBtn" href="challenges.php">Challenges</a></li>
				<li class="link"><a class="navBtn" href="progress.php">Progress</a></li>
				<li class="link"><a class="navBtn" href="community.php">Community</a></li>
				<li class="link"><a class="navBtn" href="settings.php">Profile Settings</a></li>
			</ul>

			<div>
				<a class="logoutBtn" href="logout.php" >Logout</a>
				<a href="home.php" class="action_btn navBtn">Home</a>
			</div>
			<div class="toggle_btn" onclick="toggleOpen()">
				<i class="fa-solid fa-bars"></i>
			</div>
		</div>

		<div class="dropdown">
			<li class="link"><a class="navBtn" href="challenges.php">Challenges</a></li>
			<li class="link"><a class="navBtn" href="progress.php">Progress</a></li>
			<li class="link"><a class="navBtn" href="community.php">Community</a></li>
			<li class="link"><a class="navBtn" href="settings.php">Profile Settings</a></li>
			<li class="link"><a href="home.php" class="action_btn navBtn">Home</a></li>
			<li class="link"><a class="logoutBtn" href="logout.php" >Logout</a></li>
		</div>
	</header>

	<div class="communityContent">
		<img src="./media/community.jpeg" class="communityImg">
	</div>

	<script src="scripts.js"></script>
</body>
</html>