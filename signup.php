<?php
$serverName = "localhost"; 
$userName = "root"; 
$password = "Sivakumar_1606";
$dbName = "filmfiesta"; 


$conn = new mysqli($serverName, $userName, $password, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO signup(name, email, phone, username, password) 
            VALUES ('$name', '$email', '$phone', '$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>