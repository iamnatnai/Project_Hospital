<?php
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
$status = "Active";
$stmt = $pdo->prepare("insert into dos (sid,dosdate,dostime,guideline,status)
                    values(?,curdate(),curtime(),?,?)");
$stmt->bindParam(1, $_POST["sid"]);
$stmt->bindParam(2, $_POST["guideline"]);
$stmt->bindParam(3, $status);
$stmt->execute();
// 
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