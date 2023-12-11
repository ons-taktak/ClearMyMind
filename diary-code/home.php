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
	<link href='https://unpkg.com/css.gg@2.0.0/icons/css/pill.css' rel='stylesheet'>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
		<div class="welcome">
			<img src="./media/title.png" width="60%">
			<a href="#firstRow" id="welcomeBtn"> Start Now </a>
			
		</div>
		<div class="firstRow" id="firstRow">
			<div class="pillManagement">
				<div class="tab">
					<button class="tablinks" onclick="openTab(event, 'intake')" id="defaultOpen">Intake History</button>
					<button class="tablinks" onclick="openTab(event, 'prescs')">Prescriptions</button>
				</div>

				<div id="intake" class="tabcontent">
					<div class="plusBtnContainer">
							<button id="intakePlusBtn" class="plusBtn" onclick="toggleForm('form-popup2')"><i class="fa-solid fa-plus"></i></button>
					</div>
					<div class="form-popup2" id="myForm2">
						<h3 style="text-align: center;"> - Log a New Intake - </h3>
						<form action="home.php#firstRow" method="post" style="height: 100%;" id="intakeForm">
							<label> Choose a medication to log your intake: </label>
							<?php
								require_once "database.php";
								$sql = "SELECT id, prescName,expired FROM activePrescriptions";
								$prescs = mysqli_query($conn, $sql);
								echo "<select name='selectChoice' class='selectChoice' required> id='selectChoice' ";
								echo '<option value="" disabled selected>Select your prescription</option>';
								while ($row = $prescs->fetch_assoc()) {
								$id = $row['id'];
								$prescName = $row['prescName']; 
								$expired = $row['expired']; 
								if ($expired == 1){
									$status = "(expired)";
								}
								else{
									$status = '';
								}
								echo '<option value="'.htmlspecialchars($id).'">'.htmlspecialchars($prescName).' '.htmlspecialchars($status).'</option>';
								}
								echo "</select>";
							?>	
							<div class="numPdate">
								<div class="pillsField">
									<label for="pillsTaken">Number of Pills Taken:</label>
									<input type="number" id="pillsTaken" name="pillsTaken" min="1" max="200" required
									oninvalid="if (this.value==''){this.setCustomValidity('Please fill out this field.')} 
									else if(this.value<1){this.setCustomValidity('You have to at least take 1 pill to log an intake.')}"  
									oninput="setCustomValidity('')">
								</div>
								<div class="dateField">
									<label for="dateTaken">Date of Intake:</label>
									<input type="date" id="dateTaken" name="dateTaken" required max="">
								</div>
							</div>
							<div class="addCancel">
								<button type="submit" name="addIntake" class="submit-btn" >Add</button>
								<button type="button"  onclick="confirmCancel('intakeForm')" class="cancel-btn">Cancel</button>
							</div>

						</form>
					
					<?php 
						if (isset($_POST["addIntake"])){
							//defining variables 
							$prescId = $_POST['selectChoice'];
							//fetching the corresponding prescription information
							$sql0 = "SELECT prescName, numPills FROM activePrescriptions WHERE id = " .$prescId;
							$result0 = mysqli_query($conn,$sql0);
							$retrievedRow = mysqli_fetch_assoc($result0);
							
							$presc_name = $retrievedRow['prescName'];
							$availablePills = $retrievedRow['numPills'];
							
							$dateTaken= $_POST['dateTaken'];
							$pillsTaken = $_POST['pillsTaken'];

							// An array to keep track of any errors in the entry fields
							$errors = array();
							if ($pillsTaken > $availablePills){
								array_push($errors, "The prescription \"".$presc_name."\" you chose only has ".$availablePills." pill(s) available for you to take.");
							}
							// If the errors array is not empty, display the errors to the user
							if (count($errors)>0){
								foreach($errors as $error){
									echo "<div class='temp-alert'>$error</div>";
								}

							}
							// If there are no errors, save data into database
							else {
								//insert into database
								$sql = "INSERT INTO intakeLog (user_id, presc_id, presc_name, pillsTaken, dateTaken) VALUES (?,?,?,?,?)";
								$stmt = mysqli_stmt_init($conn);
								$prepareStmt = mysqli_stmt_prepare($stmt, $sql);
								if ($prepareStmt){
									mysqli_stmt_bind_param($stmt,"sisis",$_SESSION["user"],$prescId,$presc_name,$pillsTaken,$dateTaken);
									mysqli_stmt_execute($stmt);
								}else{
									die("Something went wrong.");
								}
								//decerement pills or delete prescription from the database
								$sql2 = "SELECT * FROM activePrescriptions WHERE id = " .$prescId;
								$result = mysqli_query($conn,$sql2);
								$rowToUpdate = mysqli_fetch_assoc($result);
								$newValue = $rowToUpdate['numPills'] - $pillsTaken;
								
								if ($newValue == 0){
									$sql3 = "DELETE FROM activePrescriptions WHERE id = " .$prescId;
								}
								else{
									$sql3 = "UPDATE activePrescriptions SET numPills = " .$newValue ." WHERE id = " .$prescId;
								}
								mysqli_query($conn,$sql3);
							}
						}
					?>


					</div>
					<div class="historyLog"> 
						<!-- <h2>History Log: </h2> -->
						<?php  

							$sql = "SELECT * FROM intakeLog WHERE user_id = " .$_SESSION["user"]." ORDER BY id DESC ";
							$logs = mysqli_query($conn, $sql);

							if ($logs->num_rows > 0) {
								// Output data of each row
								while ($row = $logs->fetch_assoc()) {
									echo '
									<div class="intakeContainer">
										<i class="fa-solid fa-check" style="font-size:20px;"></i>
										<div class="log">
											<div class="prescFirstRow">
												<h3>' .$row["presc_name"] .'</h3>
												<p>'.$row["dateTaken"] .'</p>
											</div>
											
											<p>Pills Taken: '.$row["pillsTaken"] .'</p>

										</div>
										<button onclick="deleteRow(' . $row['id'] . ', \'delete_intake.php\')" class="deleteBtn">
											<i class="fa-regular fa-circle-xmark" style="font-size:25px;"></i> 
										</button>
									</div>';
								}
							}
							
						?>
					</div>

				</div>

				<div id="prescs" class="tabcontent">
					<div class="plusBtnContainer">
						<button class="plusBtn" onclick="toggleForm('form-popup')"><i class="fa-solid fa-plus"></i></button>
					</div>
					<div class="form-popup" id="myForm">
						<h3 style="text-align: center;"> - Add a New Prescription - </h3>
						<form action="home.php#firstRow" method="post" style="height: 100%;" id="prescForm">
							<label for="prescName">Prescription Name:</label>
							<textarea id="prescName" name="prescName" style="width: 100%; height:40px ; padding: 10px;" placeholder="Prescription Name (max: 30 characters)" maxlength="30" required></textarea>
							<div class="numPdate">
								<div class="pillsField">
									<label for="quantity">Number of Pills Available :</label>
		  							<input type="number" id="quantity" name="quantity" min="1" max="200" required
		  							oninvalid="if (this.value==''){this.setCustomValidity('Please fill out this field.')} else if(this.value<1){this.setCustomValidity('You have to have at least 1 pill to add a prescription.')} else if(this.value>200){this.setCustomValidity('There\'s no known medicine on the market with over 200 pills.')}"  oninput="setCustomValidity('')">
		  						</div>
		  						<div class="dateField">
									<label for="expiryDate">Expiry Date:</label>
		  							<input type="date" id="expiryDate" name="expiryDate" required min="">
		  						</div>
  							</div>
							<div class="addCancel">
								<button type="submit" name="addPresc" class="submit-btn">Add</button>
								<button type="button"  onclick="confirmCancel('prescForm')" class="cancel-btn">Cancel</button>
							</div>

						</form>
					</div>
					<?php 
						if (isset($_POST["addPresc"])){
							$prescName = $_POST['prescName'];
							$expiryDate= $_POST['expiryDate'];
							$quantity = $_POST['quantity'];
							$expired = 0;
	
							
							$sql = "INSERT INTO activePrescriptions (user_id, prescName, expiryDate, numPills,expired) VALUES (?,?,?,?,?)";
							$stmt = mysqli_stmt_init($conn);
							$prepareStmt = mysqli_stmt_prepare($stmt, $sql);
							if ($prepareStmt){
								mysqli_stmt_bind_param($stmt,"sssii",$_SESSION["user"],$prescName,$expiryDate,$quantity,$expired);
								mysqli_stmt_execute($stmt);
							}else{
								die("Something went wrong.");
							}

							
						}
					?>
					<div class="prescriptions"> 
						<?php  
							$sql = "SELECT * FROM activePrescriptions WHERE user_id = " .$_SESSION["user"]." ORDER BY id DESC ";
							$prescriptions = mysqli_query($conn, $sql);

							if ($prescriptions->num_rows > 0) {
								// Output data of each row
								while ($row = $prescriptions->fetch_assoc()) {
									echo '
									<div class="prescContainer">
										<div class="pillIcon"> <i class="gg-pill"></i> </div>
										<div class="prescription">
											<div class="prescFirstRow">
												<h3>' .$row["prescName"] .'</h3>'
												.($row["expiryDate"] <= date("Y-m-d") ? '<p style="color:#b35d5d; padding-top:5px;">Expired!</p>' : '').
											'</div>
											<p>Expiry date: '.$row["expiryDate"] .'</p>
											<p>Pills Available: '.$row["numPills"] .'</p>
											
										</div>
										<button onclick="deleteRow(' . $row['id'] . ', \'delete_presc.php\')" class="deleteBtn">
											<i class="fa-regular fa-circle-xmark" style="font-size:25px;"></i> 
										</button>
									</div>';
									if ($row["expiryDate"] <= date("Y-m-d")){
										$sql2 = "UPDATE activePrescriptions SET expired= 1 WHERE id= {$row["id"]}";
										mysqli_query($conn, $sql2);
									}
								}

							}
						?>

					</div>
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
						<div>Mo</div>
						<div>Tu</div>
						<div>We</div>
						<div>Th</div>
						<div>Fr</div>
						<div>Sa</div>
						<div>Su</div>
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
						<div class="today">12</div>
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
						<!-- <div class="diff-month">1</div>
						<div class="diff-month">2</div>
						<div class="diff-month">3</div>
						<div class="diff-month">4</div>
						<div class="diff-month">5</div>
						<div class="diff-month">6</div> -->
					</div>
					<div id="calendar-footer"></div>
					
				</div>

				<div class="mood">
					<div id="mood-header">
						<h3> How is your mood today ?</h3>
					</div>
					<div class="mood-scale">
						<!-- Number scale starts -->
						<span><i class="fa-regular fa-face-angry" style="color: #a84540"></i></span>
						<span><i class="fa-regular fa-face-sad-cry" style="color: #bf6460"></i></span> 
						<span><i class="fa-regular fa-face-sad-tear" style="color: #c7845d"></i></span>
						<span><i class="fa-regular fa-face-frown" style="color: #e39f78"></i></span>
						<span><i class="fa-regular fa-face-meh" style="color: #e6d08e"></i></span>
						<span><i class="fa-regular fa-face-smile" style="color: #b8d8be"></i></span>
						<span><i class="fa-regular fa-face-smile-beam" style="color: #a1d4aa"></i></span>
						<span><i class="fa-regular fa-face-laugh" style="color: #6dad79"></i></span>
						<span><i class="fa-regular fa-face-laugh-beam" style="color: #579663"></i></span>
						
					  </div>
				</div>

			</div>
		</div>

		<div class="secondRow">
			<div class="diary">
				<div class="tab">
					<button class="tablinks2" onclick="openTab2(event, 'entries')" id="defaultOpen2">My Diary</button>
					<button class="tablinks2" onclick="openTab2(event, 'newEntry')">Add Entry</button>
				</div>

				<div id="newEntry" class="tabcontent2">

					<?php
						// require_once "database.php";
						if (isset($_POST["submit"])){
							$title = $_POST['title'];
							$content=$_POST['content'];
							$entryDate=$_POST['entryDate'];

							
							$sql = "INSERT INTO journalEntries (user_id, title, content, entryDate) VALUES (?,?,?,?)";
							$stmt = mysqli_stmt_init($conn);
							$prepareStmt = mysqli_stmt_prepare($stmt, $sql);
							if ($prepareStmt){
								mysqli_stmt_bind_param($stmt,"ssss",$_SESSION["user"],$title,$content,$entryDate);
								mysqli_stmt_execute($stmt);
								// echo "<div class='alert alert-success'>Entry Posted Successfully.</div>";
							}else{
								die("Something went wrong.");
							}
						}
 
					?>
					<form action="home.php#entries" method="post" style="height: 100%;" id="diaryForm">
						<div class="title-and-date">
							<textarea id="title" name="title" style="width: 80%; height: 10%; padding: 10px;" placeholder="Title here (max: 150 characters)" maxlength="150" required></textarea>
							<input type="date" id="entryDate" name="entryDate" style="padding: 10px; width: 18%;" required>
						</div>
						<textarea id="main-text-data" name="content" style="width: 100%; height: 80%; padding: 10px;" placeholder="Create a new journal entry! (max: 10,000 characters)" maxlength="10000" required></textarea>
						<div class="addCancel"> 
							<button type="submit" name="submit" class="submit-btn2">Submit</button>
							<button type="button"  onclick="confirmCancel('diaryForm')" class="cancel-btn2">Cancel</button>
						</div>

					</form>
				</div>

				<div id="entries" class="tabcontent2">
					<div class="diaryHeader">
						<img src="./media/diaryHeader.png" width="100%" class="normal">
						<img src="./media/diaryHeaderSmaller.png" width="100%" class="smaller">
					</div>
					
					<?php  
						$sql = "SELECT * FROM journalEntries WHERE user_id = " .$_SESSION["user"]." ORDER BY id DESC ";
						$entries = mysqli_query($conn, $sql);

						if ($entries->num_rows > 0) {
					        // Output data of each row
					        while ($row = $entries->fetch_assoc()) {
					            echo '<div class="card">
					            <div class="content">
					                <h2>' .$row["title"] .'</h2>
					                <div>
					                	<p>'.$row["entryDate"].'</p>
					                	<button onclick="deleteRow(' . $row['id'] . ', \'delete_entry.php\')" class="deleteBtn2">
											<i class="fa-regular fa-circle-xmark" style="font-size:25px;"></i> 
										</button>
					                </div>
					            </div>
					            <div class="journal-text">
					                <p>'.$row["content"].'</p>
					            </div>
					            
					        </div>';
					        }
					    }

					?>
			
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
			 EMBRACE CLARITY - EMBRACE CALM - CLEAR YOUR MIND
		</div>
	</footer>

	<script src="scripts.js"> </script>
	<script> 
		if ( window.history.replaceState ) {
	  	window.history.replaceState( null, null, window.location.href );
		}

		if (document.querySelector('.temp-alert')) {
			document.getElementById("intakePlusBtn").click();
		    document.querySelectorAll('.temp-alert').forEach(function($el) {
		     $el.style.opacity = 1;
		    setTimeout(() => {
		      // Apply CSS transition for opacity
		      $el.style.transition = "opacity 1s";

		      // Set opacity to 0 for a smooth fade out
		      $el.style.opacity = 0;

		      // After the transition is complete, hide the element
		      setTimeout(() => {
		        $el.style.display = "none";
		      }, 1000); // Adjust the time to match the transition duration
		    }, 4000);
		    });
		}
	</script>
</body>
</html>