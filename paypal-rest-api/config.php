<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require 'autoload.php';

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AWzJ5nK4y47MgI0aMAWOnVRTAhi9uJeWx3iCuMGT_dywasurylf6x9kdGMpk5p5miZyVk-s6O16AoDez',
    'client_secret' => 'EMJepcimV8QYz5bfPOKYFwxFIUQegEQu6QtfeSWv_Vo9veGK-neIgtxQrgnQPAG3BKw6tquSmsHjvCBW',
    'return_url' => 'http://localhost/paypal-rest-api/response.php',
    'cancel_url' => 'http://localhost/paypal-rest-api/payment-cancelled.html'
];

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'sign_up_db'
];

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}