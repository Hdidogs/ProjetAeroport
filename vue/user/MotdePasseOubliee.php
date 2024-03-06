<?php
include 'src/bdd/SQLConnexion.php';
include 'src/model/user/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

 $email = $_POST['email'];
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
