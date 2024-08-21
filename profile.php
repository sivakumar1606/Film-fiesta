<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./blah.css">
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <div class="details">
        <h2>User Information</h2>
        <?php
        session_start(); 

        $serverName = "localhost";
        $username = "root"; 
        $password = "Sivakumar_1606"; 
        $dbName = "filmfiesta"; 

        $conn = new mysqli($serverName, $username, $password, $dbName);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_SESSION['username'])) {
            $loggedInUsername = $_SESSION['username'];

            // Fetch user details from signup table
            $sqlUserDetails = "SELECT name, phone, username, email FROM signup WHERE username = '$loggedInUsername'";
            $resultUserDetails = $conn->query($sqlUserDetails);

            if ($resultUserDetails->num_rows > 0) {
                // Output data of the user details
                while($row = $resultUserDetails->fetch_assoc()) {
                    echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
                    echo "<p><strong>Phone Number:</strong> " . $row["phone"] . "</p>";
                    echo "<p><strong>Username:</strong> " . $row["username"] . "</p>";
                    echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
                }
            } else {
                echo "0 results";
            }

            // Fetch user reviews from reviews table
            $sqlUserReviews = "SELECT name, review FROM reviews WHERE username = '$loggedInUsername'";
            $resultUserReviews = $conn->query($sqlUserReviews);

            if ($resultUserReviews) {
                if ($resultUserReviews->num_rows > 0) {
                    echo "<div class='reviews'><h2>Your Reviews</h2><table><thead><tr><th>Movie Name</th><th>Review</th></tr></thead><tbody>";

                    // Output user reviews in table format
                    while($row = $resultUserReviews->fetch_assoc()) {
                        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["review"] . "</td></tr>";
                    }

                    echo "</tbody></table></div>";
                } else {
                    echo "<div class='reviews'><h2>Your Reviews</h2><p>No reviews found</p></div>";
                }
            } else {
                echo "Error: " . $conn->error; // Print error message if query fails
            }
        } else {
            echo "<p>User not logged in.</p>";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
