<?php

namespace Tlv\Hotsite\App\Controller;

class HomeController extends Controller
{

    public function index()
    {

        echo self::View('home.html');
    }
}
