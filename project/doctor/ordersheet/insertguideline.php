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
    $sid=$_POST["sid"];
    $stmt = $pdo->prepare("select sid from seeadoctor where sid=?");
    $stmt->bindParam(1, $_POST["sid"]);
    $stmt->execute();
    $row = $stmt->fetch(); ?>
    รหัสการตรวจ : <?= $row["sid"] ?><br><br>
    <form action="insertdos.php">
        <input type="hidden" name="sid" value="<?=$sid?>">
        <label for="guide">Guideline : </label><br>
        <textarea name="guideline" cols="30" rows="5"></textarea>
        <input type="submit" value="INSERT">
    </form>


</body>

</html>