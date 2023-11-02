<?php
$conn = mysqli_connect("localhost", "root", "", "railway");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $birth_preference = $_POST["birth_preference"];  // Remove the implode() call

    // Convert array to comma-separated string
    $birth_preference_string = implode(", ", $birth_preference);

    $query = "INSERT INTO `rail`(`name`, `age`, `gender`, `email`, `birth_perference`) 
              VALUES ('$name', $age, '$gender', '$email', '$birth_preference_string')";

    if (mysqli_query($conn, $query)) {
        echo "<script> alert('Data Inserted Successfully'); </script>";
        echo "Reservation successful!<br>";
        echo "Name: $name<br>";
        echo "Age: $age<br>";
        echo "Gender: $gender<br>";
        echo "Email: $email<br>";
        echo "Birth Preference: $birth_preference_string<br>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>