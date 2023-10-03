<?php

    namespace Database;

    /** Clase Database Conexión - Modelo Base */

    class Database extends \PDO{
        
        // private $pdo;
        private $sQuery;
        private $bConnected = false;
        private $parameters;

        private static $instance;
        private $connection;
    
        public function __construct() {
            $this->make_connection();
        }

        public static function getInstance(){
            if (!self::$instance instanceof self)
                self::$instance = new self();
            
            return self::$instance;
        }
    
        public function get_database_instance(){
            return $this->connection;
        }

        private function make_connection(){
            
            $hostname = 'localhost'; //localhost
            $database = 'erronka1'; //databasuaren izena
            $username = 'root';
            $password = '';

            try {
                $dsn = "mysql:host=$hostname;dbname=$database";
                $connection = new \PDO($dsn, $username, $password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                
                $setnames = $connection->prepare("SET NAMES 'utf8'");
                $setnames->execute();
                $this->connection = $connection; // Set the connection property
                
            } catch (\Throwable $th) {
                die ("Fail connection: {$th->getMessage()}");
            }
        }
    
        public function closeConnection() {
            if ($this->connection !== null) {
                $this->connection = null;
            }
        }
    
        // El método privado Init inicializa la ejecución de una consulta.
        private function init($query,$parameters = "") {
            if (!$this->bConnected) {

                $this->connection = Database::getInstance()->get_database_instance();
                $this->bConnected = true;

            }
            try {
                $this->sQuery = $this->connection->prepare($query);
    
                $this->bindMore($parameters);

                foreach($this->parameters as $param) {
                    [$paramName, $paramValue] = explode("\x7F", $param);
                    $this->sQuery->bindParam($paramName, $paramValue);
                }

                $this->sQuery->execute();

            } catch (\PDOException $e) {
                echo $e->getMessage();
            }            
            $this->parameters = array();
        }    

        // Los métodos bind y bindMore se utilizan para vincular parámetros a la consulta. Los parámetros se almacenan en el arreglo parameters.
        public function bind($paramName, $paramValue) {
            $this->parameters[$paramName] = ":" . $paramName . "\x7F" . utf8_encode($paramValue);
        }

        public function bindMore($paramsArray) {
            if (empty($this->parameters) && is_array($paramsArray)) {
                foreach ($paramsArray as $paramName => $paramValue) {
                    $this->bind($paramName, $paramValue);
                }
            }
        }
    
        // Los métodos column, row y single se utilizan para ejecutar diferentes tipos de consultas y obtener los resultados.
        public function column($query,$params = null) {

            $this->init($query, $params);
            $columns = $this->sQuery->fetchAll(\PDO::FETCH_NUM);
            $columnData = [];
            foreach ($columns as $cells) {
                $columnData[] = $cells[0];
            }
            
            return $columnData;
    
        }

        public function row($query, $params = null, $fetchMode = \PDO::FETCH_ASSOC) {
            $this->init($query, $params);
            return $this->sQuery->fetch($fetchMode);
        }

        public function single($query, $params = null) {
            $this->init($query, $params);
            return $this->sQuery->fetchColumn();
        }
    }

?>