<?php

use Tlv\Hotsite\App\Controller\Controller;
use Tlv\Hotsite\Config\Environment;

require __DIR__ . '../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

Environment::start();

Controller::start($_GET);
