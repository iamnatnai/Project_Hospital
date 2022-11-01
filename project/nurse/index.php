<?php
 session_start();
 if(empty($_SESSION['username'])){
    header("location: loginN.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Welcome<a href="nurseinfo.php?nid=<?=$_SESSION['username']?>"><?=$_SESSION['fullname']?></a>
    <a href="logoutN.php">Log out</a><br>
    <a href="changepassword.php">เปลี่ยนรหัสผ่าน</a>
    <a href="./Select/patient.php">Patients</a> | 
    <a href="./Insert/patient_form.php">Add Patient</a> |
    <a href="./Select/patient_follow.php">Patient to do list</a>
</body>
</html>