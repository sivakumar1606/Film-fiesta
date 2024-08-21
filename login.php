<?php
session_start(); 

$serverName = "localhost";
$userName = "root";
$password = "Sivakumar_1606"; 
$dbName = "filmfiesta"; 

$conn = new mysqli($serverName, $userName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];     
    
    $sql = "SELECT * FROM signup WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        if ($password == $stored_password) {

            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
        
            header("Location: index.html"); 
            exit();
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "User does not exist. Please sign up.";
    }
}

$conn->close();
?>
