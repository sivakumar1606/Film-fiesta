!<?php
$conn = new mysqli("localhost", "root", " Sivakumar_1606", "filmfiesta");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        echo "connected successfully sivakumar";
    }
?>
