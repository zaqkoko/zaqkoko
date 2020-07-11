<?php
// mysqli_connect = php에서 mysql을 연결해주는 함수 (반대는 mysqli_close)
$conn = mysqli_connect('localhost', 'root', '04540121', 'opentutorials');

// INSERT = 테이블에 레코드를 삽입하기 위해 사용하는 구문.
$sql = "
  INSERT INTO topic (
    title,
    description,
    created
  ) VALUES (
     'MySQL',
     'MySQL is ....',
     NOW()
  )";

// mysqli_query = mysqli_connect를 통해 연결된 객체를 이용하며 mysql 쿼리를 실행시키는 함수
$result = mysqli_query($conn, $sql);

if($result === false){
    echo mysqli_error($conn);
}else{
  echo '성공했습니다 <a href="index.php">돌아가기<a/>';
}

?>
