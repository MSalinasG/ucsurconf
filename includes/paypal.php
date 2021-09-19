<?php

require 'paypal/autoload.php';

define('URL_SITIO','http://localhost/ucsurconf');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(        
        'ARqqGYZ5GH4u4a3vVnqyiIh-tDbvCXpGKDopJWA1NSdOBi4DZN1O_xpn28XfQWOdJujVVnyHJKZk5o6B',//CLIENTE ID
        'EDPXrsrf7BOAtD7NV79dgt83r1SjPfhZ1BTAFZu4BOMhH9Kn2D1wGi64J79OaHkSa6_w0607hT26ci3m' //SECRET        
    )
);

