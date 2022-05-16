<?php
require_once 'pdoconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM points";
    $result = $conn->query($sql);
    echo "<table><tr><th>id</th><th>Тип</th><th>Дата</th><th>Координаты</th><th>Описание</th></tr>";
    while($row = $result->fetch()){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["TIPE"] . "</td>";
            echo "<td>" . $row["DATE"] . "</td>";
            echo "<td>" . $row["LOCATION"] . "</td>";
            echo "<td>" . $row["DESCRIPTION"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}


?>