<?php
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$project_root = $doc_root . '/Carsite';
$bases_url = $bases_url ?? '../../';

require $project_root . '/Website/Database/Connection.php';
require $project_root . '/Website/Assets/Includes/Header.php';
?>

<body>
    <main>
        <main>
            <form action="<?php echo $bases_url; ?>Actions/Login.php" class="account-form" method="post">
                <h2>Log in</h2>
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="succes-message">
                        <?= $_SESSION['success'] ?>
                    </div>
                <?php } ?>
                <label for="email">Uw e-mail</label>
                <input type="email" name="email" id="email" placeholder="johndoe@gmail.com"
                    value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '' ?>" required
                    autofocus>
                <label for="password">Uw wachtwoord</label>
                <input type="password" name="password" id="password" placeholder="Uw wachtwoord" required>
                <input type="submit" value="Log in" class="button-primary">
            </form>
        </main>
    </main>

    <?php include $bases_url . 'Assets/Includes/Footer.php'; ?>
</body>

</html>