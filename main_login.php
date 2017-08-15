<html>
<head>
<?php
session_start();
        if(isset($_SESSION['User_ID'])&&isset($_SESSION['User_NICK'])){
                echo "<meta http-equiv='refresh' content='0;url=main.php'>";
                exit;
        }
?>
<link rel="stylesheet" href="./main_Login.css" />

</head>
<body>

<div class = "login-page">
<div class = "form">
<form class = "login-form" action="process_login.php", method="post">
        <input type = "email" placeholder ="E-MAIL" name = "user_id"></br>
        <input type = "password" Placeholder = "PASSWORD" name = "user_pwd"></br>
        <input type="submit", value="SIGN IN">
</form>
<form action="main_signup.html">
<input type="submit", value="SIGN UP">
</form>

</div>
</div>
</body>
</html>

