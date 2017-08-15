<html>
<head>
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
       <link rel="stylesheet"  href="./main_Login.css">
        <link rel="stylesheet"  href="./board.css">

</head>
<body>
<div id="read">
                <p>제목 : <?= $row["title"] ?></p>
                <p>이름 : <?= $row["author"] ?></p>
                <p>작성일 : <?= $row["date"] ?></p>
                <p>내용</p>
                <p id="content"><?= $row["context"] ?></p>
                <form action="edit.php" methoid="GET">
                        <input type="hidden" name="num" value="<?= $num ?>">
                        <input type="hidden" name="type" value="edit">
                        <input type="submit" value="수정">
                </form>
                <form action="remove.php" methoid="GET">
                        <input type="hidden" name="num" value="<?= $num ?>">
                        <input type="hidden" name="type" value="remove">
                        <input type="submit" value="삭제">
                </form>
                <form action="main.php">
                        <input type="submit" value="목록가기">
                </form>
        </div>
</body>
</html>
