<?php
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$project_root = $doc_root . '/Carsite';
$bases_url = $bases_url ?? '../../';

require $project_root . '/Website/Database/Connection.php';
require $project_root . '/Website/Assets/Includes/Header.php';

if (!isset($_COOKIE['user_id'])) {
    die("Niet ingelogd");
}

$select_user = $Connection->prepare("SELECT * FROM accounts WHERE id = :id");
$select_user->bindParam(":id", $_COOKIE['user_id']);
$select_user->execute();
$user = $select_user->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <main class="account-info">

        <form class="account__form" method="POST" action="update_account.php">
            <h2>Account gegevens</h2>

            <div class="form-group">
                <label>Email:</label>
                <label class="input"><?= htmlspecialchars($user['email']); ?></label>
            </div>
        </form>

    </main>

    <?php include $bases_url . 'Assets/Includes/Footer.php'; ?>
</body>

</html>