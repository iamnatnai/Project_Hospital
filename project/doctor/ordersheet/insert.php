<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <script src="https://kit.fontawesome.com/d711d18929.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/dos.css">
</head>

<body>
    <?php include '../nav.php' ?><br>
    <a href="insert.php">Insert</a> |
    <a href="edit.php">Edit</a> |
    <a href="delete.php">Delete</a> <br><br>
    <form action="insertseeadoctor.php" method="post">
        <input type="hidden" name="did" value="<?= $_SESSION['usernameD'] ?>">
        <label for="pid">Patient ID : </label>
        <input type="text" name="pid" id="pid"><br>
        <input type="submit" value="OK">
    </form>
</body>

</html>