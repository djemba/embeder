<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Djemba\Embeder;

$embeder = new Embeder;
$embeder->liveEvent = 'filip';
$embeder->stream = "livestream";
$embeder->host = "www.bisericasega.ro";
$embeder->makeHLS();
