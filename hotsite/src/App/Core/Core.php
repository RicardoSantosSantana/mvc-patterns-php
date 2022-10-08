<?php

namespace Tlv\Hotsite\App\Core;

use Exception;
use Tlv\Hotsite\App\Routes\Route;

/** 
 * Classe Core usada como boostrap da aplicação com a implementação do Pattern Front Controller
 */
class Core
{

    private static string $controller_namespace = "Tlv\Hotsite\App\Controller\\";

    /** 
     * Método que inicializa os controller e direciona todo o fluxo para o controller correto
     */
    public static function start()
    {
    }
    public static function start2()
    {
        $get_params = $_REQUEST;
        try {

            $action = 'index';

            if (isset($get_params['method'])) {
                $action = $get_params['method'];
            }

            $controllerName = self::$controller_namespace . "HomeController";

            if (isset($get_params['page'])) {
                $controllerName = self::$controller_namespace . ucfirst("{$get_params['page']}Controller");
            }

            if (!class_exists($controllerName, true)) {
                throw new Exception("O Controller {$controllerName} não foi encontrado!");
            }


            $controllerInstance = new $controllerName();

            if (!method_exists($controllerInstance, $action)) {
                throw new Exception(
                    "O método {$action} não existe no controller {$controllerName}"
                );
            }


            unset($get_params['page']);
            unset($get_params['method']);

            $controllerInstance->$action((object) $_REQUEST);

            //comentário apenas para demonstração isso não funciona assim em produção
            echo "<br><pre style='background-color:black;padding:20px;color:#6cff6c;margin:20px;'>";
            print_r($get_params);
            echo "<br> <b>Controller Name:</b>&nbsp;{$controllerName}";
            echo "<br> <b>Action:</b>&nbsp;{$action}";
            echo "</pre>";
        } catch (\Exception $e) {
            echo "<div class=' alert alert-warning m-4' role='alert'>{$e->getMessage()}</div>";
        }
    }
}
