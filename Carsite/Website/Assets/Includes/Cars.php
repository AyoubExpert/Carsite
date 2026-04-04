<?php

$limit = $limit ?? 10;
$stmt = $Connection->prepare("SELECT * FROM cars LIMIT :limit");
$stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
$stmt->execute();
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="cars">
    <?php foreach ($cars as $row): ?>
        <div class="car-details" data-brand="<?= htmlspecialchars($row['brand']) ?>"
            data-transmission="<?= htmlspecialchars($row['schakel']) ?>" data-price="<?= $row['price'] ?>"
            data-persons="<?= $row['personen'] ?>">

            <div class="car-brand">
                <h3><?= htmlspecialchars($row['brand'] . ' ' . $row['name']) ?></h3>
                <div class="brand"><?= $row['type'] ?></div>
            </div>

            <img src="Website/Assets/Images/Cars/<?= $row['brand'] ?>/<?= $row['name'] ?>.svg"
                alt="<?= htmlspecialchars($row['name']) ?>">

            <div class="car-specification">
                <span>
                    <img class="Icon" src="Website/Assets/Images/Icons/Gas-Station.svg" alt="Fuel Type">
                    <?= htmlspecialchars(($row['fuel'] ?? '') . ' L') ?>
                </span>
                <span>
                    <img class="Icon" src="Website/Assets/Images/Icons/Car.svg" alt="Transmission">
                    <?= htmlspecialchars($row['schakel']) ?>
                </span>
                <span>
                    <img class="Icon" src="Website/Assets/Images/Icons/<?= $row['personen'] ?> Persons.svg"
                        alt="<?= $row['personen'] ?> personen">
                    <?= htmlspecialchars($row['personen'] . ' People') ?>
                </span>
            </div>

            <div class="rent-details">
                <div class="price-block">
                    <?php if (!empty($row['discount_price']) && $row['discount_price'] < $row['price']): ?>

                        <span class="price" style="text-decoration: line-through">
                            €<?= number_format($row['price'], 2, ',', '.') ?>
                        </span>

                        <span class="discount">
                            €<?= number_format($row['discount_price'], 2, ',', '.') ?> / <span>day</span>
                        </span>

                    <?php else: ?>

                        <span class="price">
                            €<?= number_format($row['price'], 2, ',', '.') ?> / <span>day</span>
                        </span>

                    <?php endif; ?>
                </div>
                <form method="GET" action="<?= $bases_url ?>../Index.php" onsubmit="setCity(this)">
                    <input type="hidden" name="page" value="Detail">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="pickup_city">
                    <input type="hidden" name="dropoff_city">
                    <input type="hidden" name="pickup_date">
                    <input type="hidden" name="dropoff_date">
                    <input type="hidden" name="pickup_time">
                    <input type="hidden" name="dropoff_time">
                    <button type="submit" class="button-primary">Bekijk nu</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>