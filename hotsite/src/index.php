<?php

use Tlv\Hotsite\App\Core\Core;

require __DIR__ . '../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

$template = file_get_contents('App/Template/template.html');

ob_start();
$core = new Core;
$core->start($_GET);
$out = ob_get_contents();
ob_end_clean();

$done = str_replace('{{content_page}}', $out, $template);
echo $done;
