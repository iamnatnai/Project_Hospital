<?php
    session_start();
    if(empty($_SESSION['usernameD'])){
        header("location: loginD.php");
    }
    $did = $_GET['did'];
    $pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
    $nurse = $pdo->prepare("SELECT * FROM doctor WHERE did = ?");
    $nurse->bindParam(1,$did);
    $nurse->execute();

    $nurseTel = $pdo->prepare("SELECT * FROM dtel WHERE did = ?");
    $nurseTel->bindParam(1,$did);
    $nurseTel->execute();

    $nurseEmail = $pdo->prepare("SELECT * FROM demail WHERE did = ?");
    $nurseEmail->bindParam(1,$did);
    $nurseEmail->execute();
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
    Welcome<a href="doctorinfo.php?nid=<?=$_SESSION['usernameD']?>"><?=$_SESSION['fullnameD']?></a>
    <a href="logoutD.php">Log out</a><br>
    <div>
        <?php while($row=$nurse->fetch()) : ?>
            <p>Doctor ID : <?=$row['did']?></p>
            <p>Firstname Lastname : <?=$row['dfnamelname']?></p>
            <p>Spectialize : <?=$row['dspec']?></p>
        <?php endwhile ?>
            <p>Tel : 
        <?php while($row=$nurseTel->fetch()) : ?>
                <?=$row['dnumber']?>
        <?php endwhile ?>
            </p>
            <p>Email : 
        <?php while($row=$nurseEmail->fetch()) : ?>
                <?=$row['dmail']?>
        <?php endwhile ?>
            </p>
            <a href="index.php">Back to homepage</a>
            <hr>
    </div>
</body>
</html>