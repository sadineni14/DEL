
document.getElementById('fuel-order-form').addEventListener('submit', function(e) {
    e.preventDefault(); 
    const fuelType = document.getElementById('fuel-type').value;
    const quantity = document.getElementById('quantity').value;
    const address = document.getElementById('address').value;

    if (fuelType === "" || quantity === "" || address === "") {
        alert("Please fill out all the fields.");
    } else {
        alert("Your order has been placed successfully!");
        this.reset(); 
    }
});


document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    if (name === "" || email === "" || message === "") {
        alert("Please fill out all fields.");
    } else {
        alert("Thank you for contacting us! We will get back to you soon.");
        this.reset();
    }
});