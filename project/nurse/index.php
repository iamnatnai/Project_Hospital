<?php
session_start();
if (empty($_SESSION['username'])) {
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
    <?php include 'nav.php' ?>
    Welcome <a href="nurseinfo.php?nid=<?= $_SESSION['username'] ?>"><?= $_SESSION['fullname'] ?></a> <br>
    <a href="./Select/patient.php">Patients</a> <br>
    <a href="./Insert/patient_form.php">Add Patient</a>  <br>
    <a href="./Select/patient_follow.php">Patient to do list</a> <br>
    <a href="changepassword.php?nid=<?php echo $_SESSION['username']?>">เปลี่ยนรหัสผ่าน</a>
</body>

</html>