<?php
// mysqli_connect = php에서 mysql을 연결해주는 함수 (반대는 mysqli_close)
$conn = mysqli_connect('localhost', 'root', '04540121', 'opentutorials');

// INSERT = 테이블에 레코드를 삽입하기 위해 사용하는 구문.
$sql = "
  INSERT INTO topic
    (title, description, created)
    VALUES(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW()
    )
";
// mysqli_query = mysqli_connect를 통해 연결된 객체를 이용하며 mysql 쿼리를 실행시키는 함수
mysqli_query($conn, $sql); 
echo $sql;
?>