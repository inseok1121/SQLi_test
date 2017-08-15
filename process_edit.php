<?php
session_start();
$db = new mysqli('localhost', 'root', 'dlstjr153', 'MyWeb');

$title = $_POST['title'];
$nick = $_POST['nick'];
$num = $_POST['num'];
$pw = $_POST['pw'];
$context = $_POST['context'];
$time = date("Y-m-d H:i:s", time());
$quy = 'select * from Boards where number = '.$num;
$title=preg_replace("!<script(.*?)<\/script>!is","",$title);
$context=preg_replace("!<script(.*?)<\/script>!is","",$context);
$title=str_replace("<"," ",$title);
$context=str_replace("<"," ", $context);
$result = $db->query($quy);

$row = $result->fetch_array(MYSQLI_ASSOC);

if($_SESSION["User_ID"] == "ROOT"){
        $quy = 'update Boards set title = "'.$title.'" where number ='.$num;
        $result =  $db->query($quy);
	$quy = 'update Boards set context = "'.$context.'" where number ='.$num;
        $result =  $db->query($quy);
	$quy = 'update Boards set author = "'.$nick.'" where number ='.$num;
        $result =  $db->query($quy);
	$quy = 'update Boards set date = "'.$time.'" where number ='.$num;
        $result =  $db->query($quy);


        echo "<script>alert(\"수정되었습니다.\");</script>";
        echo "<script>location.href='/main.php'</script>";

}

if(!password_verify($pw, $row['password'])){
	        echo "<script>alert(\"PASSWORD가 일치하지 않습니다.\");</script>";
                echo "<script>history.go(-1);</script>";
}
else if(password_verify($pw, $row['password'])){
	$quy = 'update Boards set title = "'.$title.'" where number ='.$num;
        $result =  $db->query($quy);
        $quy = 'update Boards set context = "'.$context.'" where number ='.$num;
        $result =  $db->query($quy);
        $quy = 'update Boards set author = "'.$nick.'" where number ='.$num;
        $result =  $db->query($quy);
        $quy = 'update Boards set date = "'.$time.'" where number ='.$num;
        $result =  $db->query($quy);

	echo "<script>alert(\"수정되었습니다.\");</script>";
        echo "<script>location.href='/main.php'</script>";

}



?>
