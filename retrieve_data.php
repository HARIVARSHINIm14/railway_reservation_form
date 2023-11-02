<?php
$conn = mysqli_connect("localhost", "root", "", "railway");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $search_name = $_POST["search_name"];
    $sql = "SELECT * FROM rail WHERE name LIKE '%$search_name%'";
} else {
    $sql = "SELECT * FROM rail";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["name"]. " - Age: " . $row["age"]. " - Gender: " . $row["gender"]. " - Email: " . $row["email"];

        // Check if birth_preference is set
        if(isset($row["birth_perference"])) {
            $birth_preference = explode(", ", $row["birth_perference"]);
            echo " - Birth Preference: " . implode(", ", $birth_preference);
        } else {
            echo " - Birth Preference: Not specified";
        }

        echo "<br>";
    }
} else {
    echo "<p>No reservations found.</p>";
}

mysqli_close($conn);
?>
