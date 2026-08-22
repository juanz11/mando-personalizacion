(function () {
    const paymentMethodLabels = {
        transferencia: 'Transferencia bancaria',
        'pago-movil': 'Pago Móvil',
        paypal: 'PayPal',
    };

    let orderBtn;
    let overlay;
    let modal;
    let closeBtn;
    let form;
    let formView;
    let successView;
    let quotePriceEl;
    let paymentMethodsWrap;
    let paymentMethodInput;
    let paymentFieldGroups;
    let successCloseBtn;

    function getTotalPriceText() {
        const totalPriceEl = document.getElementById('totalPrice');
        return totalPriceEl ? totalPriceEl.textContent.trim() : '$ 0,00';
    }

    function setActivePaymentMethod(method) {
        paymentMethodInput.value = method;

        paymentMethodsWrap.querySelectorAll('.payment-method-btn').forEach((btn) => {
            btn.classList.toggle('active', btn.dataset.method === method);
        });

        paymentFieldGroups.forEach((group) => {
            const isMatch = group.dataset.fieldsFor === method;
            group.hidden = !isMatch;

            group.querySelectorAll('input').forEach((input) => {
                input.required = isMatch;
                if (!isMatch) {
                    input.value = '';
                }
            });
        });
    }

    function openModal() {
        quotePriceEl.textContent = getTotalPriceText();
        overlay.classList.add('active');
        document.body.classList.add('modal-open');

        successView.hidden = true;
        formView.hidden = false;

        const firstInput = form.querySelector('#orderName');
        if (firstInput) {
            window.setTimeout(() => firstInput.focus(), 50);
        }
    }

    function closeModal() {
        overlay.classList.remove('active');
        document.body.classList.remove('modal-open');
    }

    function resetForm() {
        form.reset();
        setActivePaymentMethod('transferencia');
    }

    function getConfigurationSummary() {
        const summary = [];
        const activeThumbs = document.querySelectorAll('.thumb.active, .color-option.active, .tab-btn.active');
        activeThumbs.forEach((el) => {
            const name = el.dataset.name || el.dataset.color || el.dataset.tab || el.textContent.trim();
            if (name) summary.push(name);
        });
        return summary.join(', ');
    }

    async function handleSubmit(event) {
        event.preventDefault();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const token = document.querySelector('meta[name="csrf-token"]')?.content;
        const model = document.body.dataset.model || 'ps5';
        const priceText = getTotalPriceText().replace(/[^\d,]/g, '').replace(',', '.');
        const price = parseFloat(priceText) || 0;

        const payload = new FormData(form);
        payload.append('_token', token);
        payload.append('model', model);
        payload.append('price', price);
        payload.append('product_name', `Mando personalizado ${model.toUpperCase()}`);
        payload.append('configuration', getConfigurationSummary());

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
                alert('No se pudo continuar con la compra. Asegurate de estar registrado.');
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
        successView = document.getElementById('orderSuccess');
        quotePriceEl = document.getElementById('modalQuotePrice');
        paymentMethodsWrap = document.getElementById('paymentMethods');
        paymentMethodInput = document.getElementById('orderPaymentMethod');
        paymentFieldGroups = document.querySelectorAll('.payment-fields');
        successCloseBtn = document.getElementById('orderSuccessClose');

        if (!orderBtn || !overlay || !modal) {
            return;
        }

        orderBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        successCloseBtn.addEventListener('click', () => {
            closeModal();
            resetForm();
        });

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

        paymentMethodsWrap.addEventListener('click', (event) => {
            const btn = event.target.closest('.payment-method-btn');
            if (!btn) return;
            setActivePaymentMethod(btn.dataset.method);
        });

        form.addEventListener('submit', handleSubmit);

        setActivePaymentMethod('transferencia');
    }

    document.addEventListener('DOMContentLoaded', init);
})();
