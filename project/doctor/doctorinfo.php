<?php
session_start();
if (empty($_SESSION['usernameD'])) {
    header("location: loginD.php");
}
$did = $_GET['did'];
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$nurse = $pdo->prepare("SELECT * FROM doctor WHERE did = ?");
$nurse->bindParam(1, $did);
$nurse->execute();

$nurseTel = $pdo->prepare("SELECT * FROM dtel WHERE did = ?");
$nurseTel->bindParam(1, $did);
$nurseTel->execute();

$nurseEmail = $pdo->prepare("SELECT * FROM demail WHERE did = ?");
$nurseEmail->bindParam(1, $did);
$nurseEmail->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <title>Document</title>
    <style>
        div,
        h3 {
            text-align: center;
        }
        .bottom {
            margin-bottom: 5px;
        }

        button {
            width: 100%;
            padding: 10px 0;
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background: pink;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        button:hover {
            background: palevioletred;
        }

        .contain {
            padding: 20px 250px;
            display: flex;
            flex-direction: column;
        }

        .main-block {
            margin: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include './nav.php' ?>

    <div class="contain">
        <legend>
            <h3> Doctor name : <?= $_SESSION['fullnameD'] ?></h3>
        </legend>
        <div>
            <?php while ($row = $nurse->fetch()) : ?>
                <div class="main-block">
                    <img src="../img/doctor/<?= $row['did'] ?>.jpg" width="250px" height="auto" alt="">
                </div>

                <br>
                <hr>

                <p>Doctor ID : <?= $row['did'] ?></p>
                <p>Firstname Lastname : <?= $row['dfnamelname'] ?></p>
                <p>Spectialize : <?= $row['dspec'] ?></p>
            <?php endwhile ?>
            <p>Tel :
                <?php while ($row = $nurseTel->fetch()) : ?>
                    <?= $row['dnumber'] ?>
                <?php endwhile ?>
            </p>
            <p>Email :
                <?php while ($row = $nurseEmail->fetch()) : ?>
                    <?= $row['dmail'] ?>
                <?php endwhile ?>
            </p>

            <hr>
        </div>

    </div>
    <button> <a href="index.php">Back to homepage</a> </button>



</body>

</html>