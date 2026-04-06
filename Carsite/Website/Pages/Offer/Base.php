<?php
$doc_root = $_SERVER['DOCUMENT_ROOT'];
$project_root = $doc_root . '/Carsite';
$bases_url = $bases_url ?? '../../';

require $project_root . '/Website/Database/Connection.php';
require $project_root . '/Website/Assets/Includes/Header.php';

$limit = $_GET['limit'] ?? null;
?>

<body>
    <main>
        <div class="filters"> <?php include $bases_url . 'Assets/Includes/Filter.php'; ?>
        </div>

        <div class="main-content">
            <?php include $bases_url . 'Assets/Includes/Dropoff.php'; ?>
            <div class="list"></div>
            <?php $limit = $limit ?? 6;
            include $bases_url . 'Assets/Includes/Cars.php'; ?>
            <?php $limit = 100;
            include $bases_url . 'Assets/Includes/Total_Cars.php'; ?>
        </div>
    </main>

    <?php include $bases_url . 'Assets/Includes/Footer.php'; ?>
</body>
</html>