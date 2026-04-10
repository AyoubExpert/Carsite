<?php
$stmt = $Connection->prepare("SELECT DISTINCT brand FROM cars");
$stmt->execute();
$cars = $stmt->fetchAll(PDO::FETCH_COLUMN);
?>

<form method="GET" action="">
    <div class="filter-menu">
        <div class="filter-dropdown">

            <div class="filter-group">
                <h4>Geselecteerde merken</h4>
                <div id="selected-brands"></div>
            </div>

            <div class="filter-group">
                <h4>Merk</h4>
                <?php foreach ($cars as $car):
                    $logoPath = "Website/Assets/Images/Logos/" . strtolower($car) . ".svg";
                    ?>
                    <button type="button" class="brand-button" data-brand="<?= htmlspecialchars($car) ?>">
                        <img src="<?= $logoPath ?>" alt="<?= htmlspecialchars($car) ?>"
                            title="<?= htmlspecialchars($car) ?>">
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="filter-group">
                <h4>Schakel</h4>
                <label><input type="checkbox" name="transmission[]" value="Manual"> Manual</label>
                <label><input type="checkbox" name="transmission[]" value="Automatic"> Automatic</label>
            </div>

            <div class="filter-group">
                <h4>Prijs per dag</h4>
                <div class="slider">
                    <input type="range" min="0" max="100000" value="0" step="100" id="Range" name="price">
                    <span>€<span id="Value">0</span>+</span>
                </div>
                <h4>Personen</h4>
                <div class="slider">
                    <input type="range" min="2" max="5" value="2" id="Range" name="personen">
                    <span><span id="Value">2</span> Personen+</span>
                </div>
            </div>

        </div>
    </div>
</form>