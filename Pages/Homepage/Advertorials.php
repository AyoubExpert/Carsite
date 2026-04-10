<?php
$shapes = ['Circle', 'Block'];
$background_colors = ['#54A6FF', '#3563e9'];
$name = ['The Best Platform for Car Rental', 'Easy way to rent a car at a low price'];
$desc = ['Ease of doing a car rental safely and reliably. Of course at a low price.', 'Providing cheap car rental services and safe and comfortable facilities.'];
$button_colors = ['#3563e9', '#54A6FF'];
$stmt = $Connection->prepare("SELECT * FROM cars ORDER BY RAND() LIMIT 2");
$stmt->execute();
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($cars as $index => $car):
    $shape = $shapes[$index % count($shapes)];
    $bg_color = $background_colors[$index % count($background_colors)];
    $button_color = $button_colors[$index % count($button_colors)];
    $des = $desc[$index % count($desc)];
    $nam = $name[$index % count($name)];
    ?>
    <div class="advertorial" style="background-color: <?= $bg_color ?>;">
        <h2><?= htmlspecialchars($nam) ?></h2>
        <p><?= htmlspecialchars($des) ?></p>

        <form method="GET" action="<?= $bases_url ?>../Index.php" onsubmit="setCity(this)">
            <input type="hidden" name="page" value="Detail">
            <input type="hidden" name="id" value="<?= $car['id'] ?>">
            <input type="hidden" name="pickup_city">
            <input type="hidden" name="dropoff_city">
            <input type="hidden" name="pickup_date">
            <input type="hidden" name="dropoff_date">
            <input type="hidden" name="pickup_time">
            <input type="hidden" name="dropoff_time">
            <button type="submit" class="button" style="background-color: <?= $button_color ?>;">Bekijk nu</button>
        </form>

        <img src="Website/Assets/Images/Cars/<?= htmlspecialchars($car['brand']) ?>/<?= htmlspecialchars($car['name']) ?>.svg" alt="<?= htmlspecialchars($car['name']) ?>">
        <img src="Website/Assets/Images/Shapes/<?= $shape ?>-Background.svg" alt="" class="background-header-element">
    </div>
<?php endforeach; ?>