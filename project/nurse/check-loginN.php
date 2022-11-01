<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=system_hospital;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : ".$e->getMessage();
    }
    session_start();

  $stmt = $pdo->prepare("SELECT * FROM nurse WHERE nid = ? AND PASSWORD = ?");
  $stmt->bindParam(1, $_POST["username"]);
  $stmt->bindParam(2, $_POST["password"]);
  $stmt->execute();
  $row = $stmt->fetch();

  // หาก username และ password ตรงกัน จะมีข้อมูลในตัวแปร $row
  if (!empty($row)) { 
    session_regenerate_id();
    // นำข้อมูลผู้ใช้จากฐานข้อมูลเขียนลง session 2 ค่า
    $_SESSION["fullname"] = $row["nfnamelname"];   
    $_SESSION["username"] = $row["nid"];

    // แสดง link เพื่อไปยังหน้าต่อไปหลังจากตรวจสอบสำเร็จแล้ว
    echo "เข้าสู่ระบบสำเร็จ<br>";
    header( "refresh:1; url=index.php" );

  // กรณี username และ password ไม่ตรงกัน
  } else {
    echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
    header( "location:loginN.php?message=Username or Password not correct!" ); 
  }
?>
