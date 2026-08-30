(function () {
    let orderBtn;
    let overlay;
    let modal;
    let closeBtn;
    let form;
    let formView;
    let quotePriceEl;

    function getTotalPriceText() {
        const totalPriceEl = document.getElementById('totalPrice');
        return totalPriceEl ? totalPriceEl.textContent.trim() : '$ 0,00';
    }

    function parsePrice(text) {
        const cleaned = text.replace(/[^\d,.-]/g, '');
        const dotParts = cleaned.split('.');
        const commaParts = cleaned.split(',');
        if (dotParts.length > 1 && commaParts.length > 1) {
            return parseFloat(cleaned.replace(/\./g, '').replace(',', '.')) || 0;
        }
        return parseFloat(cleaned.replace(',', '.')) || 0;
    }

    function openModal() {
        quotePriceEl.textContent = getTotalPriceText();
        overlay.classList.add('active');
        document.body.classList.add('modal-open');

        formView.hidden = false;
    }

    function closeModal() {
        overlay.classList.remove('active');
        document.body.classList.remove('modal-open');
    }

    function resetForm() {
        if (form) form.reset();
    }

    function getConfigurationSummary() {
        const summary = [];
        if (typeof controllerParts === 'undefined' || typeof selectedColors === 'undefined') {
            const activeThumbs = document.querySelectorAll('.thumb.active, .color-option.active, .tab-btn.active');
            activeThumbs.forEach((el) => {
                const name = el.dataset.name || el.dataset.color || el.dataset.tab || el.textContent.trim();
                if (name) summary.push(name);
            });
            return summary.join(', ');
        }

        Object.keys(controllerParts).forEach(part => {
            const color = selectedColors[part];
            if (color && color.color !== 'default') {
                summary.push(`${controllerParts[part].title}: ${color.name}`);
            }
        });
        return summary.join(', ');
    }

    function buildImageUrls(isBackView) {
        const model = document.body.dataset.model || 'ps5';
        const urls = [`https://customizer.diemgaming.com.ar/${model}/base${isBackView ? '_back' : ''}.png`];

        if (typeof controllerParts === 'undefined' || typeof selectedColors === 'undefined' || typeof getImageUrl !== 'function') {
            return urls;
        }

        Object.keys(controllerParts).forEach(part => {
            const partConfig = controllerParts[part];
            const color = selectedColors[part];
            if (!color || color.color === 'default') return;

            const isPartBack = partConfig.side === 'back';
            if ((isBackView && isPartBack) || (!isBackView && !isPartBack)) {
                const layers = partConfig.layers || [{ layerId: partConfig.layerId }];
                layers.forEach(layer => {
                    urls.push(getImageUrl(partConfig, color, layer));
                });
            }
        });

        return urls;
    }

    function getConfigurationData() {
        const model = document.body.dataset.model || 'ps5';
        return {
            model: model,
            summary: getConfigurationSummary(),
            front: buildImageUrls(false),
            back: buildImageUrls(true),
        };
    }

    async function handleSubmit(event) {
        event.preventDefault();

        const token = document.querySelector('meta[name="csrf-token"]')?.content;
        const model = document.body.dataset.model || 'ps5';
        const price = parsePrice(getTotalPriceText());

        const payload = new FormData();
        payload.append('_token', token);
        payload.append('model', model);
        payload.append('price', price);
        payload.append('product_name', `Mando personalizado ${model.toUpperCase()}`);
        payload.append('configuration', JSON.stringify(getConfigurationData()));

        const submitBtn = form.querySelector('.btn-submit-order');
        if (submitBtn) submitBtn.disabled = true;

        try {
            const response = await fetch('/cart/add', {
                method: 'POST',
                body: payload,
            });

            if (response.redirected) {
                window.location.href = response.url;
                return;
            }

            if (response.ok) {
                window.location.href = '/checkout';
            } else {
                const text = await response.text();
                alert('No se pudo continuar con la compra.');
                console.error(text);
            }
        } catch (err) {
            console.error(err);
            alert('Error de conexión. Intentá de nuevo.');
        } finally {
            if (submitBtn) submitBtn.disabled = false;
        }
    }

    function init() {
        orderBtn = document.getElementById('orderBtn');
        overlay = document.getElementById('orderModalOverlay');
        modal = document.getElementById('orderModal');
        closeBtn = document.getElementById('orderModalClose');
        form = document.getElementById('orderForm');
        formView = document.getElementById('orderModalForm');
        quotePriceEl = document.getElementById('modalQuotePrice');

        if (!orderBtn || !overlay || !modal) {
            return;
        }

        orderBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);

        overlay.addEventListener('click', (event) => {
            if (event.target === overlay) {
                closeModal();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && overlay.classList.contains('active')) {
                closeModal();
            }
        });

        form.addEventListener('submit', handleSubmit);
    }

    document.addEventListener('DOMContentLoaded', init);
})();
