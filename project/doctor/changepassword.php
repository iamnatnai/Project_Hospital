<?php
    session_start();
    if(empty($_SESSION['usernameD'])){
        header("location: loginD.php");
    }
    $pdo = new PDO("mysql:host=localhost; dbname=system_hospital; charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>
<?php
    $did = $_GET['did'];
    $stmt = $pdo->prepare("SELECT * FROM doctor WHERE did = ?");
    $stmt->bindParam(1, $_GET["did"]); 
    $stmt->execute();
    $row = $stmt->fetch(); 
?>
<html>
<head>
    <meta charset="utf-8">
    <script>
        function check() {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
        }
        }
    </script>
</head>
<body>
    <form action="editpassworddoctor.php" method="post">
        Doctor ID <input type="text" name="did" value="<?=$did?>" readonly ><br>
        Old Password<input type="text" name="Opass" required pattern="\d{8,20}"><br>
        New Password<input name="password" id="password" type="password" onkeyup='check();' required pattern="\d{8,20}"/><br>
        Re-type New Password<input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' pattern="\d{8,20}" required/> <br>
        <span id='message'></span><br>
        <input type="submit">
    </form>
    <a href="index.php">back to homepage</a>
</body>
</html>