const controllerModels = {
    ps5: {
        basePrice: 298000,
        parts: {
            frontShell: {
                title: "Front Shell Panel",
                layerId: "frontShellLayer",
                basePath: "https://customizer.diemgaming.com.ar/ps5/front-shell-panel",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Negro", color: "negro", price: 14990, type: "mate" },
                    { name: "Azul Mar Claro", color: "azul-mar-claro", price: 14990, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 14990, type: "mate" },
                    { name: "Naranja Fluor", color: "naranja-fluor", price: 14990, type: "mate" },
                    { name: "Gris", color: "gris", price: 14990, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 14990, type: "mate" }
                ]
            },
            trim: {
                title: "Trim",
                layerId: "trimLayer",
                basePath: "https://customizer.diemgaming.com.ar/ps5/trim",
                colors: [
                    { name: "Negro", color: "default", price: 0, type: "mate" },
                    { name: "Azul Mar Claro", color: "azul-mar-claro", price: 6990, type: "mate" },
                    { name: "Verde Manzana", color: "verde-manzana", price: 6990, type: "mate" },
                    { name: "Gris", color: "gris", price: 6990, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 6990, type: "mate" },
                    { name: "Naranja Fluor", color: "naranja-fluor", price: 6990, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 6990, type: "mate" }
                ]
            },
            actionButtons: {
                title: "Action Buttons",
                layerId: "actionButtonsLayer",
                basePath: "https://customizer.diemgaming.com.ar/ps5/action-buttons",
                colors: [
                    { name: "Negro", color: "default", price: 0, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 5000, type: "mate" },
                    { name: "Azul", color: "azul", price: 5000, type: "mate" },
                    { name: "Verde", color: "verde", price: 5000, type: "mate" },
                    { name: "Rosa", color: "rosa", price: 5000, type: "mate" },
                    { name: "Amarillo", color: "amarillo", price: 5000, type: "mate" }
                ]
            },
            dpad: {
                title: "D-pad",
                layerId: "dpadLayer",
                basePath: "https://customizer.diemgaming.com.ar/ps5/d-pad",
                colors: [
                    { name: "Negro", color: "default", price: 0, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 5000, type: "mate" },
                    { name: "Azul", color: "azul", price: 5000, type: "mate" },
                    { name: "Verde", color: "verde", price: 5000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 5000, type: "mate" }
                ]
            },
            touchpad: {
                title: "Touchpad",
                layerId: "touchpadLayer",
                basePath: "https://customizer.diemgaming.com.ar/ps5/touchpad",
                colors: [
                    { name: "Negro", color: "default", price: 0, type: "mate" },
                    { name: "Gris", color: "gris", price: 6990, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 6990, type: "mate" },
                    { name: "Azul", color: "azul", price: 6990, type: "mate" }
                ]
            },
            sticks: {
                title: "Sticks",
                basePath: "https://customizer.diemgaming.com.ar/ps5/sticks",
                previewImage: "front.png",
                layers: [
                    { layerId: "sticksGenericLeftTop", variant: "generic-left", piece: "top" },
                    { layerId: "sticksGenericLeftBase", variant: "generic-left", piece: "base" },
                    { layerId: "sticksGenericRightTop", variant: "generic-right", piece: "top" },
                    { layerId: "sticksGenericRightBase", variant: "generic-right", piece: "base" }
                ],
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Azul Mar Claro", color: "azul-mar-claro", price: 5000, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 5000, type: "mate" },
                    { name: "Naranja Fluor", color: "naranja-fluor", price: 5000, type: "mate" },
                    { name: "Rosa", color: "rosa", price: 5000, type: "mate" },
                    { name: "Violeta", color: "violeta", price: 5000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 5000, type: "mate" },
                    { name: "Amarillo", color: "amarillo", price: 5000, type: "mate" }
                ]
            },
            rings: {
                title: "Rings",
                layerId: "ringsLayer",
                basePath: "https://customizer.diemgaming.com.ar/ps5/rings",
                colors: [
                    { name: "Negro", color: "default", price: 0, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 5000, type: "mate" },
                    { name: "Azul", color: "azul", price: 5000, type: "mate" },
                    { name: "Cromo", color: "cromo", price: 10000, type: "mate" }
                ]
            },
            logo: {
                title: "Logo",
                layerId: "logoLayer",
                basePath: "https://customizer.diemgaming.com.ar/ps5/logo",
                colors: [
                    { name: "Negro", color: "default", price: 0, type: "mate" },
                    { name: "Cromo", color: "cromo", price: 5000, type: "mate" },
                    { name: "Dorado", color: "dorado", price: 5000, type: "mate" }
                ]
            },
            backPanel: {
                title: "Back Shell",
                layerId: "backPanelLayer",
                side: "back",
                basePath: "https://customizer.diemgaming.com.ar/ps5/back-shell",
                previewImage: "back.png",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Negro", color: "negro", price: 14990, type: "mate" }
                ]
            }
        }
    },
    xbox: {
        basePrice: 260000,
        parts: {
            frontShellPanel: {
                title: "Front Shell Panel",
                layerId: "frontShellPanelLayer",
                basePath: "https://customizer.diemgaming.com.ar/xbox/front-shell-panel",
                previewImage: "front.png",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "texturas", typeLabel: "Textura" },
                    { name: "Joker", color: "joker", price: 31970, type: "texturas", typeLabel: "Textura" },
                    { name: "Bicolor", color: "bicolor", price: 31970, type: "texturas", typeLabel: "Textura" },
                    { name: "Golden", color: "golden", price: 31970, type: "texturas", typeLabel: "Textura" },
                    { name: "Palmeras", color: "palmeras", price: 31970, type: "texturas", typeLabel: "Textura" },
                    { name: "Rosas", color: "rosas", price: 31970, type: "texturas", typeLabel: "Textura" },
                    { name: "Transparente", color: "transparente", price: 31970, type: "texturas", typeLabel: "Textura" },
                    { name: "Gris", color: "gris", price: 14990, type: "mate", typeLabel: "Mate" },
                    { name: "Naranja", color: "naranja", price: 14990, type: "mate", typeLabel: "Mate" },
                    { name: "Rojo", color: "rojo", price: 14990, type: "mate", typeLabel: "Mate" },
                    { name: "Blanco", color: "blanco", price: 14990, type: "mate", typeLabel: "Mate" }
                ]
            },
            actionButtons: {
                title: "Actions Buttons",
                layerId: "actionButtonsLayer",
                basePath: "https://customizer.diemgaming.com.ar/xbox/action-buttons",
                previewImage: "front.png",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 5000, type: "mate" },
                    { name: "Azul", color: "azul", price: 5000, type: "mate" },
                    { name: "Verde", color: "verde", price: 5000, type: "mate" },
                    { name: "Rosa", color: "rosa", price: 5000, type: "mate" },
                    { name: "Amarillo", color: "amarillo", price: 5000, type: "mate" }
                ]
            },
            shareOptions: {
                title: "Hub Central",
                layerId: "shareOptionsLayer",
                basePath: "https://customizer.diemgaming.com.ar/xbox/share-options",
                previewImage: "front.png",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Negro", color: "negro", price: 8000, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 8000, type: "mate" },
                    { name: "Azul", color: "azul", price: 8000, type: "mate" },
                    { name: "Gris", color: "gris", price: 8000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 8000, type: "mate" }
                ]
            },
            dpad: {
                title: "D-Pad",
                layerId: "dPadLayer",
                basePath: "https://customizer.diemgaming.com.ar/xbox/d-pad",
                previewImage: "front.png",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 5000, type: "mate" },
                    { name: "Azul", color: "azul", price: 5000, type: "mate" },
                    { name: "Verde", color: "verde", price: 5000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 5000, type: "mate" }
                ]
            },
            bumpers: {
                title: "Bumpers + Triggers",
                layerId: "bumpersLayer",
                basePath: "https://customizer.diemgaming.com.ar/xbox/bumpers",
                previewImage: "front.png",
                variant: "front",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Negro", color: "negro", price: 8000, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 8000, type: "mate" },
                    { name: "Azul", color: "azul", price: 8000, type: "mate" },
                    { name: "Verde", color: "verde", price: 8000, type: "mate" },
                    { name: "Naranja", color: "naranja", price: 8000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 8000, type: "mate" }
                ]
            },
            sticks: {
                title: "Sticks",
                layerId: "sticksLayer",
                basePath: "https://customizer.diemgaming.com.ar/xbox/sticks",
                previewImage: "front.png",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Negro", color: "negro", price: 8000, type: "mate" },
                    { name: "Azul Mar Claro", color: "azul-mar-claro", price: 8000, type: "mate" },
                    { name: "Azul", color: "azul", price: 8000, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 8000, type: "mate" },
                    { name: "Naranja Fluor", color: "naranja-fluor", price: 8000, type: "mate" },
                    { name: "Rosa", color: "rosa", price: 8000, type: "mate" },
                    { name: "Violeta", color: "violeta", price: 8000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 8000, type: "mate" },
                    { name: "Amarillo", color: "amarillo", price: 8000, type: "mate" }
                ]
            },
            backShell: {
                title: "Back Shell",
                layerId: "backShellLayer",
                side: "back",
                basePath: "https://customizer.diemgaming.com.ar/xbox/back-shell",
                previewImage: "back.png",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "texturas", typeLabel: "Grip Antideslizante" },
                    { name: "Azul", color: "azul", price: 19990, type: "texturas", typeLabel: "Grip Antideslizante" },
                    { name: "Rojo", color: "rojo", price: 19990, type: "texturas", typeLabel: "Grip Antideslizante" },
                    { name: "Verde", color: "verde", price: 19990, type: "texturas", typeLabel: "Grip Antideslizante" },
                    { name: "Negro", color: "negro", price: 19990, type: "texturas", typeLabel: "Grip Antideslizante" },
                    { name: "Blanco", color: "blanco", price: 19990, type: "texturas", typeLabel: "Grip Antideslizante" }
                ]
            },
            digitalTriggers: {
                title: "Digital Triggers",
                layerId: "digitalTriggersLayer",
                side: "back",
                basePath: "https://customizer.diemgaming.com.ar/xbox/digital-triggers",
                previewImage: "triggers_xbox.png",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Negro", color: "negro", price: 5000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 5000, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 5000, type: "mate" }
                ]
            },
            halfEffect: {
                title: "Análogos Magnéticos TMR",
                layerId: "halfEffectLayer",
                side: "back",
                basePath: "https://customizer.diemgaming.com.ar/xbox/half-effect",
                previewImage: "front.jpg",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Negro", color: "negro", price: 5000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 5000, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 5000, type: "mate" }
                ]
            },
            backButtons: {
                title: "Back Buttons",
                layerId: "backButtonsLayer",
                side: "back",
                basePath: "https://customizer.diemgaming.com.ar/xbox/back-buttons",
                previewImage: "back.png",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "mate" },
                    { name: "Negro", color: "negro", price: 5000, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 5000, type: "mate" },
                    { name: "Azul", color: "azul", price: 5000, type: "mate" }
                ]
            }
        }
    }
};

