<?php
// mysqli_connect = php에서 mysql을 연결해주는 함수 (반대는 mysqli_close)
$conn = mysqli_connect('localhost', 'root', '04540121', 'opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
    //<li><a href=\"index.php?id=5\">MySQL</a><li>
    // db에 저장된 타이틀과 id값을 받아와서 각 값에 맞는 링크로 연결시켜줌
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>"; 
}

// 기본값
$article = array('title' => 'Welcome', 'description' => 'Hello, Web');

// id값이 있으면 해당 id값 출력, 없으면 기본값 출력 
if(isset($_GET['id'])) {
    $sql = "SELECT * FROM topic WHERE id = {$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = $row['title'];
    $article['description'] = $row['description'];
    print_r($article);
}
?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
</head>
<body>
    <h1><a href = "index.php">WEB</a></h1>
    <ol> <?=$list?> </ol> <!-- php문과 같다 -->
    <form action="process_create.php" method="POST">
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="description" placeholder="description"></textarea></p>
        <p><input type="submit"></p>
    </form>
</body>

</html>