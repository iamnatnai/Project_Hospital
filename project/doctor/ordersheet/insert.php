<?php
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
$status = "active";
$seeadoctor = $pdo->prepare("insert into seeadoctor(did,pid) values(?,?)");
$seeadoctor->bindParam(1,$_POST["did"]);
$seeadoctor->bindParam(2,$_POST["pid"]);

$stmt = $pdo->prepare("insert into dos (dosdate,dostime,guideline,status)
                    values(curdate(),curtime(),?,?)");
$stmt->bindParam(1, $_POST["id"]);
$stmt->bindParam(2, $_POST["guide"]);
$stmt->bindParam(3, $status);
$stmt->execute();
header("location:showinsert.php");
?>

<!-- <html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <a href="insertdos.php">Insert</a> |
    <a href="editdos.php">Edit</a> |
    <a href="deletedos.php">Delete</a> <br><br>
</body>

</html> -->