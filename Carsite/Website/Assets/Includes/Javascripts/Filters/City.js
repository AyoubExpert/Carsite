function setCity(form) {
    const fields = ['pickup_city', 'dropoff_city', 'pickup_date', 'dropoff_date', 'pickup_time', 'dropoff_time'];
    fields.forEach(id => {
        const el = document.getElementById(id);
        if (el && form[id] !== undefined) form[id].value = el.value;
    });
}