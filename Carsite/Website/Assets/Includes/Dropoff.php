<?php
function Cities()
{
    $json = file_get_contents("Website/Assets/Jsons/Cities.json");
    $cities = json_decode($json, true);

    usort($cities, function ($a, $b) {
        return strcmp($a['name'], $b['name']);
    });

    foreach ($cities as $city) {
        $name = htmlspecialchars($city['name']);
        $province = htmlspecialchars($city['province']);

        echo "<option value='{$name}'>{$name} ({$province})</option>";
    }
}

function Fields($var)
{
    $time = date('H:i');

    echo '
    <div class="fields">
        <div class="field">
            <span class="title">Locations</span>
            <select id="' . $var . '_city" class="input"> <!-- ✅ unique ID -->
                <option disabled selected>Select your city</option>';
    Cities();
    echo '      </select>
        </div>

        <div class="field">
            <span class="title">Date</span>
            <input id="' . $var . '_date" type="date" class="input">
        </div>

        <div class="field">
            <span class="title">Time</span>
            <input id="' . $var . '_time" type="time" class="input" value="' . $time . '">
        </div>
    </div>
    ';
}
?>

<div class="pickup-dropoff">
    <div class="box pickup active">
        <label class="label">
            <input type="radio" name="trip_type" checked>
            Pick-Up
        </label>

        <?php Fields("pickup"); ?>
    </div>

    <button type="button" class="swap">⇅</button>

    <div class="box dropoff">
        <label class="label">
            <input type="radio" name="trip_type">
            Drop-Off
        </label>

        <?php Fields("dropoff"); ?>
    </div>
</div>