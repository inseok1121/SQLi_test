<?php
session_start();
$num = $_POST['num'];
$pw = $_POST['pw'];

$db = new mysqli('localhost', 'root', 'dlstjr153' ,'MyWeb');

$quy = 'select * from Boards where number = '.$num;

$result = $db->query($quy);

$row = $result->fetch_array(MYSQLI_ASSOC);



if(password_verify($pw, $row['password']) || $_SESSION["User_ID"] == "ROOT"){
	$quy = 'delete from Boards where number = '.$num;
	$result = $db->query($quy);

        echo "<script>alert(\"삭제되었습니다.\");</script>";
        echo "<script>location.href='/main.php'</script>";
}else{
        echo "<script>alert(\"PASSWORD가 일치하지 않습니다.\");</script>";
        echo "<script>history.go(-1);</script>";


}


?>
