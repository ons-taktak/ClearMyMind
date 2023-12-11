<?php
	//connect to the database
	require_once "database.php";
	if (isset($_GET['id'])) {
	    $id = $_GET['id'];
	    
	    // Perform the deletion
	    $deleteQuery = "DELETE FROM intakeLog WHERE id = $id";
	    mysqli_query($conn, $deleteQuery);
	}
?>	


