<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="../../src/controleur/ResetMdp.php" method="post">
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>