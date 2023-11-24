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
	<title>Settings</title>
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
<!-- ===================================================================== -->
	<div class="settings">
		<p>Profile Settings</p>	
		<div class="tab">
			<button class="tablinks3" onclick="openTab3(event, 'settings')" id="defaultOpen3">Personal Information</button>
			<button class="tablinks3" onclick="openTab3(event, 'notifs')">Notification Settings</button>
		</div>

		<div id="settings" class="tabcontent3">
			<div class="profile">
	          <h1>Personal Info</h1>
	          <h2>Username</h2>
	          <p>example01</p>
	          <h2>Birthday</h2>
	          <p>January 5   <button class="btn">update</button></p>
	          <h2>Gender</h2>
	          <p>Male <button class="btn">update</button></p>
	          <h2>Email</h2>
	          <p>example@example.com </p>
	          <h2>Phone Number</h2>
	          <p>+XXX-XXXXXXXXX<button class="btn">change</button></p>          
	          <h2>Password</h2>
	          <p>******** <button class="btn">Change</button></p>
	          <p><button  class="btn2" >Save Changes</button></p>
          </div>
		</div>

		<div id="notifs" class="tabcontent3">
			<div class="profile">
				<h1>Notification settings</h1>
				<h2>Notification Mode</h2>
				<p>SMS <button class="btn">update</button></p>          
				<h2>Pill Intake</h2>
				<p>5 minutes prior <button class="btn">update</button></p>
				<h2>Prescriptioin Refills</h2>
				<p> 2 pills left<button class="btn">update</button></p>          
				<h2>Appointments</h2>
				<p>24 hours prior <button class="btn">update</button></p>
				<h2>Mood Tracking</h2>
				<p>Daily, 10:00pm <button class="btn">update</button></p>
				<h2>Journaling</h2>
				<p>Daily, 06:00pm <button class="btn">update</button></p>
				<p><button  class="btn2" >Save Changes</button></p>
        	</div>
		</div>
	</div>

	<script src="scripts.js"></script>
	<script src="scripts2.js"></script>
</body>
</html>