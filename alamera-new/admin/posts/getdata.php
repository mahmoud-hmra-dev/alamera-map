<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'alamera';

$conn = new MySQLi($host, $user, $pass, $db_name);


$stmt = $conn->prepare("select * FROM posts");
$stmt->execute();
$result = $stmt->get_result();
$i = 0;

while($row = $result->fetch_assoc()){
    $mydata[$i] = $row;
  
  
    // $depot_data[$i]= $row["depot"];
    $i++;
}
// print_r($mydata);
echo json_encode($mydata);





?>


