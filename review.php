<?php
session_start(); 
$serverName = "localhost";
$username = "root"; 
$password = "Sivakumar_1606"; 
$dbName = "filmfiesta"; 

$conn = new mysqli($serverName, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $movieName = $_POST['movie'];
    $review = $_POST['review'];
    $username = $_SESSION['username']; 
    $sql = "INSERT INTO reviews (username, name, review) VALUES ('$username', '$movieName', '$review')";

    if ($conn->query($sql) === TRUE) {
        echo "Review submitted successfully";
        header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>

