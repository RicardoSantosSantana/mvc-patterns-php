<?php

use Tlv\Hotsite\App\Controller\Controller;
use Tlv\Hotsite\Config\Environment;

require __DIR__ . '../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

Environment::start();
$template = file_get_contents('App/Template/template.html');


ob_start();

$core = new Controller;
$core->start($_GET);
$out = ob_get_contents();
ob_end_clean();

echo $out;


// $done = str_replace('{{title}}', 'ricardo', $template);

// $done = str_replace('{{content_page}}', $out, $done);
// echo $done;
