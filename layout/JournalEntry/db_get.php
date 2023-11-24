<?php
// $request_origin = $_SERVER['HTTP_ORIGIN'];
// header("Access-Control-Allow-Origin: $request_origin");
// header("Access-Control-Allow-Methods: POST, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type");
// header("Access-Control-Allow-Credentials: true");
echo '<div class="card">
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
</div>';

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
    $sql = "SELECT * FROM entries";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">
            <div class="content">
                <h2>' .$row["title"] .'</h2>
                <p>date</p>
            </div>
            <div class="journal-text">
                <p>'.$row["main_text_data"].'</p>
            </div>
        </div>';
        }
    } else {
        echo "0 results";
    }
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
