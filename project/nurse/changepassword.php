<?php
    $pdo = new PDO("mysql:host=localhost; dbname=system_hospital; charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM nurse WHERE nid = ?");
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
    <form action="editpassword.php" method="post">
        Nurse ID <input type="text" name="nid" require><br>
        Old Password<input type="text" name="Opass" require><br>
        New Password<input name="password" id="password" type="password"require onkeyup='check();' /><br>
        Re-type New Password<input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' /> <br>
        <span id='message'></span><br>
        <input type="submit">
    </form>
</body>
</html>