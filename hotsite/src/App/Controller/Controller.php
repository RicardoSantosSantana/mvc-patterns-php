<?php

namespace Tlv\Hotsite\App\Controller;

use Exception;

/** 
 * Classe Controller básica de onde todas as controller devem herdar
 */
class Controller
{
    /**
     * Método que possibilita a renderização de PHP em HTML.
     * o parâmetro $template deve ser preenchido com o nome do arquivo.html que fica dentro da pasta App/View          
     * O parâmetro $data deve ser um array com todos os dados que serão passados para a view
     * @param string $template
     * @param array $data
     */
    public static function View(string $template, array $data = [])
    {
        try {

            $loader = new \Twig\Loader\FilesystemLoader('App/View');

            $twig = new \Twig\Environment($loader);

            $template = $twig->load($template);

            return $template->render($data);
        } catch (Exception $e) {

            echo "<div class=' alert alert-warning m-4' role='alert'>{$e->getMessage()}</div>";
        }
    }
}
