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
    $stmt = $pdo->prepare("SELECT * FROM dos where dosid like ?");
    if (!empty($_POST["id"])) {
        $value = '%' . $_POST["id"] . '%';
        $stmt->bindParam(1, $value);
        $stmt->execute();
        $row = $stmt->fetch(); ?>
        <div>
            Doctor's order sheet ID : <?=$row["dosid"]?>
            Order date : <?=$row["orderdate"]?>
            Order time : <?=$row["ordertime"]?>
            Guideline : <?=$row["guideline"]?>
        </div>

    <?php } ?>

</body>

</html>