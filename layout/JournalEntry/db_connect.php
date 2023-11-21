<?php
// $request_origin = $_SERVER['HTTP_ORIGIN'];
// header("Access-Control-Allow-Origin: $request_origin");
// header("Access-Control-Allow-Methods: POST, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type");
// header("Access-Control-Allow-Credentials: true");

$title = $_POST['title'];
$main_text_data=$_POST['main-text'];

$servername = "localhost";
$username = "root";
$password = "fhgggtyf";
$dbname = "journal_entry_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {

    $stmt = $conn->prepare("INSERT INTO entries(title,main_text_data) VALUES (?,?);");
    $stmt->bind_param("ss",$title,$main_text_data);
    $stmt->execute();
    echo"11111";
    $stmt->close();
    
    
    $conn->close();
}



// $sql = "SELECT * FROM entries";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // Output data of each row
//     while ($row = $result->fetch_assoc()) {
//         echo "Entry ID: " . $row["entry_id"] . "\n";
//         echo "Title: " . $row["title"] . "\n";
//         echo "Main Text: " . $row["main_text_data"] . "\n\n";
//     }
// } else {
//     echo "0 results";
// }

// $newMainTextData = "This is a new entry.";

// // Query to insert a new entry
// $sql = "INSERT INTO entries (main_text_data) VALUES ('$newMainTextData')";

// if ($conn->query($sql) === TRUE) {
//     echo "New entry added successfully. Entry ID: " . $conn->insert_id;
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

?>
