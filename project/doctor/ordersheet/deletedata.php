<?php
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>


<a href='#' onclick='confirmDelete("${element[0]}")'>Delete</a>
<hr>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $sid = "%" . $_GET["sid"] . "%";
    $stmt = $pdo->prepare("select * from dos where sid like ?");
    $stmt->bindParam(1, $sid);
    $stmt->execute();
    $row = $stmt->fetch()
    ?>
    <div>
    Doctor's order sheet ID : <?=$row["dosid"]?><br><br>
    SID : <?=$row["sid"]?><br><br>
    Order date : <?=$row["dosdate"]?>}<br><br>
    Order time : <?=$row["dostime"]?><br><br>
    Guideline : <?=$row["guideline"]?><br><br>
    Status : <?=$row["status"]?><br><br>
    <a href="">ลบ</a>
    </div>
</body>

</html>