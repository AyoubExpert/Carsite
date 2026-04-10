<?php
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$project_root = $doc_root . '/Carsite';
$bases_url = $bases_url ?? '../../';

require $project_root . '/Website/Database/Connection.php';
require $project_root . '/Website/Assets/Includes/Header.php';
?>

<body>
    <main class="team-page">
        <section class="team">
            <h1>Ons Bedrijf:</h1>
            <div class="team-grid">
                <img src="<?= $bases_url ?>Assets/Images/Team/Company.png" alt="Company Logo">
            </div>
            <p>Welkom bij Rydr, waar innovatie en kwaliteit samenkomen om uw reiservaring te verbeteren.</p>
        </section>

        <section class="team">
            <h1>Ons Team</h1>

            <div class="team-grid">

                <div class="team-member">
                    <img src="<?= $bases_url ?>Assets/Images/Team/Brian-Mensah.png" alt="Brian Mensah">
                    <h3>Brian Mensah</h3>
                    <p>CEO & Founder. Verantwoordelijk voor de visie en strategie van het bedrijf.</p>
                </div>

                <div class="team-member">
                    <img src="<?= $bases_url ?>Assets/Images/Team/Jasper-Van-Den-Brink.png" alt="Jasper van den Brink">
                    <h3>Jasper van den Brink</h3>
                    <p>Lead Developer. Bouwt en onderhoudt de technische infrastructuur.</p>
                </div>

                <div class="team-member">
                    <img src="<?= $bases_url ?>Assets/Images/Team/Lotte-De-Graaf.png" alt="Lotte de Graaf">
                    <h3>Lotte de Graaf</h3>
                    <p>Marketing Specialist. Zorgt voor groei en zichtbaarheid van het merk.</p>
                </div>

                <div class="team-member">
                    <img src="<?= $bases_url ?>Assets/Images/Team/Youssef-Armani.png" alt="Youssef Armani">
                    <h3>Youssef Armani</h3>
                    <p>Sales Manager. Richt zich op klantrelaties en verkoopstrategieën.</p>
                </div>

            </div>
        </section>

    </main>

    <?php include $bases_url . 'Assets/Includes/Footer.php'; ?>
</body>

</html>