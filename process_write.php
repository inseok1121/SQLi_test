<?php
const PASSWORD_COST = ['cost' =>12];
$db = new mysqli('localhost', 'root', 'dlstjr153', 'MyWeb');
$title = $_POST['title'];
$nick = $_POST['nick'];
$pw = $_POST['pw'];
$hashpw = password_hash($pw, PASSWORD_DEFAULT, PASSWORD_COST);
$context = $_POST['context'];
$time = date("Y-m-d H:i:s", time());
if($title == NULL){
        echo "<script>alert(\"제목을 입력해주세요\");</script>";
        echo "<script>history.go(-1);</script>";
}
else if($nick == NULL){
        echo "<script>alert(\"이름을 입력해주세요\");</script>";
        echo "<script>history.go(-1);</script>";
}

else if($pw == NULL){
        echo "<script>alert(\"PASSWORD를 입력해주세요\");</script>";
        echo "<script>history.go(-1);</script>";
}
else if($context == NULL){
        echo "<script>alert(\" 내용을 입력해주세요.\");</script>";
        echo "<script>history.go(-1);</script>";

}
/*
$title=preg_replace("!<script(.*?)<\/script>!is","",$title);
$context=preg_replace("!<script(.*?)<\/script>!is","",$context);
$title=str_replace("<"," ",$title);
$context=str_replace("<"," ", $context);
*/

$title = preg_replace('/\.|,<|^>\/$/', "", $title);
$context = preg_replace('/\.<|,>|^\/$/', "", $context);

$quy = "insert into Boards values(NULL,'".$title."', '".$time."', '".$context."', '".$hashpw."', '".$nick."')";
echo $quy;
$db->query($quy);

echo  "<script>alert(\" 글 작성 완료.\");</script>";
$db->close();

echo "<script>location.href='/main.php';</script>";





?>