const colorSwatches = {
    'default': '#f5f7fa',
    'negro': '#111111',
    'rojo': '#d32f2f',
    'azul': '#1976d2',
    'azul-mar-claro': '#4fc3f7',
    'verde': '#388e3c',
    'verde-manzana': '#7cb342',
    'blanco': '#f5f7fa',
    'gris': '#9e9e9e',
    'naranja-fluor': '#ff9800',
    'naranja': '#ff9800',
    'rosa': '#e91e63',
    'rosas': '#e91e63',
    'amarillo': '#ffeb3b',
    'violeta': '#7b1fa2',
    'cromo': '#c0c0c0',
    'dorado': '#ffd700',
    'oro': '#ffd700',
    'gold': '#ffd700',
    'golden': '#ffd700',
    'silver': '#c0c0c0',
    'plata': '#c0c0c0',
    'carbon': '#333333',
    'transparente': 'rgba(255,255,255,0.3)',
    'bicolor': 'linear-gradient(90deg, #d32f2f 0%, #1976d2 100%)',
    'palmeras': 'linear-gradient(45deg, #388e3c 0%, #ff9800 100%)',
    'joker': 'linear-gradient(135deg, #7b1fa2 0%, #22d3ee 100%)'
};

function getSwatchColor(color) {
    const nameKey = color.name.toLowerCase().replace(/\s+/g, '-');
    return colorSwatches[nameKey] || colorSwatches[color.color] || 'linear-gradient(135deg, #555 0%, #777 100%)';
}

