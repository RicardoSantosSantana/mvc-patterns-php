<?php

namespace Tlv\Hotsite\App\Controller;

use Exception;
use Tlv\Hotsite\App\Model\Postagem;

class PostController
{
    private Postagem $Postagem;

    public function index()
    {
        try {
            $posts = Postagem::ListAll();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');
            echo $template->render(['posts' => $posts]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
