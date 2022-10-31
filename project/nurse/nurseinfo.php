<?php
    session_start();
    if(empty($_SESSION['username'])){
        header("location: loginN.php");
    }
    $nid = $_GET['nid'];
    $pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
    $nurse = $pdo->prepare("SELECT * FROM nurse WHERE nid = ?");
    $nurse->bindParam(1,$nid);
    $nurse->execute();

    $nurseTel = $pdo->prepare("SELECT * FROM ntel WHERE nid = ?");
    $nurseTel->bindParam(1,$nid);
    $nurseTel->execute();

    $nurseEmail = $pdo->prepare("SELECT * FROM nemail WHERE nid = ?");
    $nurseEmail->bindParam(1,$nid);
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
    Welcome<a href="nurseinfo.php?nid=<?=$_SESSION['username']?>"><?=$_SESSION['fullname']?></a>
    <a href="logoutN.php">Log out</a><br>
    <div>
        <?php while($row=$nurse->fetch()) : ?>
            <p>Nurse ID : <?=$row['nid']?></p>
            <p>Firstname Lastname : <?=$row['nfnamelname']?></p>
            <p>Position : <?=$row['nposition']?></p>
        <?php endwhile ?>
            <p>Tel : 
        <?php while($row=$nurseTel->fetch()) : ?>
                <?=$row['nnumber']?>
        <?php endwhile ?>
            </p>
            <p>Email : 
        <?php while($row=$nurseEmail->fetch()) : ?>
                <?=$row['nmail']?>
        <?php endwhile ?>
            </p>
            <a href="index.php">Back to homepage</a>
            <hr>
    </div>
</body>
</html>