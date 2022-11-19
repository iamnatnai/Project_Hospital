<?php
session_start();
if (empty($_SESSION['usernameD'])) {
    header("location: loginD.php");
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

    <?php include './nav.php' ?>
    <h5>
        <br>
        Welcome <a href="doctorinfo.php?did=<?= $_SESSION['usernameD'] ?>"><?= $_SESSION['fullnameD'] ?></a>
    </h5>

    <nav class="nav flex-column">
        <a href="ordersheet/insertdos.php">Doctor's order sheet</a><br><br>
        <a href="check/check-doctor.php">หมอคนไหนรักษาคนไข้คนไหนบ้าง</a><br><br>
        <a href="changepassword.php?did=<?= $_SESSION['usernameD'] ?>">เปลี่ยนรหัสผ่าน</a>
    </nav>

</body>

</html>