const orderTypes = { new: 79990, mailIn: 55000 };
let selectedOrderType = 'new';
let currentModel = 'ps5';
let currentPart = 'frontShell';
let selectedColors = {};
let totalPrice = 79990;
let tabButtons = [];
let isBack = false;
let baseImage = null;
let controllerParts = controllerModels.ps5.parts;

const tabTitle = document.getElementById('tabTitle');
const colorOptions = document.getElementById('colorOptions');
const totalPriceElement = document.getElementById('totalPrice');
const menuToggle = document.getElementById('menuToggle');
const nav = document.querySelector('.nav');
const tabsNav = document.getElementById('tabsNav');
const controllerLayers = document.getElementById('controllerLayers');

function init() {
    currentModel = document.body.dataset.model || 'ps5';
    if (!controllerModels[currentModel]) currentModel = 'ps5';

    controllerParts = controllerModels[currentModel].parts;
    baseImage = document.getElementById('baseImage');
    totalPrice = orderTypes[selectedOrderType];

    if (currentModel === 'xbox') {
        generateXboxUI();
    }

    Object.keys(controllerParts).forEach(part => {
        selectedColors[part] = controllerParts[part].colors[0];
    });

    setupTabs();
    setupRotate();
    setupMobileMenu();
    setupOrderType();

    currentPart = Object.keys(controllerParts)[0];
    if (tabTitle) tabTitle.textContent = controllerParts[currentPart].title;
    renderColorOptions(currentPart);
    updateController();
    updatePrice();
}

