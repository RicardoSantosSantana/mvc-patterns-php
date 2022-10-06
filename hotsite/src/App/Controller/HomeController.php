<?php

namespace Tlv\Hotsite\App\Controller;

use Exception;
use Tlv\Hotsite\App\Model\Postagem;

class HomeController
{
    private Postagem $Postagem;

    public function __construct()
    {
        $this->Postagem = new Postagem;
    }

    public function index()
    {
        try {
            $posts = $this->Postagem->ListAll();
            var_dump($posts);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
