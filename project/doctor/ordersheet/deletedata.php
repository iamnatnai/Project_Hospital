<?php
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script>
        function confirmDelete(sid) {
            var ans = confirm("ต้องการลบรหัสการตรวจ : " + sid);
            if (ans == true) {
                document.location = "deletedos.php?sid=" + sid;
            }
        }
    </script>
</head>

<body>
<?php include './navdos.php' ?><br>
    <?php
    $sid = $_POST["sid"];
    $stmt = $pdo->prepare("select * from dos where sid like ?");
    $stmt->bindParam(1, $sid);
    $stmt->execute();
    $row = $stmt->fetch(); ?>

    Doctor's order sheet ID : <?= $row["dosid"] ?><br><br>
    SID : <?= $row["sid"] ?><br><br>
    Order date : <?= $row["dosdate"] ?><br><br>
    Order time : <?= $row["dostime"] ?><br><br>
    Guideline : <?= $row["guideline"] ?><br><br>
    Status : <?= $row["status"] ?><br><br>
    <a href='#' onclick='confirmDelete("<?=$_POST["sid"]?>")'>Delete</a>
</body>

</html>