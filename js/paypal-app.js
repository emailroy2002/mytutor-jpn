document.querySelectorAll("[id^='paypal-button-']").forEach(button => {
    const price = button.getAttribute("data-price");

    window.paypal.Buttons({
      
        fundingSource: window.paypal.FUNDING.PAYPAL, // Ensures the main PayPal button is displayed
        style: {
            label: 'buynow', // Other options: 'pay', 'buynow', 'checkout'
            shape: 'pill',
            color: 'gold',
            height: 30,
            branding: false // Hides "Powered by PayPal"
        },        
        createOrder: function () {
            return fetch('api/create_payment.php', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ price: price })  // Send hardcoded price to backend
            })
            .then(res => res.json())
            .then(data => data.orderId);
        },
        onApprove: function (data, actions) {
            console.log(data);
            return fetch('api/capture_payment.php', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ orderID: data.orderID })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "COMPLETED") {
                    //document.getElementById("result-message").textContent = `Payment successful for $${price}!`;
                    Swal.fire({
                        title: "Payment Successful!",
                        text: `Payment successful for ¥${price}.`,
                        icon: "success",
                        confirmButtonText: "OK"
                    });                      
                } else {
                    throw new Error("Payment not completed.");
                }
            })
            .catch(error => {
                console.error("Capture Payment Error:", error);
                //document.getElementById("result-message").textContent = `Error capturing PayPal payment for $${price}.`;
                Swal.fire({
                    title: "Capture Payment Error",
                    text: `Error capturing PayPal payment for ¥${price}.`,
                    icon: "error",
                    confirmButtonText: "OK"
                });                  
            });
          
           
        },
           
    }).render(`#${button.id}`);
});


/*
document.querySelectorAll("[id^='paypalcc-button-']").forEach(button => {
    const price = button.getAttribute("data-price");

    window.paypal.Buttons({
      
        fundingSource: window.paypal.FUNDING.CARD, // Ensures the main PayPal button is displayed
        style: {
            shape: 'pill',             
            height: 30,
            branding: false // Hides "Powered by PayPal"
        },        
        createOrder: function () {
            return fetch('api/create_payment.php', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ price: price })  // Send hardcoded price to backend
            })
            .then(res => res.json())
            .then(data => data.orderId);
        },
        onApprove: function (data, actions) {

            console.log(data);

            return fetch('api/capture_payment.php', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ orderID: data.orderID })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "COMPLETED") {
                    //document.getElementById("result-message").textContent = `Payment successful for $${price}!`;
                    Swal.fire({
                        title: "Credit Card Payment Successful!",
                        text: `Credit Card Payment successful for ¥${price}.`,
                        icon: "success",
                        confirmButtonText: "OK"
                    });                    
                } else {
                    throw new Error("Payment not completed.");
                }
            })
            .catch(error => {
                console.error("Capture Payment Error:", error);
                //document.getElementById("result-message").textContent = `Error capturing Credit Card  payment for $${price}.`;
                Swal.fire({
                    title: "Capture Payment Error",
                    text: `Error capturing Credit Card payment for ¥${price}.`,
                    icon: "error",
                    confirmButtonText: "OK"
                });                
            });
        },
           
    }).render(`#${button.id}`);
});
*/



document.querySelectorAll("[id^='paypalcc-button-']").forEach(button => {
    const price = button.getAttribute("data-price");

    window.paypal.Buttons({
        fundingSource: window.paypal.FUNDING.CARD, // Ensures the main PayPal button is displayed
        style: {
            shape: 'pill',
            height: 30,
            branding: false // Hides "Powered by PayPal"
        },        
        createOrder: function () {
            return fetch('api/create_payment.php', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ price: price })  // Send hardcoded price to backend
            })
            .then(res => res.json())
            .then(data => data.orderId)
            .catch(error => {
                console.error("Create Order Error:", error);
                Swal.fire({
                    title: "Create Order Error",
                    text: "Failed to create PayPal order. Please try again.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                throw error; // Prevents proceeding if there's an error
            });
        },
        onApprove: function (data, actions) {
            console.log("Payment Approved:", data);

            return fetch('api/capture_payment.php', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ orderID: data.orderID })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "COMPLETED") {
                    Swal.fire({
                        title: "Payment Successful!",
                        text: `Credit Card Payment successful for ¥${price}.`,
                        icon: "success",
                        confirmButtonText: "OK"
                    });                    
                } else {
                    throw new Error("Payment not completed.");
                }
            })
            .catch(error => {
                console.error("Capture Payment Error:", error);
                Swal.fire({
                    title: "Capture Payment Error",
                    text: `Error capturing Credit Card payment for ¥${price}.`,
                    icon: "error",
                    confirmButtonText: "OK"
                });
            });
        },
        onError: function (err) {
            console.error("PayPal Payment Error:", err);
            Swal.fire({
                title: "Payment Error",
                text: "An error occurred while processing your payment. Please try again.",
                icon: "error",
                confirmButtonText: "OK"
            });
        }    
    }).render(`#${button.id}`);
});



