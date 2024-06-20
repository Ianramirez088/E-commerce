<?php
    require_once '../../Src/Interfaces/ConnectionDB.php';

    class PostgresqlConnect implements ConnectionDB {
        public $DBName = '';
        private $host = 'localhost';
        private $controller = 'pgsql';
        private $port = 9555;
        private $password = 'm*reno12';
        private $user = 'postgres';
        private $connection;

        public function __construct($DBName) {
            $this->DBName = $DBName;
            $this->connect();
        }

        public function connect() {
            try {
                $this->connection = new PDO("$this->controller:host=$this->host;dbname=$this->DBName;port=$this->port", "$this->user", "$this->password");
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

        }

        public function queryExecute(string $query, array $params = []) {
            $data = $this->connection->prepare($query);
            $data->execute($params);
            
            if(stripos($query, 'SELECT') === 0 or stripos($query, 'RETURNING') > 0) {
                return $data->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return $data->rowCount();
            }
        }
    }

?>