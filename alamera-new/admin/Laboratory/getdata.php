<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'alamera';

$conn = new MySQLi($host, $user, $pass, $db_name);


$stmt = $conn->prepare("select * FROM Laboratory");
$stmt->execute();
$result = $stmt->get_result();
$i = 0;

while($row1 = $result->fetch_assoc()){
    $mydata1[$i] = $row1;
  
  
    // $depot_data[$i]= $row["depot"];
    $i++;
}
// print_r($mydata);
echo json_encode($mydata1);
// http://localhost/alamera-new/admin/Laboratory/getdata.php





?>


