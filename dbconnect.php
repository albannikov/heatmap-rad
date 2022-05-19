<?php
require_once 'pdoconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM points";
    $result = $conn->query($sql);
    echo "<table><tr><th>id</th><th>Тип</th><th>Дата</th><th>Координаты</th><th>Описание</th></tr>";
    $answer = '[';
    while($row = $result->fetch()){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["TIPE"] . "</td>";
            echo "<td>" . $row["DATE"] . "</td>";
            echo "<td>" . $row["LOCATION"] . "</td>";
            $answer = $answer . $row["LOCATION"] . ',';
            echo "<td>" . $row["DESCRIPTION"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $answer = $answer . ']';
    echo $answer;
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}


// нужно получить такой вид переменной
// answer = [
//     [62.131339, 77.457447],
//     [62.130305, 77.456293],
//     [62.131339, 77.457447],
//     [62.129052, 77.454904],
//     [62.131339, 77.457447],
//     [62.131339, 77.457447],
//     [62.131339, 77.457447],
//     [62.127178, 77.452819],
//     [62.131726, 77.457323],
//     [62.130909, 77.457638],
//     [62.131195, 77.457839],
//     [62.131402, 77.456940]
// ];

?>