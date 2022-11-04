<?php
    session_start();
    if(empty($_SESSION['usernameD'])){
        header("location: loginD.php");
    }
    $pdo = new PDO("mysql:host=localhost; dbname=system_hospital; charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table,tr,td,th{
            border : 1px solid
        }
    </style>
</head>
<body>
    <form action="">
        ใส่ Username หมอ <input type="text" name="keyword">
        <input type="submit">
    </form>

    <?php
        $stmt = $pdo->prepare("SELECT DISTINCT dfnamelname,pfnamelname,patient.pid FROM doctor
                                JOIN seeadoctor JOIN patient ON doctor.did = seeadoctor.did
                                AND seeadoctor.pid = patient.pid
                                WHERE doctor.did like ? ");
        if (!empty($_GET))
        $value = '%' . $_GET["keyword"] . '%';
        $stmt->bindParam(1, $value);
        $stmt->execute();
    ?>

    <table>
        <tr>
            <th> Doctor Name</th>
            <th> Patient Name</th>
            <th> Detail Patient </th>
        </tr>
        <?php while ($row = $stmt->fetch()) : ?>
        <tr>
            <td> <?= $row[0] ?> </td>
            <td> <?= $row[1] ?> </td>
            <?php echo "<td align='center'><a href='detail-patient.php?id=".$row[2]."'>"."detail"."</a></td>"; ?>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="../index.php">back</a>
</body>
</html>

