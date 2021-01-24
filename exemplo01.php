<?php

$dbname= "db_04012021";
$host= "localhost";
$username="root";
$password="";

$conn = new PDO("mysql:dbname=$dbname;host=$host", $username, $password);

$stmt = $conn->prepare("SELECT name, email FROM `users`");

$stmt->execute();

$results = $stmt->fetchAll(PDO:: FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        foreach($results  as $row) {
            foreach($row as $key => $value) {
                echo "<p><strong>". $key .":</strong>". $value . "</p><br/>";
                }
            echo "======================================================================== <br>";
        }   
    ?>
</body>
</html>