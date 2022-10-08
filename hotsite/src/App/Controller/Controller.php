<?php

namespace Tlv\Hotsite\App\Controller;

use Exception;
use Tlv\Hotsite\Lib\Templates\Template;

/** 
 * Classe Controller básica de onde todas as controller devem herdar
 */
abstract class Controller
{

    public function index(...$params)
    {
        echo "index não implementado no controller";
    }

    /**
     * Método que possibilita a renderização de PHP em HTML.
     * o parâmetro $view_file deve ser preenchido com o nome do arquivo.html que fica dentro da pasta App/View          
     * O parâmetro $data deve ser um array com todos os dados que serão passados para a view
     * @param string $template
     * @param array $data
     * @param array $page_params deve ser usado para passar parametros para o template
     */
    public static function View(string $view_file, array $data = [], array $page_params = []): mixed
    {
        try {

            //render da view
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template_class = $twig->load($view_file);
            $out = $template_class->render($data);

            //render do template
            $template = Template::render($page_params);

            $result =  str_replace('{{content_page}}', $out, $template);

            return $result;
        } catch (Exception $e) {

            return "<div class=' alert alert-warning m-4' role='alert'>{$e->getMessage()}</div>";
        }
    }
}
