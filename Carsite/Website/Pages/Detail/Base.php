<?php

$doc_root = $_SERVER['DOCUMENT_ROOT'];
$project_root = $doc_root . '/Carsite';
$bases_url = $bases_url ?? '../../';

require $project_root . '/Website/Database/Connection.php';
require $project_root . '/Website/Assets/Includes/Header.php';

$id = $_GET['id'] ?? null;
$pickup_city = $_GET['pickup_city'] ?? null;
$dropoff_city = $_GET['dropoff_city'] ?? null;

$pickup_date = $_GET['pickup_date'] ?? null;
$dropoff_date = $_GET['dropoff_date'] ?? null;

$pickup_time = $_GET['pickup_time'] ?? null;
$dropoff_time = $_GET['dropoff_time'] ?? null;

if ($id) {
    $stmt = $Connection->prepare("SELECT * FROM cars WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $car = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Geen auto geselecteerd.";
    exit;
}
?>

<body>
    <main class="car-detail">
        <div class="detail-grid">
            <div class="advertorial">
                <div class="simple-image">
                    <h2>Sports car with the best design and acceleration</h2>
                    <p>Safety and comfort while driving a luxury and elegant sports car.</p>

                    <div class="car-image-container">
                        <img src="<?= $bases_url ?>Assets/Images/Cars/<?= $car['brand'] ?>/<?= $car['name'] ?>.svg"
                            alt="<?= htmlspecialchars($car['name']) ?>"
                            onerror="this.src='https://placehold.co/500x200?text=Sports+Car'">
                    </div>

                    <img src="<?= $bases_url ?>Assets/Images/Shapes/Circle-Background.svg" alt=""
                        class="background-header-element">
                </div>

                <div class="simple-gallery">
                    <div class="gallery-row">
                        <div class="gallery-img">
                            <img src="<?= $bases_url ?>Assets/Images/Cars/<?= $car['brand'] ?>/<?= $car['name'] ?>.svg"
                                alt="Interior view" onerror="this.src='https://placehold.co/200x150?text=Interior'">
                        </div>
                        <div class="gallery-img">
                            <img src="<?= $bases_url ?>Assets/Images/Cars/<?= $car['brand'] ?>/<?= $car['name'] ?>.svg"
                                alt="Exterior view" onerror="this.src='https://placehold.co/200x150?text=Exterior'">
                        </div>
                        <div class="gallery-img">
                            <img src="<?= $bases_url ?>Assets/Images/Cars/<?= $car['brand'] ?>/<?= $car['name'] ?>.svg"
                                alt="Dashboard view" onerror="this.src='https://placehold.co/200x150?text=Dashboard'">
                        </div>
                    </div>
                </div>
            </div>

            <div class="white-background">
                <h2><?= htmlspecialchars($car['brand']) ?> <?= htmlspecialchars($car['name']) ?></h2>

                <div class="rating-stars">
                    <div class="stars stars-1"></div>
                    <span class="review-count">0+ reviewers</span>
                </div>

                <p class="description-text">
                    <?= htmlspecialchars($car['description'] ?? 'NISMO has become the embodiment of Nissan\'s outstanding performance, inspired by the most unforgiving proving ground, the "race track".') ?>
                </p>

                <div class="car-type-section">
                    <div class="specs-grid">
                        <div class="spec-row">
                            <span class="spec-label">Type Car</span>
                            <span class="spec-value"><?= htmlspecialchars($car['type']) ?></span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-label">Capacity</span>
                            <span class="spec-value"><?= htmlspecialchars($car['personen']) ?> Persons</span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-label">Steering</span>
                            <span class="spec-value"><?= htmlspecialchars($car['schakel']) ?></span>
                        </div>
                        <div class="spec-row">
                            <span class="spec-label">Gasoline</span>
                            <span class="spec-value"><?= htmlspecialchars($car['fuel']) ?>L</span>
                        </div>
                    </div>

                    <div class="call-to-action">
                        <div class="price-wrapper">
                            <?php if (!empty($car['discount_price']) && $car['discount_price'] < $car['price']): ?>
                                <span class="price-original">€
                                    <?= number_format($car['price'], 2, ',', '.') ?>
                                </span>
                                <span class="discount-badge">Save
                                    <?= round((($car['price'] - $car['discount_price']) / $car['price']) * 100) ?>%
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="price-wrapper">
                            <?php if (!empty($car['discount_price']) && $car['discount_price'] < $car['price']): ?>
                                <span class="price-current">€ <?= number_format($car['discount_price'], 2, ',', '.') ?>
                                    <span>/
                                        day</span></span>
                                        <a href="booking.php?id=<?= $car['id'] ?>" class="button-primary">Rent Now</a>
                            <?php else: ?>
                                <span class="price-current">€ <?= number_format($car['price'], 2, ',', '.') ?> <span>/
                                        day</span></span>
                                <a href="booking.php?id=<?= $car['id'] ?>" class="button-primary">Rent Now</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../../Assets/Includes/Footer.php'; ?>
    <script type="module" src="/../../Assets/Includes/Main.js"></script>
</body>

</html>