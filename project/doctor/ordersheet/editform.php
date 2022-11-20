<?php
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script>
        function confirmEdit(sid) {
            var guideline = document.getElementById("guideline").value;
            var ans = confirm("ต้องการแก้ข้อมูลในรหัสการตรวจ : " + sid);
            if (ans == true) {
                document.location = "editdos.php?sid=" + sid + "&guideline=" + guideline;
            }
        }
    </script>
</head>

<body>
    <?php
    $sid = $_POST["sid"];
    $stmt = $pdo->prepare("select sid from dos where sid like ?");
    $stmt->bindParam(1, $sid);
    $stmt->execute();
    $row = $stmt->fetch(); ?>

    SID : <?= $row["sid"] ?><br><br>
    <label for="guide">Guideline : </label><br>
    <textarea name="guideline" id="guideline" cols="30" rows="5"></textarea>
    <input type="submit" value="Update" onclick='confirmEdit("<?= $_POST["sid"] ?>")'>
    <!-- <a href='#' onclick='confirmEdit("<?= $_POST["sid"] ?>")'>Delete</a> -->
</body>

</html>