<?php

namespace Tlv\Hotsite\App\Controller;

use Exception;
use Tlv\Hotsite\App\Model\Postagem;

/** 
 * Classe de Controlle de Post
 */
class PostController extends Controller
{
    /** 
     * Metódo index responsável por receber as requisicoes e os parametros do querystring
     * @param array $params
     */
    public function index(...$params)
    {

        try {

            if (isset($params['id'])) {
                return  self::single($params['id']);
            }

            self::list();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /** 
     * @method list
     * @return void     
     * Método list responsável por listar todos os posts    
     */
    public static function list(): void
    {
        $posts = Postagem::ListAll();
        echo self::View('/Post/list.html', ['posts' => $posts]);
    }
    public static function single($postID): void
    {
        $posts = Postagem::getById($postID);
        echo self::View('/Post/single.html', ['posts' => $posts]);
    }
}
