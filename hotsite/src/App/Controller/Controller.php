<?php

namespace Tlv\Hotsite\App\Controller;

use Exception;
use Tlv\Hotsite\Lib\Templates\Template;

/** 
 * Classe Controller básica de onde todas as controller devem herdar
 */
class Controller
{

    private string $ControllerNamespace = "Tlv\Hotsite\App\Controller\\";
    public string $template;

    public function start($get_params)
    {
        $actionDefault = 'index';

        if (isset($get_params['method'])) {
            $actionDefault = $get_params['method'];
        }

        $controllerName = $this->ControllerNamespace . "HomeController";

        if (isset($get_params['page'])) {
            $controllerName = $this->ControllerNamespace . ucfirst("{$get_params['page']}Controller");
        }

        if (!class_exists($controllerName, true)) {
            $controllerName = $this->ControllerNamespace . "NotfoundController";
        }

        echo "<br><pre style='background-color:white;'>";
        print_r($get_params);
        echo "<br> <b>Controller Name:</b>&nbsp;{$controllerName}";
        echo "<br> <b>Action:</b>&nbsp;{$actionDefault}";
        echo "</pre>";

        unset($get_params['page']);
        unset($get_params['method']);
        call_user_func_array(array(new $controllerName, $actionDefault), $get_params);
    }

    /**
     * Propriedade que será renderizada na view e pode ser usada pra título de página
     */
    public static string $title_page = '';

    /** 
     * Método que será usado para enviar os parametros padrão de uma página
     */
    public static function renderData(array $data)
    {
        $data['title_page'] =  self::$title_page;
        return $data;
    }

    /** 
     * Método responsável por ler todo o conteúdo do html de um template
     */
    public static function renderTemplate(string $template_name)
    {

        $template = file_get_contents("App/Template/{$template_name}");
        return $template;
    }
    /**
     * Método que possibilita a renderização de PHP em HTML.
     * o parâmetro $template_path deve ser preenchido com o nome do arquivo.html que fica dentro da pasta App/View          
     * O parâmetro $data deve ser um array com todos os dados que serão passados para a view
     * @param string $template
     * @param array $data
     */
    public static function View(string $template_path, array $data = [], array $page_params = [])
    {
        try {

            $data  = self::renderData($data);

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
