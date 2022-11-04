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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <h5>
        <br>
        Welcome <a href="doctorinfo.php?did=<?= $_SESSION['usernameD'] ?>"><?= $_SESSION['fullnameD'] ?></a>
        <button type="button" class="btn btn-outline-secondary"><a href="logoutD.php">Log out</a><br></button>
    </h5>
    <div>
        <?php while ($row = $nurse->fetch()) : ?>
            <img src="../img/doctor/<?= $row['did'] ?>.jpg" width="300px" height="auto" alt="">
            <br>
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
        <a href="index.php">Back to homepage</a>
        <hr>
    </div>
</body>

</html>