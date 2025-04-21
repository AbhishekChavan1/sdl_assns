// Show the popup when an item is added to the cart
function showPopup(productName) {
    document.getElementById('popup-message').innerText = productName + ' has been added to your cart!';
    document.getElementById('popup').style.display = 'block';

    // Hide the popup after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        closePopup();
    }, 5000);  // Adjust the 5000 value for longer or shorter duration
}

// Close the popup
function closePopup() {
    document.getElementById('popup').style.display = 'none';
}
