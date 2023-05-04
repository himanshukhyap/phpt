<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
 

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<?php

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

// Select the database
$sql = "USE myDB;";
if ($conn->query($sql) === FALSE) {
    echo "Error selecting database: " . $conn->error . "\n";
}

// Create table
$sql_table = "CREATE TABLE IF NOT EXISTS MyGuests (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
  
if ($conn->query($sql_table) === TRUE) {
    echo "Table MyGuests created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Insert dummy data
$sql_data = "INSERT INTO MyGuests (firstname, lastname, email) VALUES";
for ($i = 1; $i <= 20; $i++) {
    $sql_data .= " ('John{$i}', 'Doe{$i}', 'john{$i}.doe@example.com')";
    if ($i < 20) {
        $sql_data .= ",";
    }
}
if ($conn->query($sql_data) === TRUE) {
    echo "Dummy data inserted successfully\n";
} else {
    echo "Error inserting dummy data: " . $conn->error . "\n";
}

$conn->close();

?>
