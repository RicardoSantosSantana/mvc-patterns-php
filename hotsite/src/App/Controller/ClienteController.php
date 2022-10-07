<?php

namespace Tlv\Hotsite\App\Controller;

use Exception;
use Tlv\Hotsite\App\Model\Cliente;

class ClienteController extends Controller
{
    public function list()
    {
        try {

            $clientes = Cliente::ListAll();

            $page_params = [
                'title' => 'Lista de Clientes',
                'author' => 'Uncle Phill',
                'idade' => '44 anos',
                'template' => 'template.html'
            ];

            $data = [
                'clientes' => $clientes
            ];

            echo self::View('clientes.html', $data, $page_params);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
