<?php
const PASSWORD_COST = ['cost'=>12];
$db = new mysqli('localhost', 'root', 'dlstjr153', 'MyWeb');

$id = $_POST['id'];
$pw = $_POST['pw'];
$pwck = $_POST['pwch'];
$nick = $_POST['nick'];
$quy = "select email from Users where email = '".$id."'";
$result = $db->query($quy);
if($result->num_rows != 0){
	echo "<script>alert(\"Email이 존재합니다.\");</script>";
        echo "<script>history.go(-1);</script>";

}

$quy = "select nickname from Users where nickname = '".$nick."'";
$result = $db->query($quy);
if($result->num_rows != 0){
        echo "<script>alert(\"NICKNAME이 존재합니다.\");</script>";
        echo "<script>history.go(-1);</script>";
}

if($id == NULL){
	echo "<script>alert(\"EMAIL을 입력해주세요\");</script>";
	echo "<script>history.go(-1);</script>";
}
else if($pw == NULL){
        echo "<script>alert(\"PASSWORD를 입력해주세요\");</script>";
        echo "<script>history.go(-1);</script>";
}

else if($pwck == NULL){
        echo "<script>alert(\"PASSWORD를 다시 입력해주세요\");</script>";
        echo "<script>history.go(-1);</script>";
}
else if($pw != $pwck){
        echo "<script>alert(\"PASSWORD를 다시 확인해주세요.\");</script>";
        echo "<script>history.go(-1);</script>";

}
else if($nick == NULL){
        echo "<script>alert(\"NICKNAME을 입력해주세요\");</script>";
        echo "<script>history.go(-1);</script>";
}else{
$hashpw = password_hash($pw, PASSWORD_DEFAULT, PASSWORD_COST);

$quy = "insert into Users values('".$id."', '".$hashpw."', '".$nick."', NULL)";
$db->query($quy);

$db->close();
echo "<script>alert(\"WeLcoMe tO My wEb\");</script>";
echo "<script>location.href='/main.php';</script>";
}
?>
