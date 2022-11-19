<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location: ../loginN.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .contain {
            padding: 20px 250px;
            display: flex;
            flex-direction: column;
        }

        .bottom {
            margin-bottom: 5px;
        }

        button {
            width: 100%;
            padding: 10px 0;
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background: pink;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        button:hover {
            background: palevioletred;
        }
    </style>
    <script>
        function removeTel() {
            try {
                let tel = document.getElementById("tel");
                tel.removeChild(tel.lastChild);
            } catch (err) {
                console.log(err);
            }

        }

        function addTel() {
            let input = document.createElement("INPUT");
            input.setAttribute("type", "tel");
            input.setAttribute("name", "phone[]");
            input.setAttribute("required", "");
            input.pattern = "[0-9]{10}";
            document.getElementById("tel").appendChild(input).style.display = "block";
        }

        function addDisease() {
            let input = document.createElement("INPUT");
            input.setAttribute("type", "text");
            input.setAttribute("name", "d[]");
            document.getElementById("diseases").appendChild(input).style.display = "block";
        }

        function removeDisease() {
            try {
                let disease = document.getElementById("diseases");
                disease.removeChild(disease.lastChild);
            } catch (err) {
                console.log(err);
            }
        }
    </script>
    <title>Document</title>
</head>

<body>
<?php include './nav.php' ?>
    <form action="insert_patient.php" method="post">
        <div class="form">
            <div class="firstlastname">
                <label for="name">First Name : </label>
                <input type="text" id="name"  pattern="[\DA-Za-z]{1,}" name="fname" required title="First name must contain characters a - z , A-Z only!"><br>
                <label for="name">Last Name : </label>
                <input type="text" id="name" pattern="[\DA-Za-z]{1,}" name="lname" required title="Last name must contain characters a - z , A-Z only!">
            </div>

            <div class="form">
                <label for="dob">Date Of Birth</label>
                <input type="date" name="dob" id="dob" required><br>
            </div>

            <div class="form">
                <label>Sex</label>
                <div class="form">
                    <div>
                        <input type="radio" name="sex" id="male" value="MALE" required>
                        <label for="male">Male</label>
                    </div>

                    <div>
                        <input type="radio" name="sex" id="female" value="FEMALE" required>
                        <label for="male">Female</label><br>
                    </div>
                </div>
            </div>

            <div class="form">
                <label for="contract">Contract</label>
                <div>
                    <input type="tel" name="phone[]" id="phone1" required pattern="\d{10}" title="Phone number must contain 0-9 only!">
                    <span onclick="addTel()">+</span>
                    <span onclick="removeTel()">-</span>
                </div>
            </div>
            <div id="tel"></div>

            <div class="form">
                <label for="disease">Diseases</label>
                <div>
                    <input type="text" id="diseaseInput" name="d[]">
                    <span onclick="addDisease()">+</span>
                    <span onclick="removeDisease()">-</span>
                </div>
            </div>
            <div id="diseases"></div>
            <input type="submit" value="Submit"> <br> <br>
            <hr>
        </form>

    </div>
    <button> <a href="../index.php">Back</a> </button>
</body>

</html>