<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('create_account', 'DefaultController');
Routing::get('offers', 'OfferController');
Routing::get('home', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addOffer', 'OfferController');
Routing::post('search', 'OfferController');
Routing::post('register', 'SecurityController');
Routing::get('showOffer', 'OfferController');

Routing::run($path);
