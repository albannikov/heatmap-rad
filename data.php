<?php
 header('Content-Type: application/json; charset=utf-8');


require_once 'pdoconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM points";
    $result = $conn->query($sql);
      echo '<table><tr><th>id</th><th>Тип</th><th>Дата</th><th>Координаты</th><th>Описание</th></tr>';
     $data = array ();
     $coordinates = array ();
    // $data = '[';
     while($row = $result->fetch()){
        //  echo '<tr>';
        //     echo '<td>' . $row["id"] . '</td>';
        //     echo '<td>' . $row["TIPE"] . '</td>';
        //     echo '<td>' . $row["DATE"] . '</td>';
        //     echo '<td>' . $row["LOCATION"] . '</td>';
             $data = $data . $row["LOCATION_WIDTH"] . ','; //широта
             $data = $data . $row["LOCATION_LONG"] . ',';  //долгота
             $coordinates [] = array((float)$row["LOCATION_WIDTH"], (float)$row["LOCATION_LONG"]); // наполняем многомерный массив   
     }
 }


catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}



 
//  $data = [[62,131339, 77.457447],[62.130305, 77.456293],[62.131339, 77.457447],[62.129052, 77.454904],[62.131339, 77.457447],[62.131339, 77.457447],[62.131339, 77.457447],];          
$data = $coordinates;
 echo json_encode($data);
//  var_dump($data);
