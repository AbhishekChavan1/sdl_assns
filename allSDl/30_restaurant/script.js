document.getElementById("restaurant-form").addEventListener("submit", function(event) {
    // Get form input values
    const restaurantName = document.getElementById("restaurant_name").value;
    const address = document.getElementById("address").value;
    const contactNumber = document.getElementById("contact_number").value;

    // Simple validation (just check if all fields are filled)
    if (restaurantName === "" || address === "" || contactNumber === "") {
        alert("Please fill in all fields.");
        event.preventDefault(); // Prevent form submission
    }
});
