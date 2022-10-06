<?php

namespace Tlv\Hotsite\Config;

/** 
 * Classe responsável por receber os valores de variáveis ambiente
 */
class Environment
{
    /** 
     * Propriedade que retorna o ambiente atual      
     */
    public static  string $environment;

    /** 
     * Propriedade que retorna o endereço IP ou o Host do Servidor da base de dados
     */
    public static  string $database_server;

    /** 
     * Propriedade que retorna a senha do administrator, root ou system administrator do banco de dados
     */
    public static  string $database_root_password;

    /** 
     * Propriedade que retorna o nome do banco de dados
     */
    public static  string $database_name;

    /** 
     * Propriedade que retorna o nome do usuário do banco de dados
     */
    public static  string $database_user;

    /** 
     * Propriedade que retorna a senha do banco de dados
     */
    public static  string $database_password;

    /** 
     * Propriedade que retorna a porta do banco de dados
     */
    public static  string $database_port;

    /** 
     * Método responsável por initializar as variáveis ambiente
     */
    public static function init(): void
    {
        self::$environment = $_ENV['ENVIRONMENT'];
        self::$database_server = $_ENV['DATABASE_SERVER'];
        self::$database_root_password = $_ENV['DATABASE_ROOT_PASSWORD'];
        self::$database_name = $_ENV['DATABASE_NAME'];
        self::$database_user = $_ENV['DATABASE_USER'];
        self::$database_password = $_ENV['DATABASE_PASSWORD'];
        self::$database_port = $_ENV['DATABASE_PORT'];
    }

    public function __toString()
    {
        self::init();
        return json_encode([
            'environment' => self::$environment,
            'database_server' => self::$database_server,
            'database_root_password' => self::$database_root_password,
            'database_name' => self::$database_name,
            'database_user' => self::$database_user,
            'database_password' => self::$database_password,
            'database_port' => self::$database_port
        ]);
    }
}
