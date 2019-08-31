<?php

    namespace app\conexao;

    use PDO;

    class Conexao {

        const DB_TYPE = 'mysql';
        const DB_HOST = '127.0.0.1';
        const DB_NAME = 'MVC';
        const DB_USER = 'root';
        const DB_PASSWORD = '';

        // instance
        private static $conexao;

        // getInstance
        public static function conectar()
        {
            if (isset(self::$conexao))
                return self::$conexao;
            
            try {
                self::$conexao = new PDO(self::DB_TYPE . ':host=' . self::DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASSWORD);
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$conexao;
            } catch(PDOException $e) {
                return 'Error: ' . $e->getMessage();
            }
        }
    }

?>