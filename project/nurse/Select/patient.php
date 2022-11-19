<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location: ../loginN.php");
}
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$patient = $pdo->prepare("SELECT * FROM patient");
$patient->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        div,
        h3 {
            text-align: center;
        }

        form,
        table {
            margin: auto;
            text-align: center;
        }

        th,
        td,
        tr {
            padding: 10px;
            border: 1px;
        }

        th,
        tr,
        td,
        table {
            border: 1px solid black;
        }
<<<<<<< Updated upstream

        input[type='text'] {
            padding: 5px;
        }

        input[type='submit'] {
            cursor: pointer;
            padding: 5px;
        }
        .contain {
            padding: 20px 250px;
            display: flex;
            flex-direction: column;
        }
=======
>>>>>>> Stashed changes
        
    </style>
</head>

<body>
<<<<<<< Updated upstream
    <?php include 'nav.php' ?>
    Welcome <a href="../nurseinfo.php?nid=<?= $_SESSION['username'] ?>"><?= $_SESSION['fullname'] ?></a>
    <div class="contain"> 
=======
    <?php include './nav.php' ?>
>>>>>>> Stashed changes
    <table class="table table-danger table-hover ">
        <tr>
            <th>Patient ID</th>
            <th>Name</th>
            <th>Date Of Birth</th>
            <th>Age</th>
            <th>Sex</th>
            <th>History</th>
        </tr>
        <?php while ($row = $patient->fetch()) : ?>
            <tr>
                <td><a href="patient_info.php?pid=<?= $row['pid'] ?>"><?= $row['pid'] ?></a></td>
                <td><?= $row['pfnamelname'] ?></td>
                <td><?= $row['pdob'] ?></td>
                <td><?= $row['page'] ?></td>
                <td><?= $row['psex'] ?></td>
                <td><a href="patient_history.php?pid=<?= $row['pid'] ?>">History</a></td>
            </tr>
        <?php endwhile ?>
    </table>
    </div>
    <a href="../index.php">Back</a>
</body>

</html>