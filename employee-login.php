<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>دخول الموظف</title>
<style>
body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(to right, #f0f4f8, #d9e2ec); direction: rtl; margin:0; padding:0; height:100vh; display:flex; justify-content:center; align-items:center;}
.container {background:#fff; width:400px; padding:40px 30px; border-radius:25px; box-shadow:0 15px 35px rgba(0,0,0,0.15); text-align:center;}
h2 {margin-bottom:25px;color:#222;}
input {width:90%; padding:12px; margin:12px 0; border-radius:10px; border:1px solid #ccc; font-size:16px; outline:none;}
button {width:100%; padding:14px 0; margin-top:20px; border:none; border-radius:15px; font-size:18px; font-weight:600; cursor:pointer; background:linear-gradient(90deg,#43cea2 0%,#185a9d 100%); color:white; transition:0.3s;}
button:hover {transform:translateY(-3px); box-shadow:0 8px 20px rgba(0,0,0,0.2);}
p { color:red; margin-top:10px;}
</style>
</head>
<body>
<div class="container">
<h2>دخول الموظف</h2>
<form method="POST" action="">
<input type="text" name="national_id" placeholder="الرقم القومي" required>
<input type="password" name="password" placeholder="كلمة المرور" required>
<button type="submit" name="login">دخول</button>
</form>
<p>
<?php
session_start();
if(isset($_POST['login'])){
    $conn = mysqli_connect("localhost","root","","hospital");
    if(!$conn){ die("فشل الاتصال بالداتا بيز: ".mysqli_connect_error()); }
    $national_id = mysqli_real_escape_string($conn,$_POST['national_id']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $sql = "SELECT * FROM employees WHERE national_id='$national_id' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $_SESSION['employeeLoggedIn'] = true;
        header("Location: patient_records.php"); // الرابط للصفحة التانية
        exit();
    } else { echo "الرقم القومي أو كلمة المرور غير صحيحة!"; }
}
?>
</p>
</div>
</body>
</html>