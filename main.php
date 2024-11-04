<?php
/*
Plugin Name: Payment Reminder Popup
Description: Displays a payment reminder popup with full-screen overlay, controlled from a central server.
Version: 1.4
Author: Irosh Wijesiri
*/

function enqueue_popup_scripts() {
    wp_enqueue_script('popup-script', plugin_dir_url(__FILE__) . 'popup.js', ['jquery'], '1.4', true);
    wp_enqueue_style('popup-style', plugin_dir_url(__FILE__) . 'popup.css', [], '1.4');
}
add_action('wp_enqueue_scripts', 'enqueue_popup_scripts');

// Add popup HTML to the footer.
function add_popup_html() {
    ?>
    <div id="payment-reminder-overlay" style="display:none;">
        <div id="payment-reminder-popup">
            <button id="close-popup-icon">&times;</button>
            <p class="popup-message">Please complete your payment to continue.</p>
            <a id="pay-now-button" href="#" target="_blank" class="button">Pay Now</a>
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'add_popup_html');
