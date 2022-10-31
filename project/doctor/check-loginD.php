<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : ".$e->getMessage();
    }
  
  session_start();

  $stmt = $pdo->prepare("SELECT * FROM doctor WHERE doctor.did = ? AND doctor.password = ?");
  $stmt->bindParam(1, $_POST["username"]);
  $stmt->bindParam(2, $_POST["password"]);
  $stmt->execute();
  $row = $stmt->fetch();

  // หาก username และ password ตรงกัน จะมีข้อมูลในตัวแปร $row
  if (!empty($row)) { 
    // นำข้อมูลผู้ใช้จากฐานข้อมูลเขียนลง session 2 ค่า
    $_SESSION["fullname"] = $row["dfnamelname"];   
    $_SESSION["username"] = $row["did"];

    // แสดง link เพื่อไปยังหน้าต่อไปหลังจากตรวจสอบสำเร็จแล้ว
    echo "เข้าสู่ระบบสำเร็จ<br>";
    echo "<a href='user-home.php'>ไปยังหน้าหลักของผู้ใช้</a>"; 

  // กรณี username และ password ไม่ตรงกัน
  } else {
    echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
    echo "<a href='loginD.php'>เข้าสู่ระบบอีกครัง</a>"; 
  }
?>
