<?php

namespace Tlv\Hotsite\App\Core;

/** 
 * Classe Core usada como boostrap da aplicação com a implementação do Pattern Front Controller
 */
class Core
{

    private static string $controller_namespace = "Tlv\Hotsite\App\Controller\\";

    /** 
     * Método que inicializa os controller e direciona todo o fluxo para o controller correto
     */
    public static function start($get_params): void
    {

        $actionDefault = 'index';

        if (isset($get_params['method'])) {
            $actionDefault = $get_params['method'];
        }

        $controllerName = self::$controller_namespace . "HomeController";

        if (isset($get_params['page'])) {
            $controllerName = self::$controller_namespace . ucfirst("{$get_params['page']}Controller");
        }

        if (!class_exists($controllerName, true)) {
            $controllerName = self::$controller_namespace . "NotfoundController";
        }

        unset($get_params['page']);
        unset($get_params['method']);

        call_user_func_array(array(new $controllerName, $actionDefault), $get_params);

        //comentário apenas para demonstração isso não funciona assim em produção
        echo "<br><pre style='background-color:black;padding:20px;color:#6cff6c;margin:20px;'>";
        print_r($get_params);
        echo "<br> <b>Controller Name:</b>&nbsp;{$controllerName}";
        echo "<br> <b>Action:</b>&nbsp;{$actionDefault}";
        echo "</pre>";
    }
}
