<?php
    session_start();
    if(empty($_SESSION['username'])){
       header("location: ../loginN.php");
    }
    $pid = $_GET['pid'];
    $sex = $_GET['sex'];
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=system_hospital","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $pInfo = $pdo->prepare("SELECT * FROM patient WHERE pid = ?");
        $pInfo->bindParam(1,$pid);
        $pInfo->execute();
        $info = $pInfo->fetch();

        if(str_contains($info['pfnamelname']," ")){
            $fnamelname = explode(" ",$info['pfnamelname']);
        }

        $pTel = $pdo->prepare("SELECT * FROM ptel WHERE pid = ?");
        $pTel->bindParam(1,$pid);
        $pTel->execute();
        

        $pDisease = $pdo->prepare("SELECT pdisease FROM disease WHERE pid = ?");
        $pDisease->bindParam(1,$pid);
        $pDisease->execute();
        $checkDisease = array();
        while($row = $pDisease->fetch()){
            array_push($checkDisease,$row['pdisease']);
        }

        $date = $pdo->prepare("SELECT DISTINCT entrydate , leavedate FROM seeadoctor WHERE pid = ?");
        $date->bindParam(1,$pid);
        $date->execute();
        $pdate = $date->fetch();
    }
    catch(PDOException $e){
        echo "Connection Fail : ".$e;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script>
        
        window.onload = ()=>{
            if("<?=$info['psex']?>" == "MALE") {
                document.getElementById("male").checked = true;
            }else if ("<?=$info['psex']?>" == "FEMALE"){
                document.getElementById("female").checked = true;
            }
        }

        let request = new XMLHttpRequest();
        let requestDis = new XMLHttpRequest();

        function remove(){
            try{
                let pid = "<?=$pid?>";
                let tel = document.getElementById("tel").lastElementChild.value;
                
                if(confirm("Do you want to remove number : "+tel+" ?")){
                    console.log(tel);
                    request.onreadystatechange = ()=>{
                        if(request.readyState == 4 && request.status == 200){
                            console.log("Delete Success");
                            document.getElementById("tel").removeChild(document.getElementById("tel").lastElementChild);
                        }
                    }
                    let url = "delete_patient.php?pid="+pid+"&tel="+tel;
                    request.open("GET",url);
                    request.send();
                }
            }
            catch(err){
                console.log(err);
            }
        }

        function removeD(){
            try{
                let pid = "<?=$pid?>";
                let disease = document.getElementById("diseases").lastElementChild.value;
                
                if(confirm("Do you want to remove disease : "+disease+" ?")){
                    requestDis.onreadystatechange = ()=>{
                        if(requestDis.readyState == 4 && requestDis.status == 200){
                            console.log("Delete Success");
                            document.getElementById("diseases").removeChild(document.getElementById("diseases").lastElementChild);
                        }
                    }
                    let url = "delete_patient.php?pid="+pid+"&dis="+disease;
                    requestDis.open("GET",url);
                    requestDis.send();
                }
            }
            catch(err){
                console.log(err);
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap');
        body{
            font-family: 'Kanit', sans-serif;
            background-color: #f9f9f9;
        }   

        form{
            padding: 10px;
        }
        .form{
            border-radius: 5px;
            background-color: white;
            width: 25%;
            margin: 0 auto;
        }

        h2{
            margin-top: 5vh;
            text-align: center;
        }
        label{
            font-size: 20px;
            font-weight: 1000;
        }

        form > div{
            padding: 10px;
        }

        input:focus{
            outline: none;
        }

        input{
            padding: 5px;
        }

        input[type=submit]{
            padding: 10px 20px;
            cursor: pointer;
            background-color: #FFADBC;
            border: none;
            color: white;
            font-weight: 900;
        }

        input[type=submit]:hover{
            background-color: #975C8D;
        }

        i{
            cursor: pointer;
            color: #FFADBC;
        }
        i:hover{
            color: #975C8D;
        }

    </style>
    <title>Document</title>
</head>
<body>
    <?php include './nav.php' ?>
    <h2>Edit Patient</h2>
    <div class="form">

        <form action="update_patient.php" method="get">
            <div style="text-align: center;">
                <img src="../../img/patient/<?=$sex?>.png" alt="<?=$sex?>" width="200">
            </div>
            <div style="display: flex;">

                <input type="text" name="pid" value="<?=$pid?>" hidden>

                <label for="name">Name&nbsp;</label>
                <div style="margin-right: 10px;">
                    <input type="text" id="name" pattern="[\DA-Za-z]{1,}" name="fname" required value="<?=$fnamelname[0]?>"><br>
                    <small>First Name</small>
                </div>
                <div>
                    <input type="text" id="name" pattern="[\DA-Za-z]{1,}" name="lname" required value="<?=$fnamelname[1]?>"><br>
                    <small>Last Name</small><br>
                </div>
            </div>
            
            <div>
                <label for="dob">Date Of Birth&nbsp;</label>
                <input type="date" name="dob" id="dob" required value="<?=$info['pdob']?>"><br>
            </div>

            <div>
                <label>Sex :&nbsp;</label><br>
                <input type="radio" name="sex" id="male" value="MALE" required>
                <label for="male">Male</label>
                <input type="radio" name="sex" id="female" value="FEMALE" required>
                <label for="female">Female</label><br>
            </div>

            <div >
                <label for="contract">Contract&nbsp;</label>
                <span onclick="remove()"><i class="fa-solid fa-square-minus"></i></span><br>
                <div id="tel">
                    <?php while($row=$pTel->fetch()) :?>
                        <input type="tel" name="phone[]" id="phone1" required pattern="\d{10}" value="<?=$row['pnumber']?>">
                    <?php endwhile ?>
                </div>
            </div>
            
            <div>
                <label for="disease">Diseases&nbsp;</label>
                <span onclick="removeD()"><i class="fa-solid fa-square-minus"></i></span><br>
                <div id="diseases">
                    <?php foreach($checkDisease as $d) {?>
                        <input type="text" name="d[]" id="disease" value="<?=$d?>" required>
                    <?php } ?>
                </div>
            </div>

            <div>
                <label for="leavedate">Leave Date</label>
                <input type="date" name="date" id="leavedate" value="<?=$pdate['leavedate']?>">
            </div>
            <div style="text-align: center;">
                <input type="submit" value="Submit">
            </div>
            
        </form>
    </div>
</body>
</html>