function generateXboxUI() {
    if (!tabsNav || !controllerLayers) return;

    tabsNav.innerHTML = '';
    controllerLayers.querySelectorAll('.color-layer').forEach(img => img.remove());

    const parts = Object.keys(controllerParts);
    parts.forEach((part, index) => {
        const partConfig = controllerParts[part];
        const btn = document.createElement('button');
        btn.className = `tab-btn ${index === 0 ? 'active' : ''}`;
        btn.dataset.tab = part;
        btn.innerHTML = `<img src="${partConfig.basePath}/${partConfig.previewImage || 'front.png'}" alt="${partConfig.title}" onerror="this.style.display='none'">`;
        tabsNav.appendChild(btn);
    });

    parts.forEach(part => {
        const partConfig = controllerParts[part];
        const img = document.createElement('img');
        img.id = partConfig.layerId;
        img.src = '';
        img.alt = partConfig.title;
        img.className = 'controller-layer color-layer';
        img.style.display = 'none';
        img.onerror = function () { this.style.display = 'none'; this.src = ''; };
        controllerLayers.appendChild(img);
    });
}

function setupTabs() {
    tabButtons = document.querySelectorAll('.tab-btn');
    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const tab = btn.dataset.tab;
            switchTab(tab);
        });
    });
}

function switchTab(part) {
    currentPart = part;

    tabButtons.forEach(btn => {
        btn.classList.remove('active');
        if (btn.dataset.tab === part) btn.classList.add('active');
    });

    if (tabTitle) tabTitle.textContent = controllerParts[part].title;
    renderColorOptions(part);
}

function renderColorOptions(part) {
    const partConfig = controllerParts[part];
    const types = [...new Set(partConfig.colors.map(c => c.type))];
    let html = '';

    types.forEach(type => {
        const colors = partConfig.colors.filter(c => c.type === type);
        const label = colors[0].typeLabel || (type.charAt(0).toUpperCase() + type.slice(1));

        html += `
            <div class="color-group">
                <label class="group-label">${label}</label>
                <div class="color-grid">
                    ${colors.map(color => createColorButton(color, part, partConfig)).join('')}
                </div>
            </div>
        `;
    });

    colorOptions.innerHTML = html;

    const colorButtons = colorOptions.querySelectorAll('.color-btn');
    colorButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const colorName = btn.dataset.color;
            const price = parseInt(btn.dataset.price);
            const partName = btn.dataset.part;

            selectColor(partName, colorName, price);

            colorButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });

    const currentColor = selectedColors[part];
    colorButtons.forEach(btn => {
        if (btn.dataset.color === currentColor.color) {
            btn.classList.add('active');
        }
    });
}

