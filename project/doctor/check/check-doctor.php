<?php
session_start();
if (empty($_SESSION['usernameD'])) {
    header("location: loginD.php");
}
$pdo = new PDO("mysql:host=localhost; dbname=system_hospital; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        table,
        tr,
        td,
        th {
            border: 1px solid
        }
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            padding: 10px;
            background: #f1f1f1;
        }

        .topnav {
            overflow: hidden;
            background-color: palevioletred;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>

<body>
    <form action="">
        
    <nav class="topnav">
        <a href="../../index.html">homepage</a>
        <a href="../../other/doctorform.html" style="float:right">medical personnel</a>
    </nav>
    
    <br>
    <br>
    <h4>
        ใส่ Username หมอ <input type="text" name="keyword">
        <input type="submit">
    </h4>

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

    <table class="table table-info table-hover">
        <tr>
            <th> Doctor Name</th>
            <th> Patient Name</th>
            <th> Detail Patient </th>
        </tr>
        <?php while ($row = $stmt->fetch()) : ?>
            <tr>
                <td> <?= $row[0] ?> </td>
                <td> <?= $row[1] ?> </td>
                <?php echo "<td align='center'><a href='detail-patient.php?id=" . $row[2] . "'>" . "detail" . "</a></td>"; ?>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="../index.php">back</a>
</body>

</html>