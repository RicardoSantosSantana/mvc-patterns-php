<?php

namespace Tlv\Hotsite\Lib\Templates;

/** 
 * Classe que controla as alterações dentro dos templates
 * Esta classe tem por obrigação copiar para a memória todo o conteúdo html de um arquivo e
 * alterar o conteúdo dos parametros que estão em {{chaves}} com os dados vindos dos Controllers
 */
class Template
{
    /** 
     * Método responsável por colocar todo o html de um template em memória e alterar os parametros da página {{param}}
     * @param array $page_params 
     */
    public static function render(array $page_params): string
    {
        $template = 'default.html';

        if (isset($page_params['template'])) {
            $template =  $page_params['template'];
            unset($page_params['template']);
        }

        $html = file_get_contents("./App/Template/{$template}");

        foreach ($page_params as $key => $param) {
            $html =  str_replace("{{{$key}}}", $param, $html);
        }

        return $html;
    }
}