function createColorButton(color, part, partConfig) {
    const isSelected = selectedColors[part].color === color.color;
    const activeClass = isSelected ? 'active' : '';

    return `
        <button class="color-btn ${activeClass}"
                data-color="${color.color}"
                data-price="${color.price}"
                data-part="${part}">
            <span class="color-preview">
                <span class="color-dot" style="background: ${getSwatchColor(color)}"></span>
            </span>
            <span class="color-name">${color.name}</span>
        </button>
    `;
}

function getImageUrl(partConfig, color, layer) {
    if (color.color === 'default') {
        return `${partConfig.basePath}/${partConfig.previewImage || 'front.png'}`;
    }
    const variant = (layer && layer.variant ? layer.variant : partConfig.variant) || '';
    const piece = layer && layer.piece ? '-' + layer.piece : '';
    if (variant) {
        return `${partConfig.basePath}/${color.type}/${variant}/${color.color}/${color.color}${piece}.png`;
    }
    return `${partConfig.basePath}/${color.type}/${color.color}.png`;
}

function selectColor(part, color, price) {
    const partConfig = controllerParts[part];
    const colorObj = partConfig.colors.find(c => c.color === color);

    if (colorObj) {
        selectedColors[part] = colorObj;
        updateController();
        updatePrice();
    }
}

function updateController() {
    Object.keys(selectedColors).forEach(part => {
        const colorObj = selectedColors[part];
        const partConfig = controllerParts[part];
        if (!partConfig) return;

        const layers = partConfig.layers || [{ layerId: partConfig.layerId }];

        layers.forEach(layer => {
            const el = document.getElementById(layer.layerId);
            if (!el) return;

            if (partConfig.side === 'back' && !isBack) {
                el.style.display = 'none';
                el.classList.remove('active');
                return;
            }
            if (partConfig.side !== 'back' && isBack) {
                el.style.display = 'none';
                el.classList.remove('active');
                return;
            }

            const imageUrl = getImageUrl(partConfig, colorObj, layer);
            el.src = imageUrl;

            if (colorObj.color !== 'default' || colorObj.price > 0) {
                el.style.display = 'block';
                el.classList.add('active');
            } else {
                el.style.display = 'none';
                el.classList.remove('active');
            }
        });
    });
}

function updatePrice() {
    let additionalPrice = 0;

    Object.keys(selectedColors).forEach(part => {
        additionalPrice += selectedColors[part].price;
    });

    totalPrice = orderTypes[selectedOrderType] + additionalPrice;
    totalPriceElement.textContent = `$ ${(totalPrice / 1000).toFixed(2)}`;
}

function setupOrderType() {
    const orderTypeButtons = document.querySelectorAll('.order-type-btn');
    const mailInNote = document.getElementById('mailInNote');

    function updateOrderTypeState(orderType) {
        orderTypeButtons.forEach(b => b.classList.remove('active'));
        const selected = document.querySelector(`.order-type-btn[data-order-type="${orderType}"]`);
        if (selected) selected.classList.add('active');
        if (mailInNote) {
            mailInNote.style.display = orderType === 'mailIn' ? 'block' : 'none';
        }
    }

    orderTypeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            selectedOrderType = btn.dataset.orderType;
            updateOrderTypeState(selectedOrderType);
            updatePrice();
        });
    });

    updateOrderTypeState(selectedOrderType);
}

function setupRotate() {
    const rotateBtn = document.getElementById('rotateBtn');
    if (!rotateBtn) return;
    rotateBtn.addEventListener('click', toggleFlip);
}

function toggleFlip() {
    isBack = !isBack;
    if (baseImage) {
        baseImage.src = `https://customizer.diemgaming.com.ar/${currentModel}/base${isBack ? '_back' : ''}.png`;
    }
    updateController();
    const targetPart = isBack
        ? Object.keys(controllerParts).find(p => controllerParts[p].side === 'back')
        : Object.keys(controllerParts)[0];
    if (targetPart) switchTab(targetPart);
}

function setupMobileMenu() {
    if (!menuToggle || !nav) return;

    menuToggle.addEventListener('click', () => {
        nav.classList.toggle('mobile-active');
    });

    nav.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('mobile-active');
        });
    });
}

document.addEventListener('DOMContentLoaded', init);
