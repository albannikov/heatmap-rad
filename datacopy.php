<?php
//header('Content-Type: application/json; charset=utf-8');
require_once 'pdoconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM points WHERE TIPE = 'snow'";
    $result = $conn->query($sql);
     while($row = $result->fetch()){
             $coordinates [] = [(float)$row["LOCATION_WIDTH"], (float)$row["LOCATION_LONG"]]; // наполняем многомерный массив   
     }
 }
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
 echo json_encode($coordinates);

?>