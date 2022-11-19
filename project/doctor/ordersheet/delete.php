<?php
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("update dos set status = 'Cancle' where dosid = ?");
    $stmt->bindParam(1, $_GET["dosid"]);
    // $stmt->bindParam(2, $_GET["dosdate"]);
    // $stmt->bindParam(3, $_GET["dostime"]);
    // $stmt->bindParam(4, $_GET["guideline"]);
    if ($stmt->execute()) {
        header("location:deletedos.php");
    }

?>
    

