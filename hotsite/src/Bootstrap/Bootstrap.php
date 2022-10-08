<?php

use Tlv\Hotsite\Config\Environment;

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

Environment::start();
