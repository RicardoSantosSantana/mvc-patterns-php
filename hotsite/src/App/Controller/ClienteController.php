<?php

namespace Tlv\Hotsite\App\Controller;

use Exception;
use Tlv\Hotsite\App\Model\Cliente;

class ClienteController extends Controller
{
    public function index(...$params)
    {
        echo "index do cliente";
    }

    /**
     * @author Ricardo Santana 
     * @method index1 usado para alguma coisa
     * @since 1.0 desde a versão 1 funciona assim
     * @param array $params array com um monte de coisas
     * @deprecated Está parado desde esse versão
     * Exemplo de uso de documentação de Métodos
     */
    public function index1(...$params)
    {
        echo "index do cliente";
    }

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
