<?php

use Tlv\Hotsite\App\Core\Core;
use Tlv\Hotsite\Config\Environment;

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

Environment::start();

Core::start($_GET);
