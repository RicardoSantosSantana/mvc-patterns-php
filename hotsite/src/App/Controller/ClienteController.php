<?php

namespace Tlv\Hotsite\App\Controller;

use Exception;
use Tlv\Hotsite\App\Model\Cliente;

class ClienteController
{
    private Cliente $Cliente;

    public function __construct()
    {
        $this->Cliente = new Cliente;
    }

    public function index()
    {
        try {
            $clientes = $this->Cliente->ListAll();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('clientes.html');
            echo $template->render(['clientes' => $clientes]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
