const controllerModels = {
    ps5: {
        basePrice: 298000,
        parts: {
            frontShell: {
                title: "Front Shell Panel",
                layerId: "frontShellLayer",
                basePath: "https://customizer.diemgaming.com.ar/ps5/front-shell-panel",
                colors: [
                    { name: "Negro", color: "negro", price: 0, type: "mate" },
                    { name: "Azul Mar Claro", color: "azul-mar-claro", price: 30000, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 30000, type: "mate" },
                    { name: "Naranja Fluor", color: "naranja-fluor", price: 30000, type: "mate" },
                    { name: "Gris", color: "gris", price: 30000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 30000, type: "mate" },
                    { name: "Verde", color: "verde", price: 38000, type: "textura" },
                    { name: "Payaso", color: "payaso", price: 38000, type: "textura" },
                    { name: "Glow Dark", color: "glow-dark", price: 38000, type: "textura" },
                    { name: "Octopus", color: "octopus", price: 38000, type: "textura" },
                    { name: "Galaxia", color: "galaxia", price: 38000, type: "textura" },
                    { name: "Oro", color: "gold", price: 38000, type: "textura" },
                    { name: "Plata", color: "silver", price: 38000, type: "textura" },
                    { name: "Dollar", color: "dollar", price: 38000, type: "textura" },
                    { name: "Flores", color: "flowers", price: 38000, type: "textura" },
                    { name: "Carbono", color: "carbon", price: 38000, type: "textura" },
                    { name: "Olas", color: "olas", price: 38000, type: "textura" },
                    { name: "Hojas", color: "hojas", price: 38000, type: "textura" }
                ]
            },
            trim: {
                title: "Trim",
                layerId: "trimLayer",
                basePath: "https://customizer.diemgaming.com.ar/ps5/trim",
                colors: [
                    { name: "Negro", color: "default", price: 0, type: "mate" },
                    { name: "Azul Mar Claro", color: "azul-mar-claro", price: 8000, type: "mate" },
                    { name: "Verde Manzana", color: "verde-manzana", price: 8000, type: "mate" },
                    { name: "Gris", color: "gris", price: 8000, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 8000, type: "mate" },
                    { name: "Naranja Fluor", color: "naranja-fluor", price: 8000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 8000, type: "mate" }
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
                    { name: "Gris", color: "gris", price: 5000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 5000, type: "mate" },
                    { name: "Azul", color: "azul", price: 5000, type: "mate" }
                ]
            },
            sticks: {
                title: "Sticks",
                layerId: "sticksLayer",
                basePath: "https://customizer.diemgaming.com.ar/ps5/sticks",
                colors: [
                    { name: "Negro", color: "default", price: 0, type: "mate" },
                    { name: "Rojo", color: "rojo", price: 8000, type: "mate" },
                    { name: "Azul", color: "azul", price: 8000, type: "mate" },
                    { name: "Verde", color: "verde", price: 8000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 8000, type: "mate" }
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
                    { name: "Joker", color: "joker", price: 38000, type: "texturas", typeLabel: "Textura" },
                    { name: "Bicolor", color: "bicolor", price: 38000, type: "texturas", typeLabel: "Textura" },
                    { name: "Golden", color: "golden", price: 38000, type: "texturas", typeLabel: "Textura" },
                    { name: "Palmeras", color: "palmeras", price: 38000, type: "texturas", typeLabel: "Textura" },
                    { name: "Rosas", color: "rosas", price: 38000, type: "texturas", typeLabel: "Textura" },
                    { name: "Transparente", color: "transparente", price: 38000, type: "texturas", typeLabel: "Textura" },
                    { name: "Gris", color: "gris", price: 30000, type: "mate", typeLabel: "Mate" },
                    { name: "Naranja", color: "naranja", price: 30000, type: "mate", typeLabel: "Mate" },
                    { name: "Rojo", color: "rojo", price: 30000, type: "mate", typeLabel: "Mate" },
                    { name: "Blanco", color: "blanco", price: 30000, type: "mate", typeLabel: "Mate" }
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
                    { name: "Rojo", color: "rojo", price: 8000, type: "mate" },
                    { name: "Azul", color: "azul", price: 8000, type: "mate" },
                    { name: "Blanco", color: "blanco", price: 8000, type: "mate" }
                ]
            },
            backShell: {
                title: "Back Shell",
                layerId: "backShellLayer",
                basePath: "https://customizer.diemgaming.com.ar/xbox/back-shell",
                previewImage: "back.png",
                colors: [
                    { name: "Default", color: "default", price: 0, type: "texturas", typeLabel: "Grip Antideslizante" },
                    { name: "Azul", color: "azul", price: 10000, type: "texturas", typeLabel: "Grip Antideslizante" },
                    { name: "Rojo", color: "rojo", price: 10000, type: "texturas", typeLabel: "Grip Antideslizante" },
                    { name: "Verde", color: "verde", price: 10000, type: "texturas", typeLabel: "Grip Antideslizante" },
                    { name: "Negro", color: "negro", price: 10000, type: "texturas", typeLabel: "Grip Antideslizante" },
                    { name: "Blanco", color: "blanco", price: 10000, type: "texturas", typeLabel: "Grip Antideslizante" }
                ]
            },
            digitalTriggers: {
                title: "Digital Triggers",
                layerId: "digitalTriggersLayer",
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

let currentModel = 'ps5';
let currentPart = 'frontShell';
let selectedColors = {};
let totalPrice = 298000;
let tabButtons = [];
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
    totalPrice = controllerModels[currentModel].basePrice;

    if (currentModel === 'xbox') {
        generateXboxUI();
    }

    Object.keys(controllerParts).forEach(part => {
        selectedColors[part] = controllerParts[part].colors[0];
    });

    setupTabs();
    setupMobileMenu();

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
    const imageUrl = getImageUrl(partConfig, color);

    return `
        <button class="color-btn ${activeClass}"
                data-color="${color.color}"
                data-price="${color.price}"
                data-part="${part}"
                data-image="${imageUrl}">
            <span class="color-preview">
                <img src="${imageUrl}" alt="${color.name}" onerror="this.style.background='#333'">
            </span>
            <span class="color-name">${color.name}</span>
            <span class="color-price">+ $${(color.price / 1000).toLocaleString('es-AR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</span>
        </button>
    `;
}

function getImageUrl(partConfig, color) {
    if (color.color === 'default') {
        return `${partConfig.basePath}/${partConfig.previewImage || 'front.png'}`;
    }
    const variant = partConfig.variant ? `${partConfig.variant}/` : '';
    return `${partConfig.basePath}/${color.type}/${variant}${color.color}.png`;
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

        const layer = document.getElementById(partConfig.layerId);
        if (!layer) return;

        const imageUrl = getImageUrl(partConfig, colorObj);
        layer.src = imageUrl;

        if (colorObj.color !== 'default' || colorObj.price > 0) {
            layer.style.display = 'block';
            layer.classList.add('active');
        } else {
            layer.style.display = 'none';
            layer.classList.remove('active');
        }
    });
}

function updatePrice() {
    let additionalPrice = 0;

    Object.keys(selectedColors).forEach(part => {
        additionalPrice += selectedColors[part].price;
    });

    totalPrice = controllerModels[currentModel].basePrice + additionalPrice;
    totalPriceElement.textContent = `$ ${(totalPrice / 1000).toLocaleString('es-AR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
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
