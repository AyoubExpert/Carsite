const brandButtons = document.querySelectorAll('.brand-button');
const transmissionCheckboxes = document.querySelectorAll('input[name="transmission[]"]');
const priceInput = document.querySelector('input[name="price"]');
const personsInput = document.querySelector('input[name="personen"]');
const cars = document.querySelectorAll('.car-details');
const selectedContainer = document.getElementById('selected-brands');
const queryInput = document.querySelector('input[name="query"]');

const hasFilters =
    cars.length > 0 &&
    (brandButtons.length > 0 ||
        transmissionCheckboxes.length > 0 ||
        priceInput ||
        personsInput);

if (hasFilters) {
    let selectedBrands = [];
    const initialQuery = queryInput
        ? queryInput.value.toLowerCase().trim()
        : '';

    brandButtons.forEach(button => {
        button.addEventListener('click', () => {
            const brand = button.dataset.brand;

            button.classList.toggle('active');

            if (button.classList.contains('active')) {
                if (!selectedBrands.includes(brand)) {
                    selectedBrands.push(brand);
                }
            } else {
                selectedBrands = selectedBrands.filter(b => b !== brand);
            }

            renderSelectedBrands();
            applyFilters();
        });
    });

    function applyFilters() {
        const selectedTransmissions = Array.from(transmissionCheckboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        const maxPrice = priceInput ? parseFloat(priceInput.value) || Infinity : Infinity;
        const minPersons = personsInput ? parseInt(personsInput.value) || 0 : 0;
        const query = initialQuery;

        cars.forEach(car => {
            const carBrand = (car.dataset.brand || '').toLowerCase();
            const carModel = (car.dataset.model || '').toLowerCase();
            const carTransmission = car.dataset.transmission || '';
            const carPrice = parseFloat(car.dataset.price) || 0;
            const carPersons = parseInt(car.dataset.persons) || 0;
            console.log(carModel);
            let show = true;

            if (
                selectedBrands.length > 0 &&
                !selectedBrands.includes(car.dataset.brand)
            ) {
                show = false;
            }

            if (
                selectedTransmissions.length > 0 &&
                !selectedTransmissions.includes(carTransmission)
            ) {
                show = false;
            }

            if (carPrice > maxPrice) {
                show = false;
            }

            if (carPersons < minPersons) {
                show = false;
            }

            if (query) {
                const queryParts = query.split(/\s+/).filter(Boolean);

                const matchesQuery = queryParts.every(part =>
                    carBrand.includes(part) || carModel.includes(part)
                );

                if (!matchesQuery) {
                    show = false;
                }
            }

            car.style.display = show ? 'block' : 'none';
        });
    }

    transmissionCheckboxes.forEach(cb =>
        cb.addEventListener('change', applyFilters)
    );

    if (priceInput) priceInput.addEventListener('input', applyFilters);
    if (personsInput) personsInput.addEventListener('input', applyFilters);

    applyFilters();

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

                    const button = document.querySelector(
                        `.brand-button[data-brand="${brand}"]`
                    );
                    if (button) button.classList.remove('active');

                    renderSelectedBrands();
                    applyFilters();
                });
            }

            selectedContainer.appendChild(item);
        });
    }
}

document.querySelectorAll('.slider').forEach(sliderGroup => {
    const input = sliderGroup.querySelector('input');
    const output = sliderGroup.querySelector('.value');

    if (input && output) {
        input.addEventListener('input', () => {
            output.textContent = input.value;
        });
    }
});