<?php

namespace Tlv\Hotsite\Lib\Connections;

use Tlv\Hotsite\Config\Environment;
use Tlv\Hotsite\Interfaces\DB;

/** 
 * Classe Connection Mysql Pattern Singleton
 */
class Mysql implements DB
{
    private static $conn;

    /** 
     *  Função que retorna uma instancia do PDO e garante apenas uma instancia
     *  implementação do Pattern Singleton
     */
    public static function getConnection()
    {

        $sConnection = sprintf(
            'mysql:dbname=%s;host=%s;port=%s;',
            Environment::$database_name,
            Environment::$database_server,
            Environment::$database_port
        );

        if (self::$conn == null) {
            self::$conn = new \PDO($sConnection, Environment::$database_user, Environment::$database_password);
        }

        return self::$conn;
    }
}
