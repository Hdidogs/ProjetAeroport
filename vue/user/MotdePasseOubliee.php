<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 // Get the email address entered by the user
 $email = $_POST['email'];

 // TODO: Validate the email address and check if it exists in the database

 // If the email is valid and exists, send a password reset link to the user's email

 // Redirect the user to a confirmation page
 header('Location:  resetPasswordUser.php');
 exit;
 
}
?>

<!DOCTYPE html>
<html>
<head>
 <title>Password Reset</title>
</head>
<body>
 <h1>Password Reset</h1>
 <form method="POST" action="">
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" required>
  <br>
  <input type="submit" value="Reset Password">
 </form>
</body>
</html>
