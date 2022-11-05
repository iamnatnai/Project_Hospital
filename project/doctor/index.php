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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            padding: 10px;
            background: #f1f1f1;
        }

        .topnav {
            overflow: hidden;
            background-color: palevioletred;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>

<body>

    <nav class="topnav">
        <a href="../index.html">homepage</a>
        <a href="loginD.php">logout</a>
        <a href="../other/doctorform.html" style="float:right">medical personnel</a>
    </nav>
    <h5>
        <br>
        Welcome <a href="doctorinfo.php?did=<?= $_SESSION['usernameD'] ?>"><?= $_SESSION['fullnameD'] ?></a>
    </h5>

    <nav class="nav flex-column">
    <br><a href="check/check-doctor.php">หมอคนไหนรักษาคนไข้คนไหนบ้าง</a><br>
    <a href="changepassword.php?did=<?= $_SESSION['usernameD'] ?>">เปลี่ยนรหัสผ่าน</a>
    </nav>

</body>

</html>