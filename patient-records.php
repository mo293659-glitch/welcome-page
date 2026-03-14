<?php
session_start();
if(!isset($_SESSION['employeeLoggedIn'])){
    header("Location: employee_login.php");
    exit();
}
$conn = mysqli_connect("localhost","root","","hospital");
if(!$conn){ die("فشل الاتصال بالداتا بيز: ".mysqli_connect_error()); }
$sql = "SELECT * FROM patients"; // جدول المرضى
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>تسجيلات المرضى</title>
<style>
table {width:90%; margin:auto; border-collapse:collapse;}
th, td {padding:12px; border:1px solid #ccc; text-align:center;}
th {background:#43cea2; color:white;}
</style>
</head>
<body>
<h2 style="text-align:center;">تسجيلات المرضى</h2>
<table>
<tr>
<th>الرقم القومي</th>
<th>الاسم</th>
<th>التخصص</th>
<th>التاريخ</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
    <td>".$row['national_id']."</td>
    <td>".$row['name']."</td>
    <td>".$row['specialty']."</td>
    <td>".$row['date']."</td>
    </tr>";
}
?>
</table>
</body>
</html>