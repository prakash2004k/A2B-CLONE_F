document.addEventListener('DOMContentLoaded', () => {
    const addToCartButton = document.querySelector('.add-to-cart');
    const cartCountElement = document.getElementById('cart-count');
    let cartCount = 0;

    addToCartButton.addEventListener('click', () => {
        cartCount++;
        cartCountElement.textContent = cartCount;
    });
});
