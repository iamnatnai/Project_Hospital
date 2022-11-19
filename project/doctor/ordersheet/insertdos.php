<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <a href="insertdos.php">Insert</a> | 
    <a href="editdos.php">Edit</a> | 
    <a href="deletedos.php">Delete</a> <br><br>
    <form action="insert.php" method="post">
        <input type="hidden" name="did" value="$_SESSION['usernameD']">
        <label for="pid">Patient ID : </label>
        <input type="text" name="pid"><br>
        <!-- <label for="id">Doctor's order sheet ID : </label>
        <input type="text" name="id" pattern="[O]\d{3}" title="">
        ** Use capital letter that start with O and folloed by 3 digits.
        <br>
        <label for="guide">Guideline : </label><br>
        <textarea name="guide" cols="30" rows="5"></textarea>
        <br>
        <input type="submit" value="Insert"> -->
    </form>
</body>
</html>