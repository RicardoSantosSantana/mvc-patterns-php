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

        $posts = Postagem::ListAll();

        echo self::View(
            '/Post/list.html',
            ['posts' => $posts],
            ['title' => 'Listar Postagens']
        );
    }

    /** 
     * @method single
     * @return void     
     * Método single responsável por trazer um único post    
     */
    public static function single($id): void
    {

        $posts = Postagem::getById($id);
        echo self::View(
            '/Post/single.html',
            ['posts' => $posts],
            ['title' => 'Detalhe Postagens']
        );
    }
}
