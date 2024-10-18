// Initialize cart
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Function to add items to the cart
function addToCart(itemName, itemPrice, itemImage) {
    // Check if item already exists in the cart
    const existingItemIndex = cart.findIndex(item => item.name === itemName);

    if (existingItemIndex > -1) {
        // If the item exists, increase the quantity
        cart[existingItemIndex].quantity += 1;
    } else {
        // If the item does not exist, add it to the cart
        cart.push({ name: itemName, price: itemPrice, quantity: 1, image: itemImage });
    }

    // Update local storage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Update the cart display
    updateCartDisplay();
    updateCartCounter(); // Update the cart counter after adding an item
    updateCartPanel(); // Update the cart panel after adding an item
}

// Function to update the cart display on cart.html
function updateCartDisplay() {
    const cartBody = document.getElementById('cart-body');
    const totalAmount = document.getElementById('total-amount');
    cartBody.innerHTML = ''; // Clear existing cart items

    if (cart.length === 0) {
        cartBody.innerHTML = '<tr class="empty-cart"><td colspan="3">Your cart is empty</td></tr>';
        totalAmount.textContent = 'Total: $0.00';
        return;
    }

    let total = 0;
    cart.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.name}</td>
            <td>$${item.price.toFixed(2)}</td>
            <td>${item.quantity}</td>
        `;
        cartBody.appendChild(row);
        total += item.price * item.quantity;
    });

    totalAmount.textContent = `Total: $${total.toFixed(2)}`;
}

// Function to update the cart counter
function updateCartCounter() {
    const cartCounter = document.getElementById('cart-counter');
    if (cartCounter) {
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        cartCounter.textContent = totalItems; // Set the cart counter to the total items
    }
}

// Function to clear the cart
function clearCart() {
    cart = []; // Empty the cart
    localStorage.removeItem('cart'); // Remove cart from local storage
    updateCartDisplay(); // Update cart display on cart.html
    updateCartCounter(); // Update cart counter in menu.html
    updateCartPanel(); // Update cart panel in menu.html
}

// Function to update the fixed cart panel at the bottom of menu.html
function updateCartPanel() {
    const cartPanel = document.querySelector('.cart-panel .cart-body');
    cartPanel.innerHTML = ''; // Clear existing items in the panel

    let total = 0;
    cart.forEach(item => {
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}" class="cart-item-image">
            <span>${item.name} (x${item.quantity})</span>
            <span>$${(item.price * item.quantity).toFixed(2)}</span>
        `;
        cartPanel.appendChild(cartItem);
        total += item.price * item.quantity;
    });

    // Update total amount in the cart panel
    const totalAmount = document.getElementById('total-amount');
    totalAmount.textContent = `Total: $${total.toFixed(2)}`;
}

// Load cart data when the page is loaded
document.addEventListener('DOMContentLoaded', function() {
    updateCartDisplay(); // Update cart display
    updateCartCounter(); // Update the cart counter when the page loads
    updateCartPanel(); // Update the cart panel when the page loads
});
