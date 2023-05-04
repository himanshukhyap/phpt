<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $sql_data = "INSERT INTO formdata (name, email) VALUES ('$name', '$email')";
  if ($conn->query($sql_data) === TRUE) {
    echo "Thank you for submitting the form, $name! We will send an email to $email.";
  } else {
    echo "Error inserting data: " . $conn->error . "\n";
  }

  $conn->close();
}
?>
