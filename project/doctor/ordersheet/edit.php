<?php
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
    <a href="edit.php">Edit</a> | 
    <a href="delete.php">Delete</a> <br><br>
    <form action="editform.php" method="post">
    <label for="sid">ค้นหารหัสการตรวจ : </label>
        <input type="text" id="sid" name="sid">
        <input type="submit" id="search" name="search" value="SEARCH"><br><br>
    </form>
</body>
</html>