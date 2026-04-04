<?php
$totalStmt = $Connection->query("SELECT COUNT(*) as total FROM cars");
$totalCars = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];
?>

<div class="list2">
    <div class="show-more">
        <form method="GET" action="<?= $bases_url ?>../Index.php">
            <input type="hidden" name="page" value="Offer">
            <input type="hidden" name="limit" value="<?= $limit ?>">
            <button type="submit" class="button-primary" ;">Show All Cars</button>
        </form>

    </div>
    <h2 class="section-title"><?= $totalCars ?> Cars
    </h2>
</div>