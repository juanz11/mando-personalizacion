// Configuration for each controller part with their color options
const controllerParts = {
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
            { name: "Negro", color: "negro", price: 0, type: "mate" },
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
            { name: "Negro", color: "negro", price: 0, type: "mate" },
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
            { name: "Negro", color: "negro", price: 0, type: "mate" },
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
            { name: "Negro", color: "negro", price: 0, type: "mate" },
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
            { name: "Negro", color: "negro", price: 0, type: "mate" },
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
            { name: "Negro", color: "negro", price: 0, type: "mate" },
            { name: "Cromo", color: "cromo", price: 5000, type: "mate" },
            { name: "Dorado", color: "dorado", price: 5000, type: "mate" }
        ]
    }
};

// State management
let currentPart = 'frontShell';
let selectedColors = {};
let totalPrice = 298000;

// Initialize selected colors with defaults
Object.keys(controllerParts).forEach(part => {
    selectedColors[part] = controllerParts[part].colors[0];
});

// DOM Elements
const tabButtons = document.querySelectorAll('.tab-btn');
const tabTitle = document.getElementById('tabTitle');
const colorOptions = document.getElementById('colorOptions');
const totalPriceElement = document.getElementById('totalPrice');
const menuToggle = document.getElementById('menuToggle');
const nav = document.querySelector('.nav');

// Initialize the page
function init() {
    setupTabs();
    setupMobileMenu();
    renderColorOptions(currentPart);
    updateController();
    updatePrice();
}

// Setup tab navigation
function setupTabs() {
    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const tab = btn.dataset.tab;
            switchTab(tab);
        });
    });
}

// Switch to a different tab
function switchTab(part) {
    currentPart = part;
    
    // Update active tab button
    tabButtons.forEach(btn => {
        btn.classList.remove('active');
        if (btn.dataset.tab === part) {
            btn.classList.add('active');
        }
    });
    
    // Update title and render color options
    tabTitle.textContent = controllerParts[part].title;
    renderColorOptions(part);
}

// Render color options for a specific part
function renderColorOptions(part) {
    const partConfig = controllerParts[part];
    let html = '';
    
    // Group colors by type (mate vs textura)
    const mateColors = partConfig.colors.filter(c => c.type === 'mate');
    const texturaColors = partConfig.colors.filter(c => c.type === 'textura');
    
    if (mateColors.length > 0) {
        html += `
            <div class="color-group">
                <label class="group-label">Mate</label>
                <div class="color-grid">
                    ${mateColors.map(color => createColorButton(color, part, partConfig)).join('')}
                </div>
            </div>
        `;
    }
    
    if (texturaColors.length > 0) {
        html += `
            <div class="color-group">
                <label class="group-label">Textura</label>
                <div class="color-grid">
                    ${texturaColors.map(color => createColorButton(color, part, partConfig)).join('')}
                </div>
            </div>
        `;
    }
    
    colorOptions.innerHTML = html;
    
    // Add click handlers to new color buttons
    const colorButtons = colorOptions.querySelectorAll('.color-btn');
    colorButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const colorName = btn.dataset.color;
            const price = parseInt(btn.dataset.price);
            const partName = btn.dataset.part;
            
            selectColor(partName, colorName, price);
            
            // Update active state
            colorButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });
    
    // Set active state for currently selected color
    const currentColor = selectedColors[part];
    colorButtons.forEach(btn => {
        if (btn.dataset.color === currentColor.color) {
            btn.classList.add('active');
        }
    });
}

// Create HTML for a color button
function createColorButton(color, part, partConfig) {
    const isSelected = selectedColors[part].color === color.color;
    const activeClass = isSelected ? 'active' : '';
    
    // Create image URL for preview
    const imageUrl = color.color === 'default' 
        ? `${partConfig.basePath}/front.png`
        : `${partConfig.basePath}/${color.type}/${color.color}.png`;
    
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
            <span class="color-price">+ $${color.price.toLocaleString('es-AR')},00</span>
        </button>
    `;
}

// Select a color for a part
function selectColor(part, color, price) {
    const partConfig = controllerParts[part];
    const colorObj = partConfig.colors.find(c => c.color === color);
    
    if (colorObj) {
        selectedColors[part] = colorObj;
        updateController();
        updatePrice();
    }
}

// Update the controller images
function updateController() {
    Object.keys(selectedColors).forEach(part => {
        const colorObj = selectedColors[part];
        const partConfig = controllerParts[part];
        const layerId = partConfig.layerId;
        const layer = document.getElementById(layerId);
        
        if (layer) {
            // Create the image URL based on the selected color
            const imageUrl = colorObj.color === 'default' 
                ? `${partConfig.basePath}/front.png`
                : `${partConfig.basePath}/${colorObj.type}/${colorObj.color}.png`;
            
            // Set the image source
            layer.src = imageUrl;
            
            // Show the layer if it has a valid image
            if (colorObj.color !== 'default' || colorObj.price > 0) {
                layer.style.display = 'block';
                layer.classList.add('active');
            } else {
                layer.style.display = 'none';
                layer.classList.remove('active');
            }
        }
    });
}

// Update the total price
function updatePrice() {
    let additionalPrice = 0;
    
    Object.keys(selectedColors).forEach(part => {
        additionalPrice += selectedColors[part].price;
    });
    
    totalPrice = 298000 + additionalPrice;
    totalPriceElement.textContent = `$ ${totalPrice.toLocaleString('es-AR')},00`;
}

// Setup mobile menu
function setupMobileMenu() {
    menuToggle.addEventListener('click', () => {
        nav.classList.toggle('mobile-active');
    });
    
    // Close menu when clicking on a link
    nav.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('mobile-active');
        });
    });
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', init);
