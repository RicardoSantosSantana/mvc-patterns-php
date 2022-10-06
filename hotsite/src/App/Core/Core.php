<?php

namespace Tlv\Hotsite\App\Core;

use Tlv\Hotsite\App\Controller\HomeController;

/** 
 * Classe responsável por renderizar as requisiçoes de páginas
 */
class Core
{
    private string $ControllerNamespace = "Tlv\Hotsite\App\Controller\\";

    public function start($url)
    {
        $actionDefault = 'index';

        $controllerName = $this->ControllerNamespace . "HomeController";

        if (isset($url['page'])) {
            $controllerName = $this->ControllerNamespace . ucfirst("{$url['page']}Controller");
        }

        if (!class_exists($controllerName, true)) {
            $controllerName = $this->ControllerNamespace . "NotfoundController";
        }

        call_user_func_array(array(new $controllerName, $actionDefault), []);
    }
}
