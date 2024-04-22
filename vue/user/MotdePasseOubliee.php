<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="../../assets/css/mdpresetcss.css">

<head>
    <title>Password Reset</title>
</head>

<body>
    <h1>Password Reset</h1>
    <form method="POST" action="UpdateMdp.php">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <input type="submit" value="Reset">
    </form>
</body>

</html>