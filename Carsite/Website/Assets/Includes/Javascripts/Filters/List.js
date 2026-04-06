const brandButtons = document.querySelectorAll('.brand-button') || [];
const transmissionCheckboxes = document.querySelectorAll('input[name="transmission[]"]') || [];
const priceInput = document.querySelector('input[name="price"]');
const personsInput = document.querySelector('input[name="personen"]');
const cars = document.querySelectorAll('.car-details') || [];
const selectedContainer = document.getElementById('selected-brands');

const hasFilters = cars.length > 0 && (brandButtons.length > 0 || transmissionCheckboxes.length > 0 || priceInput || personsInput);

if (hasFilters) {
    if (cars.length > 0) {
        let selectedBrands = [];

        // Brand button click
        brandButtons.forEach(button => {
            button.addEventListener('click', () => {
                const brand = button.dataset.brand;
                button.classList.toggle('active');
                if (button.classList.contains('active')) {
                    selectedBrands.push(brand);
                } else {
                    selectedBrands = selectedBrands.filter(b => b !== brand);
                }
                renderSelectedBrands();
                applyFilters();
            });
        });

        // Filter function
        function applyFilters() {
            const selectedTransmissions = Array.from(transmissionCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            const maxPrice = priceInput ? parseFloat(priceInput.value) : Infinity;
            const minPersons = personsInput ? parseInt(personsInput.value) : 0;

            cars.forEach(car => {
                if (!car.dataset) return;

                const carBrand = car.dataset.brand;
                const carTransmission = car.dataset.transmission;
                const carPrice = parseFloat(car.dataset.price);
                const carPersons = parseInt(car.dataset.persons);

                let show = true;

                if (selectedBrands.length > 0 && !selectedBrands.includes(carBrand)) show = false;
                if (selectedTransmissions.length > 0 && !selectedTransmissions.includes(carTransmission)) show = false;
                if (carPrice < maxPrice) show = false;
                if (carPersons < minPersons) show = false;

                car.style.display = show ? 'block' : 'none';
            });
        }

        // Attach listeners safely
        transmissionCheckboxes.forEach(cb => cb.addEventListener('change', applyFilters));
        if (priceInput) priceInput.addEventListener('input', applyFilters);
        if (personsInput) personsInput.addEventListener('input', applyFilters);

        applyFilters();

        // Render selected brands
        function renderSelectedBrands() {
            if (!selectedContainer) return;

            selectedContainer.innerHTML = '';
            if (selectedBrands.length === 0) {
                selectedContainer.innerHTML = '<p>Geen merken geselecteerd</p>';
                return;
            }

            selectedBrands.forEach(brand => {
                const item = document.createElement('span');
                item.classList.add('selected-item');
                item.innerHTML = `
                ${brand}
                <button type="button" data-brand="${brand}">✕</button>
            `;
                const btn = item.querySelector('button');
                if (btn) {
                    btn.addEventListener('click', () => {
                        selectedBrands = selectedBrands.filter(b => b !== brand);
                        document.querySelector(`.brand-button[data-brand="${brand}"]`)?.classList.remove('active');
                        renderSelectedBrands();
                        applyFilters();
                    });
                }
                selectedContainer.appendChild(item);
            });
        }
    }
}

document.querySelectorAll('.slider').forEach(sliderGroup => {
    const input = sliderGroup.querySelector('#Range');
    const output = sliderGroup.querySelector('#Value');
    if (input && output) {
        input.addEventListener('input', () => {
            output.textContent = input.value;
        });
    }
});