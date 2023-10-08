<?php
    class ModelBase {
        
        private $connection;


        // public function establecerConexion($host, $usuario, $contrasena, $db) {
        //     $this->connection = new mysqli($host, $usuario, $contrasena, $db);

        //     if ($this->connection->connect_error) {
        //         die("Error de conexión: " . $this->connection->connect_error);
        //     }
        //     return $this->connection;
        // }

        // // Muestra una lista de este recurso
        // public function index($table, $conditions = "", $query_params = []){
        //     $config = include '../config.php';
        //     $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        //     $connection = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
        //     $sql = "SELECT * FROM $table $conditions ORDER BY id";
        //     $stmt = $this->connection->prepare($sql);
        //     $stmt->execute($query_params);

        //     $results = $stmt->fetch(\PDO::FETCH_ASSOC);

        //     return $results;

        // }

        // // Muestra un único recurso especificado
        // public function show($table, $id){
        //     $config = include '../config.php';
        //     $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        //     $connection = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

        //     $sql = "SELECT * FROM $table WHERE id = $id ORDER BY id";
        //     $stmt = $this->connection->prepare($sql);
        //     $stmt->execute();

        //     $results = $stmt->fetch(\PDO::FETCH_ASSOC);
        //     return $results;
            
        // }

        // // Inserta un nuevo recurso en la base de datos
        // public function store($table, $data){
        //     $config = include '../config.php';
        //     $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        //     $connection = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
        //     $columns = implode(', ', array_keys($data));
        //     $placeholders = implode(', :', array_keys($data));

        //     $sql = "INSERT INTO $table ($columns) VALUES (:$placeholders)";
        //     $stmt = $this->connection->prepare($sql);
        //     return $stmt->execute($data);
            
        // }

        // // Actualiza un recurso específico en la base de datos
        // public function update($table, $data, $id){
        //     $config = include '../config.php';
        //     $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        //     $connection = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
        //     $fields = array_map(function ($key) {
        //         return "$key = :$key";
        //     }, array_keys($data));

        //     $setClause = implode(', ', $fields);
        //     $sql = "UPDATE $table SET $setClause WHERE id = :id";

        //     // Agregar el signo de dólar ($) al comienzo de las claves en $data
        //     $data = array_combine(array_map(function ($key) {
        //         return ":$key";
        //     }, array_keys($data)), $data);

        //     $data['id'] = $id;
        //     $stmt = $this->connection->prepare($sql);
        //     return $stmt->execute($data);

        // }

        // // Elimina un recurso específico de la base de datos
        // public function destroy($table, $id){

        //     $stmt = $this->connection->prepare("DELETE FROM $table WHERE id = :id");
        //     $stmt->execute([
        //         ":id" => $id
        //     ]);

        // }
        
   }

?>