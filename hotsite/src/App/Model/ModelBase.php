<?php

namespace Tlv\Hotsite\App\Model;

use Exception;
use Tlv\Hotsite\Lib\Connections\Mysql;

/** 
 * Todas as Model devem estender dela
 */
class ModelBase
{
    /** 
     * Função que recebe a conexão com o banco de dados, selecionado
     * Neste médodo é possível alterar o banco de dados de toda a aplicação, e um único local
     * Pattern Strategy em ação aqui Squad TLV. :)
     */
    public static function DB()
    {
        return Mysql::getConnection();
    }

    /** 
     * Método responsável por retornar as consultas em um formato array
     */
    public static function Result($rs): array
    {

        $classNameChild = get_called_class();

        $result = [];

        while ($row = $rs->fetchObject($classNameChild)) {
            $result[] = $row;
        }

        if (!$result) {
            throw new Exception("Nenhum registro encontrado");
        }

        return $result;
    }
}
