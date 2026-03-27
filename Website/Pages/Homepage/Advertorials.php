<?php
$stmt = $Connection->prepare("SELECT * FROM cars ORDER BY RAND() LIMIT 2");
$stmt->execute();
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($cars as $car):
    ?>
    <div class="advertorial">
        <h2><?= $car['name'] ?></h2>
        <p>Huur deze auto voor slechts €<?= $car['price'] ?> / dag</p>
        <a href="/car-detail?id=<?= $car['id'] ?>" class="button-primary">Bekijk nu</a>
        <img src="Website/Assets/Images/Cars/<?= $car['name'] ?>.svg" alt="<?= $car['name'] ?>">
        <img src="Website/Assets/Images/header-circle-background.svg" alt="" class="background-header-element">
    </div>
<?php endforeach; ?>