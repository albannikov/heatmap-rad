<?php
require_once 'pdoconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM points";
    $result = $conn->query($sql);
    echo "<table class='table'><thead><tr><th>id</th><th>Тип</th><th>Дата</th><th>Широта</th><th>Долгота</th><th>Описание</th></tr></thead>";
    
    while($row = $result->fetch()){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["TIPE"] . "</td>";
            echo "<td>" . $row["DATE"] . "</td>";
            echo "<td>" . $row["LOCATION_WIDTH"] . "</td>";
            echo "<td>" . $row["LOCATION_LONG"] . "</td>";
            echo "<td>" . $row["DESCRIPTION"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";    
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

?>