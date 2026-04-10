<?php require "Website/Assets/Includes/Header.php" ?>
<main>
    <h2>Deze pagina bestaat niet</h2>

     <form method="GET" action="<?= $bases_url ?>../Index.php">
        <input type="hidden" name="page" value="Homepage">
        <button type="submit" class="button-primary" ;">Ga terug naar homepage</button>
    </form>
</main>
<?php require "Website/Assets/Includes/Footer.php" ?>