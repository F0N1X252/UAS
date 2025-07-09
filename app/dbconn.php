<?php
$servername = "mysql";
$username = "root";
$password = "P@ssw0rd";
$dbname = "todo_db";

$maxAttempts = 5;
$attempt = 0;
$conn = null;

while ($attempt < $maxAttempts) {
    $conn = @new mysqli($servername, $username, $password, $dbname);
    if ($conn && !$conn->connect_error) {
        break;
    }
    $attempt++;    
    // echo "Waiting for MySQL connection...\n";
    sleep(3);
}

if ($conn->connect_error) {
    die("Connection failed after retries: " . $conn->connect_error);
}
?>
