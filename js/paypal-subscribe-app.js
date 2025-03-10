
document.querySelectorAll("[id^='paypal-subscribe-button-']").forEach(button => {
    
    const planID = button.dataset.planId; // Correct way to access "data-plan-id"
    
    if (!planID) {
        console.error("Missing plan ID for:", button.id);
        return; // Skip rendering if no plan ID
    }
    
    window.paypal.Buttons({

        fundingSource: window.paypal.FUNDING.PAYPAL, // Ensures the main PayPal button is displayed

        style: {
            label: 'subscribe',
            shape: 'pill',
            color: 'gold',
            height: 30,
            branding: false
        },
        createSubscription: function (data, actions) {
            return actions.subscription.create({
                'plan_id': planID               
            });
        },
        onApprove: function (data, actions) {


            // Send subscription success message to the parent window
            window.parent.postMessage(
            {
                type: "subscription-success",
                subscriptionID: data.subscriptionID,
            },
            "*" // Change "https://www.mytutor-jpn.com/" to your domain for security on live
            ); 

            /*
            Swal.fire({
                title: "Subscription Successful!",
                text: `You have successfully subscribed. Subscription ID: ${data.subscriptionID}`,
                icon: "success",
                confirmButtonText: "OK"
            });*/

            /*
            // Send subscription ID to server
            return fetch('api/save_subscription.php', {
                method: "POST",
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ subscriptionID: data.subscriptionID })
            });
            */
        },
        onError: function (err) {
            console.error("Subscription Error:", err);
            Swal.fire({
                title: "Subscription Error",
                text: "There was an error processing your subscription.",
                icon: "error",
                confirmButtonText: "OK"
            });
        }
    }).render(`#${button.id}`);
});
