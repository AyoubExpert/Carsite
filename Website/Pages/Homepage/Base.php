<?php
include 'Website/Assets/Includes/Header.php';
include 'Website/Database/Connection.php';
?>

<body>
    <header>
        <h1 class="title">Auto's verhuur | Rydr Rotterdam </h1>
        <div class="advertorials"> <?php include 'Website/Pages/Homepage/Advertorials.php'; ?> </div>
    </header>

    <main>
        <h2 class="section-title">Populaire auto's</h2>
        <div class="cars"> <?php include 'Website/Pages/Homepage/Cars.php'; ?> </div>
        <div class="show-more">
            <a class="button-primary" href="#">Toon alle</a>
        </div>
    </main>
</body>

<?php
include 'Website/Assets/Includes/Footer.php';
?>
</html>