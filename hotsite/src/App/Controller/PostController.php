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
     * @method list
     * @return void     
     * Método list responsável por listar todos os posts    
     */
    public static function list(): void
    {
        self::$title_page = 'Listagem de Postagem';
        $posts = Postagem::ListAll();
        echo self::View('/Post/list.html', ['posts' => $posts]);
    }
    public static function single($id): void
    {
        self::$title_page = 'Detalhe de Post';
        $posts = Postagem::getById($id);
        echo self::View('/Post/single.html', ['posts' => $posts]);
    }
}
