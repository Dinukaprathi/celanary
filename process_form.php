<?php
 
 include 'conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $location = htmlspecialchars($_POST['location']);
    $phone = htmlspecialchars($_POST['phone']);
    $departure_date = htmlspecialchars($_POST['departure']);
    $arrival_date = htmlspecialchars($_POST['arrival_date']);
    $arrival_country = htmlspecialchars($_POST['arrival_country']);

    
        $sql = "INSERT INTO travel_form (name, email, location, phone, departure_date, arrival_date, arrival_country)
        VALUES ('$name', '$email', '$location', '$phone', '$departure_date', '$arrival_date', '$arrival_country')";

       if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
         } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
         }

        $conn->close();
    }
 else {
    echo "Form was not submitted.";
}
?>
