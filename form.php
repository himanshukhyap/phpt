<!DOCTYPE html>
<html>
  <head>
    <title>Input Form and Table Example</title>
  </head>
  <body>
    <h1>Input Form</h1>
    <form  method="post" onsubmit="return validateForm()">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>
     
      <button type="submit">Submit</button>
    </form>

    <?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $sql_data = "INSERT INTO formdata (name, email) VALUES ('$name', '$email')";
  if ($conn->query($sql_data) === TRUE) {
    // echo "Thank you for submitting the form, $name! We will send an email to $email.";
  } else {
    echo "Error inserting data: " . $conn->error . "\n";
  }

  $conn->close();
}
?>

    <script>
function validateForm() {
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();

    if (name == "") {
        alert("Please enter your name");
        return false;
    }

    if (email == "") {
        alert("Please enter your email");
        return false;
    }

    // You can add more validation checks here, such as checking the email format

    return true;
}

</script>
<?php
    include 'db_connect.php';
    ?>
    
    <?php
   // Query the database
   $sql = "SELECT * FROM formdata";
   $result = $conn->query($sql);
   

    // Generate HTML code to display the results
    if ($result->num_rows > 0) {
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead class='table-dark'>
                  <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Date</th>
                  </tr>
              </thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["reg_date"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "No results found.";
    }

    $conn->close();
    ?>