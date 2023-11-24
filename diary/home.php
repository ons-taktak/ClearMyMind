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
	<title>ClearMyMind</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

	<header>
		<div class="navbar">

			<?php 
			print_r($user["id"]);

			 ?>
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

	<div id="home" class="main">
		<div class="firstRow">
			<div class="pillManagement">
				<p>Pill Management</p>
				<div class="tab">
					<button class="tablinks" onclick="openTab(event, 'prescs')" id="defaultOpen">Prescriptions</button>
					<button class="tablinks" onclick="openTab(event, 'intake')">Intake Log</button>
				</div>

				<div id="prescs" class="tabcontent">
					<div>Prescriptions will be here. </br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>

				<div id="intake" class="tabcontent">
					<div>Intake log will be here.</div>
				</div>
			</div>
			<div class="right_container">
				<div class="calendar">
					<div id="calendar-header">
					<span id="month-prev" class="change-month"><</span>
					<h3 id="month">December 2023</h3>
					<span id="month-next" class="change-month">></span>
					</div>
					
					<div id="cal-body">
						<div>Su</div>
						<div>Mo</div>
						<div>Tu</div>
						<div>We</div>
						<div>Th</div>
						<div>Fr</div>
						<div>Sa</div>
						<div class="diff-month">26</div>
						<div class="diff-month">27</div>
						<div class="diff-month">28</div>
						<div class="diff-month">29</div>
						<div class="diff-month">30</div>
						<div>1</div>
						<div>2</div>
						<div>3</div>
						<div>4</div>
						<div>5</div>
						<div>6</div>
						<div>7</div>
						<div>8</div>
						<div>9</div>
						<div>10</div>
						<div>11</div>
						<div>12</div>
						<div>13</div>
						<div>14</div>
						<div>15</div>
						<div>16</div>
						<div>17</div>
						<div>18</div>
						<div>19</div>
						<div>20</div>
						<div>21</div>
						<div>22</div>
						<div>23</div>
						<div>24</div>
						<div>25</div>
						<div>26</div>
						<div>27</div>
						<div>28</div>
						<div>29</div>
						<div>30</div>
						<div>31</div>
						<div class="diff-month">1</div>
						<div class="diff-month">2</div>
						<div class="diff-month">3</div>
						<div class="diff-month">4</div>
						<div class="diff-month">5</div>
						<div class="diff-month">6</div>
					</div>
					<div id="calendar-footer"></div>
					
				</div>

				<div class="mood">
					<div id="mood-header">
						<h3> Today's Mood</h3>
					</div>
					<div class="mood-scale">
						<!-- Number scale starts -->
						<span><i class="fa-regular fa-face-angry"></i></span>
						<span><i class="fa-regular fa-face-sad-cry"></i></span> 
						<span><i class="fa-regular fa-face-sad-tear"></i></span>
						<span><i class="fa-regular fa-face-frown"></i></span>
						<span><i class="fa-regular fa-face-meh"></i></span>
						<span><i class="fa-regular fa-face-smile"></i></span>
						<span><i class="fa-regular fa-face-smile-beam"></i></span>
						<span><i class="fa-regular fa-face-laugh"></i></span>
						<span><i class="fa-regular fa-face-laugh-beam"></i></span>
						
					  </div>
				</div>

			</div>
		</div>

		<div class="secondRow">
			<div class="diary">
				<p>Diary</p>
				<div class="tab">
					<button class="tablinks2" onclick="openTab2(event, 'newEntry')" id="defaultOpen2">Add Entry</button>
					<button class="tablinks2" onclick="openTab2(event, 'entries')">Diary</button>
				</div>

				<div id="newEntry" class="tabcontent2">

					<?php
						require_once "database.php";
						if (isset($_POST["submit"])){
							$title = $_POST['title'];
							$content=$_POST['content'];

							
							$sql = "INSERT INTO journalEntries (user_id, title, content) VALUES (?,?,?)";
							$stmt = mysqli_stmt_init($conn);
							$prepareStmt = mysqli_stmt_prepare($stmt, $sql);
							if ($prepareStmt){
								mysqli_stmt_bind_param($stmt,"sss",$_SESSION["user"],$title,$content);
								mysqli_stmt_execute($stmt);
								// echo "<div class='alert alert-success'>Entry Posted Successfully.</div>";
							}else{
								die("Something went wrong.");
							}
						}
 
					?>
					<form action="home.php" method="post" style="height: 100%;">
						<textarea id="title" name="title" style="width: 100%; height: 10%; padding: 10px;" placeholder="Title here"></textarea>
						<textarea id="main-text-data" name="content" style="width: 100%; height: 80%; padding: 10px;" placeholder="Create a new journal!"></textarea>
						<button type="submit" name="submit" id="submit-btn">Submit</button>
					</form>
				</div>

				<div id="entries" class="tabcontent2">
					<?php  

						$sql = "SELECT * FROM journalEntries WHERE user_id = " .$_SESSION["user"];
						$entries = mysqli_query($conn, $sql);
						// $entries = mysqli_fetch_array($result, MYSQLI_ASSOC);
						// echo "hi".$entries->num_rows;

						if ($entries->num_rows > 0) {
					        // Output data of each row
					        while ($row = $entries->fetch_assoc()) {
					            echo '<div class="card">
					            <div class="content">
					                <h2>' .$row["title"] .'</h2>
					                <p>date</p>
					            </div>
					            <div class="journal-text">
					                <p>'.$row["content"].'</p>
					            </div>
					            
					        </div>';
					        }
					    }

					?>
					<!-- <div class="card">
						<div class="content">
							<h2>title</h2>
							<p>date</p>
						</div>
						<div class="journal-text">
							<p>Lorem ipsum dolor sit amet, consectetur
							adipiscing elit. Vivamus consectetur tortor arcu, ut ullamcorper
							massa egestas ut. Maecenas ornare dolor sed ullamcorper laoreet.
							Duis rhoncus sollicitudin massa, ut elementum eros imperdiet
							vitae. Donec eget odio eget nisi tincidunt fringilla. Quisque
							auctor efficitur dui a convallis. Duis nec sem sed lacus
							tristique pellentesque eget tempus augue. Donec condimentum nec
							elit fermentum tempus. Phasellus arcu elit, congue lobortis
							velit non, varius vestibulum nibh. Quisque semper lectus in
							elementum blandit. Integer commodo tellus ligula, ut cursus
							magna imperdiet ac. Sed quis sagittis risus.
			
							Etiam dignissim augue sed magna viverra faucibus. Vivamus non
							velit mi. Sed ut porttitor arcu. Curabitur sed diam congue,
							imperdiet nisl feugiat, iaculis lacus. Duis maximus ornare
							blandit. Maecenas finibus lacus tellus, vitae congue justo
							semper vel. Proin aliquet nibh at porttitor gravida.</p>
						</div>
					</div>  -->

					<!-- <form action="JournalEntry/db_get.php" method="get">
					
					</form> -->
			
					<script>
						const card = document.getElementsByClassName('journal-text');
						const cardToggle = document.getElementsByClassName('content');
						
						for (let i = 0; i < cardToggle.length; i++) {
							cardToggle[i].onclick = function(){
							card[i].classList.toggle('active');
						}
						}
					</script>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<div class="slogan"> 
			some lame slogan like : take care of your mental health
		</div>
	</footer>

	<script src="scripts.js"> </script>
	<script> 
		if ( window.history.replaceState ) {
	  	window.history.replaceState( null, null, window.location.href );
		}
	</script>
</body>
</html>