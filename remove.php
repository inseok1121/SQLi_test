<?php

session_start();
$db = new mysqli('localhost', 'root', 'dlstjr153', 'MyWeb');
$num = $_GET['num'];
$quy = 'select title, context, author, password, date from Boards where number = '.$num;

$result = $db->query($quy);
$row = $result->fetch_array(MYSQLI_ASSOC);

if($result->num_rows==0){
        echo "<script>alert(\"해당 글이 존재하지않습니다.\");</script>";
        echo "<script>location.href='./main.php'</script>";

}


?>

<html>
<head>
 <link rel="stylesheet"  href="./main_Login.css">
</head>
<body>
<div class = "login-page">
<div class = "form">
<form action = "process_remove.php" method="POST">
<input type='password' placeholder = "PASSWORD" name='pw'>
<input type='hidden' name = 'num' value="<?=$num?>">
<input type="submit" value="삭제">
</div>
</div>
</body>
</html>
