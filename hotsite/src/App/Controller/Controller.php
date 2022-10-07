<?php

namespace Tlv\Hotsite\App\Controller;

use Exception;
use Tlv\Hotsite\Lib\Templates\Template;

/** 
 * Classe Controller básica de onde todas as controller devem herdar
 */
class Controller
{

    private static string $ControllerNamespace = "Tlv\Hotsite\App\Controller\\";

    public static function start($get_params): void
    {
        $actionDefault = 'index';

        if (isset($get_params['method'])) {
            $actionDefault = $get_params['method'];
        }

        $controllerName = self::$ControllerNamespace . "HomeController";

        if (isset($get_params['page'])) {
            $controllerName = self::$ControllerNamespace . ucfirst("{$get_params['page']}Controller");
        }

        if (!class_exists($controllerName, true)) {
            $controllerName = self::$ControllerNamespace . "NotfoundController";
        }


        unset($get_params['page']);
        unset($get_params['method']);
        call_user_func_array(array(new $controllerName, $actionDefault), $get_params);


        echo "<br><pre style='background-color:black;padding:20px;color:#6cff6c;margin:20px;'>";
        print_r($get_params);
        echo "<br> <b>Controller Name:</b>&nbsp;{$controllerName}";
        echo "<br> <b>Action:</b>&nbsp;{$actionDefault}";
        echo "</pre>";
    }

    /**
     * Método que possibilita a renderização de PHP em HTML.
     * o parâmetro $template_path deve ser preenchido com o nome do arquivo.html que fica dentro da pasta App/View          
     * O parâmetro $data deve ser um array com todos os dados que serão passados para a view
     * @param string $template
     * @param array $data
     * @param array $page_params deve ser usado para passar parametros para o template
     */
    public static function View(string $template_path, array $data = [], array $page_params = []): void
    {
        try {

            $loader = new \Twig\Loader\FilesystemLoader('App/View');

            $twig = new \Twig\Environment($loader);

            $template_class = $twig->load($template_path);

            $template = Template::render($page_params);

            $out = $template_class->render($data);

            $result =  str_replace('{{content_page}}', $out, $template);
            echo $result;
        } catch (Exception $e) {

            echo "<div class=' alert alert-warning m-4' role='alert'>{$e->getMessage()}</div>";
        }
    }
}
