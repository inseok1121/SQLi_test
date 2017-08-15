<!DOCTYPE html>
<?php
$db = new mysqli('localhost', 'root', 'dlstjr153', 'MyWeb');
?>
<html lang="ko">
	<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet"  href="./main_Login.css">
	<link rel="stylesheet"  href="./board.css">
	
	<title>게시판</title>
	</head>
	<body>
	
	<?php
	session_start();
	if(!isset($_SESSION['User_ID'])||!isset($_SESSION['User_NICK'])){
		echo "<meta http-equiv='refresh' content='0;url=main_login.php'>";
		exit;
	}
	$User_Nick = $_SESSION['USER_NICK'];	

	?>

	<form action='./main_logout.php' align="right">
		<input type='submit' class="button" value='LOGOUT'>
	</form>
	<div class="list-page">
	<article class="boardArticle">

	<input type = "button" value = "글 작성" class = "button"  onclick="location.href='./write.php'">	
	<table>
			<tr id="info">
				<td scope ="col" class="no">번호</td>
				<td scope ="col" class="title">제목</td>
				<td scope ="col" class="author">작성자</td>
				<td scope ="col" class="date">날짜</td>
			</tr>
			<?php
			$quy = 'select * from Boards order by number desc';
			$result = $db->query($quy);
			while($row = $result->fetch_assoc()){   
			?>
			<tr>
				<td class="no"><?= $row["number"] ?></td>
				<td class="title"><a href="read.php?num=<?=$row["number"]?>"> <?= $row["title"] ?></a></td>
				<td class="author"><?= $row["author"] ?></td>
				<td class="date"><?= $row["date"] ?></td>
			</tr>
			<?php }?>
		</table>
	</article>

</div>
	</body>
</html>
