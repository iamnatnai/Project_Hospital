<?php
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $stmt = $pdo->prepare("select sid from seeadoctor where sid=?");
    $stmt->bindParam(1, $_POST["sid"]);
    $stmt->execute();
    $row = $stmt->fetch(); ?>

    รหัสการตรวจ : <?= $row["sid"] ?><br><br>
    <label for="guide">Guideline : </label><br>
    <textarea name="guide" cols="30" rows="5"></textarea>

</body>

</html>