<?php
$bases_url = $bases_url ?? 'Website/';
require 'Website/Assets/Includes/Header.php';
require 'Website/Database/Connection.php';
?>

<body>
    <header>
        <div class="advertorials"> <?php include 'Website/Pages/Homepage/Advertorials.php'; ?> </div>
    </header>

    <main>
        <?php include 'Website/Assets/Includes/Dropoff.php'; ?>
        <div class="list">
            <h2 class="section-title">Popular Cars</h2>
            <a class="label-primary" id="view-all-button">View All</a>
        </div>
        <?php $limit = 4;
        include 'Website/Assets/Includes/Cars.php'; ?>
    </main>


    <main>
        <div class="list">
            <h2 class="section-title">Recommendation Cars</h2>
        </div>

        <?php $limit = 8;
        include 'Website/Assets/Includes/Cars.php'; ?>
        <?php $limit = 6;
        include 'Website/Assets/Includes/Total_Cars.php'; ?>
    </main>
    
    <?php include 'Website/Assets/Includes/Footer.php'; ?>
    <script type="module" src="Website/Assets/Includes/Main.js"></script>
</body>

</html>