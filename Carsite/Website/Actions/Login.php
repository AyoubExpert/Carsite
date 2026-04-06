<?php
session_start();
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$project_root = $doc_root . '/Carsite';

require $project_root . '/Website/Database/Connection.php';

$select_user = $Connection->prepare("SELECT * FROM accounts WHERE email = :email");
$select_user->bindParam(":email", $_POST['email']);
$select_user->execute();
$user = $select_user->fetch(PDO::FETCH_ASSOC);

if (password_verify($_POST['password'], $user['password'])) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    header('Location: /');
}