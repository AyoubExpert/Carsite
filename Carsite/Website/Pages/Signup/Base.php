<?php
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$project_root = $doc_root . '/Carsite';
$bases_url = $bases_url ?? '../../';

require $project_root . '/Website/Database/Connection.php';
require $project_root . '/Website/Assets/Includes/Header.php';
?>

<body>
    <main>
        <form action="<?php echo $bases_url; ?>Actions/Signup.php" method="post" class="account-form">
            <h2>Maak een account aan</h2>
            <?php if (isset($_SESSION['message'])): ?>
                <div class="message">
                    <?= $_SESSION['message'] ?>
                </div>
                <?php
                session_destroy();
            endif; ?>
            <label for="email">Uw e-mail</label>
            <input type="email" name="email" id="email" placeholder="johndoe@gmail.com"
                value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '' ?>" required autofocus>
            <label for="password">Uw wachtwoord</label>
            <input type="password" name="password" id="password" placeholder="Uw wachtwoord" required>
            <label for="confirm-password">Herhaal wachtwoord</label>
            <input type="password" name="confirm-password" id="confirm-password" placeholder="Uw wachtwoord" required>
            <input type="submit" value="Maak account aan" class="button-primary">
        </form>
    </main>

    <?php include $bases_url . 'Assets/Includes/Footer.php'; ?>
</body>

</html>