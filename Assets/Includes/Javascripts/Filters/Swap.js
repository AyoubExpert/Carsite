document.addEventListener("DOMContentLoaded", function () {
    const swapBtn = document.querySelector(".swap");

    swapBtn.addEventListener("click", function () {
        const pickupCity = document.getElementById("pickup_city");
        const pickupDate = document.getElementById("pickup_date");
        const pickupTime = document.getElementById("pickup_time");

        const dropoffCity = document.getElementById("dropoff_city");
        const dropoffDate = document.getElementById("dropoff_date");
        const dropoffTime = document.getElementById("dropoff_time");

        [pickupCity.value, dropoffCity.value] = [dropoffCity.value, pickupCity.value];
        [pickupDate.value, dropoffDate.value] = [dropoffDate.value, pickupDate.value];
        [pickupTime.value, dropoffTime.value] = [dropoffTime.value, pickupTime.value];
    });
});