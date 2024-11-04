jQuery(document).ready(function ($) {
    const domain = window.location.hostname;
    const cacheBuster = new Date().getTime();

    fetch(`https://bojun.lk/wp-json/payment-reminder/v1/status?domain=${domain}&_=${cacheBuster}`)
        .then(response => response.json())
        .then(data => {
            console.log('Popup Status:', data);
            if (data.show_popup) {
                $('#pay-now-button').attr('href', data.redirect_url); // Set the redirect URL
                $('#payment-reminder-overlay').fadeIn();
            }
        })
        .catch(error => {
            console.error('API Request Failed:', error);
            alert('Unable to load payment reminder. Please try again later.');
        });

    // Close popup when clicking the close icon
    $('#close-popup-icon').on('click', function () {
        $('#payment-reminder-overlay').fadeOut();
    });
});
