<?php
// mysqli_connect = php에서 mysql을 연결해주는 함수 (반대는 mysqli_close)
$conn = mysqli_connect('localhost', 'root', '04540121', 'opentutorials');

// SELECT - 테이블의 레코드를 조회하기 위해 사용하는 구문.
// SELECT 주의할 점 - 모든 데이터를 가져오면 큰일날 수 있다. (갯수 제한을 거는 함수 - LIMIT)
// SELECT [컬럼명] FROM [테이블명] WHERE [조건절]

echo "<h1> single row </h1>";

// 1 row
$sql = "SELECT * FROM topic";

// mysqli_query = mysqli_connect를 통해 연결된 객체를 이용하며 mysql 쿼리를 실행시키는 함수 
$result = mysqli_query($conn, $sql);

// mysqli_fetch_array = mysqli_query를 통해 얻은 값에서 레코드를 1개씩 리턴해주는 함수
// while - $row 의 값이 있을 때까지 돌려라. NULL값이면 while 종료. php문에서 NULL값은 false로 취급함.
while($row = mysqli_fetch_array($result)){
    echo '<h2>' . $row['title'] . '</h2>';
    echo $row['description'];
}

?>