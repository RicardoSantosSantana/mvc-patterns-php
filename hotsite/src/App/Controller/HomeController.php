<?php

namespace Tlv\Hotsite\App\Controller;

class HomeController extends Controller
{

    public function index(...$params)
    {
        echo self::View('home.html', [], [
            'title' => 'Bem vindo'
        ]);
    }
}
