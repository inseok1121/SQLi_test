<?php
session_start();
$id = $_POST['user_id'];
$pw = $_POST['user_pwd'];

//if(strstr($id, "=") == 0 || strstr($id, "'") == 0 || strstsr($id, """) == 0){
//	echo "<script>alert(\"잘못된 EMAIL입니다.\");</script>";
  //      echo "<script>history.go(-1);</script>";

//}

$db = new mysqli('localhost', 'root', 'dlstjr153', 'MyWeb');

$quy = "select * from Users where email='".$id."'";
$result = $db->query($quy);

if($result->num_rows == 0){
	echo "<script>alert(\"Email이 존재하지않습니다.\");</script>";
        echo "<script>history.go(-1);</script>";

}else{
	$row = $result->fetch_array(MYSQLI_ASSOC);
	if(!password_verify($pw, $row['pw'])){
	        echo "<script>alert(\"PASSWORD가 일치하지 않습니다.\");</script>";
	        echo "<script>history.go(-1);</script>";

	}else if(password_verify($pw, $row['pw']) && $row['id'] == 1){
		$_SESSION["User_ID"] = "ROOT";
		$_SESSION["User_PW"] = $pw;	
		$_SESSION["User_NICK"] = $row['nickname'];
		echo "<script>alert(\"Hello Master.\");</script>";
                echo "<script>location.replace('./main.php');</script>";
	}
	else{

		$_SESSION["User_ID"] = $id;
		$_SESSION["User_PW"] = $pw;
		$_SESSION["User_NICK"] = $row['nickname'];
                echo "<script>alert(\"Welcome to My zOne.\");</script>";
                echo "<script>location.replace('./main.php');</script>";

	}
}


?>
