<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "users";

    $conn = new mysqli($server, $username, $password, $db);
    //Connecting
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully<br>";

    $sql = "SELECT id, name, username, password FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
    }
    } else {
        echo "0 results";
    }
    
    $conn->close();
?>