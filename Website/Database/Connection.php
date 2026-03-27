<?php
$Settings = json_decode(file_get_contents('Website/Database/Settings.json'), true);

$Server_Settings = $Settings["Server_Settings"];
$User_Settings = $Settings["User_Settings"];

try {
    $Connection = new PDO(
        "mysql:host=" . 
        $Server_Settings["Name"] . 
        ";dbname=" . $Server_Settings["Database"] . 
        ";charset=utf8", $User_Settings["Name"],
        $User_Settings["Pass"]
        );
}

catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?> 