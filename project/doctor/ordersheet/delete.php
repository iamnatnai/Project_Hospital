<?php
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script>
        var xmlHttp;

        function show() {
            xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = showResult;
            var sid = document.getElementById("sid").value;
            var url = "deletedata.php?sid=" + sid;
            xmlHttp.open("GET", url, true);
            xmlHttp.send();
        }

        function showResult()
        {
            if(xmlHttp.readyState == 4)
            {
                if(xmlHttp.status == 200)
                {
                    document.getElementById("result").innerHTML = xmlHttp.responseText;
                }
            }
        }
    </script>
</head>

<body>
    <a href="insert.php">Insert</a> |
    <a href="editdos.php">Edit</a> |
    <a href="delete.php">Delete</a> <br><br>
    <form>
        <label for="sid">ค้นหารหัสการตรวจ : </label>
        <input type="text" id="sid"><br><br>
        <input type="submit" value="SEARCH" onclick="show()"><br><br>
        
    </form>
    <div id="result"></div>
</body>

</html>