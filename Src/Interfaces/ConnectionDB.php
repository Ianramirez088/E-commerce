<?php
    interface ConnectionDB {
        public function connect();
        public function queryExecute(string $query, array $params = []);
    }
?>