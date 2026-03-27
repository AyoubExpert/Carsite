<?php
$stmt = $Connection->prepare("SELECT * FROM cars LIMIT 4");
$stmt->execute();
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($cars as $row):
    ?>
    <div class="car-details">
        <div class="car-brand">
            <h3>
                <?= $row['name'] ?>
            </h3>
            <div class="car-type">Auto</div>
        </div>

        <img src="Website/Assets/Images/Cars/<?= $row['name'] ?>.svg" alt="">

        <div class="car-specification">
            <span>Prijs</span>
        </div>

        <div class="rent-details">
            <span><span class="font-weight-bold">€
                    <?= $row['price'] ?>
                </span> / dag</span>
            <a href="/car-detail?id=<?= $row['id'] ?>" class="button-primary">Bekijk nu</a>
        </div>
    </div>
<?php endforeach; ?>