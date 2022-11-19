<?php
$pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
    $dosid = "%" . $_GET["dosid"] . "%";
    $stmt = $pdo->prepare("select * from dos where dosid like '$dosid'");
    //$stmt->bindParam(1, $dosid);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $tmpArr = array();
        
        while ($row = $stmt->fetch()){ 
        //$eachData = array($row['dosid'],$row['dosdate'],$row['dostime'],$row['guideline']);
        $eachData = array($row['dosid'],$row['sid'],$row['dosdate'],$row['dostime'],$row['guideline'],$row['status']);
        array_push($tmpArr,$eachData);
        }
        $js =json_encode($tmpArr); //แปลงจากarr php to arr js
    echo $js;
    } 
?>