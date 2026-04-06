<?php
session_start();

$doc_root = $_SERVER['DOCUMENT_ROOT'];
$project_root = $doc_root . '/Carsite';

require $project_root . '/Website/Database/Connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm-password'];

    if ($password !== $confirm) {
        echo "Wachtwoorden komen niet overeen!";
    }

    $stmt = $Connection->prepare("INSERT INTO accounts (email, password) VALUES (?, ?)");
    $stmt->execute([$email, $password]);

    $_SESSION['message'] = "Account aangemaakt!";
    header("Location: /Carsite/Website/Pages/Login/Base.php");
    exit;
}
?>