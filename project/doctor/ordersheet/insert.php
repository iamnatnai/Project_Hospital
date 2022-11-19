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
    <a href="insert.php">Insert</a> |
    <a href="editdos.php">Edit</a> |
    <a href="delete.php">Delete</a> <br><br>
    <form action="insertseeadoctor.php" method="post">
        <input type="hidden" name="did" value="<?= $_SESSION['usernameD'] ?>">
        <label for="pid">Patient ID : </label>
        <input type="text" name="pid" id="pid"><br>
        <input type="submit" value="OK">
    </form>
</body>

</html>