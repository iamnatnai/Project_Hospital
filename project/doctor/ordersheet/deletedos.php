<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script>
        var xmlHttp;
        function show() {
            xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = showResult;
            var dosid = document.getElementById("dosid").value;
            var url = "tmp.php?dosid=" + dosid;
            xmlHttp.open("GET", url, true);
            xmlHttp.send();
        }
        function confirmDelete(data) {
            //alert(dosid);
            //console.log(data);
            var arr = data.split(",");
            console.log(arr);
            var ans = confirm("ต้องการลบ DOSid : " + arr[0]);
                if (ans == true) {
                    document.location = `delete.php?dosid=${arr[0]}`;
                }
        }

        function showResult() {
            if (xmlHttp.readyState == 4) {
                if (xmlHttp.status == 200) {
                    let data = JSON.parse(xmlHttp.responseText);
                    let php = ""
                    data.forEach(element => {
                        php += `
                        <div>
                            Doctor's order sheet ID : ${element[0]}<br><br>
                            SID : ${element[1]}<br><br>
                            Order date : ${element[2]}<br><br>
                            Order time : ${element[3]}<br><br>
                            Guideline : ${element[4]}<br><br>
                            Status : ${element[5]}<br><br>
                            <a href='#' onclick='confirmDelete("${element[0]}")'>Delete</a>
                            <hr>
                        </div>`
                    });
                    console.log(data);
                    document.getElementById("result").innerHTML = php;
                }
            }
        }
    </script>
</head>

<body>
    <a href="insertdos.php">Insert</a> |
    <a href="editdos.php">Edit</a> |
    <a href="deletedos.php">Delete</a> <br><br>

    <label for="dosid">ค้นหา Doctor's order sheet ID ที่ต้องการจะลบ :</label>
    <input type="text" name="dosid" id="dosid">
    <input type="submit" value="Search" onclick="show()">
    <div id="result"></div>
</body>

</html>