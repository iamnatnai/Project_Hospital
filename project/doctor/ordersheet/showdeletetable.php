<?php
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script>
        
        function confirmDelete(dosid) {
            alert("yes");
            var ans = confirm("ต้องการลบ DOSid : " + dosid);
                if (ans == true) {
                    alert("yes");
                    document.location = "delete.php?dosid=" + dosid;
                }
        }
    </script>
</head>

<body>


    <?php
    $dosid = "%" . $_GET["dosid"] . "%";
    $stmt = $pdo->prepare("select * from dos where dosid like '$dosid'");
    //$stmt->bindParam(1, $dosid);
    $stmt->execute();

    if ($stmt->rowCount() > 0) { ?>
        <?php while ($row = $stmt->fetch()) { ?>
            <div>
                Doctor's order sheet ID : <?= $row['dosid'] ?><br><br>
                Order date : <?= $row['dosdate'] ?><br><br>
                Order time : <?= $row['dostime'] ?><br><br>
                Guideline : <?= $row['guideline'] ?><br><br>
                <a href='#' onclick='confirmDelete("<?= $row["dosid"] ?>")'>Delete</a>
                <hr>
            </div>
        <?php } ?>
    <?php } ?>

</body>

</html>