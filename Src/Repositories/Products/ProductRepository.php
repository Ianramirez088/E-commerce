<?php

    require_once '../../Src/Interfaces/Crud.php';

    class ProductRepository implements Crud {
        private $dBConnection;
        
        public function __construct(ConnectionDB $dBConnection) {
            $this->dBConnection = $dBConnection;
        }
 
        public function create (Object $product) : array {
            $query = "INSERT INTO products(id, category, name, description, value) VALUES (DEFAULT, :category, :name, :description, :price) RETURNING *";
            $params = [
                'category' => $product->getCategory(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice()
            ];

            $response = $this->dBConnection->queryExecute($query, $params);
            
            return is_array($response) && count($response) > 0 ? [ 'state' => 'Successful response', 'Response' => $response ] : [ 'state' => 'Bad response', 'Response' => $response ];
        }

        public function read () : array {
            $query = "SELECT id, category, name, description, price FROM products";
            $response = $this->dBConnection->queryExecute($query);
            
            return is_array($response) && count($response) > 0 ? [ 'state' => 'Successful response', 'Response' => $response ] : [ 'state' => 'Bad response', 'Response' => $response ];
        }

        public function update (Object $product) : array {
            $query = "UPDATE products SET category = :category, name = :name, description = :description, value = :price, updated_at = NOW() WHERE id = :id RETURNING *";
            $params = [
                'id' => $product->getId(),
                'category' => $product->getCategory(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice()
            ];
            $response = $this->dBConnection->queryExecute($query, $params);
             
            return is_array($response) && count($response) > 0 ? [ 'state' => 'Successful response', 'Response' => $response ] : [ 'state' => 'Bad response', 'Response' => $response ];
        }

        public function delete (int $id) : array {
            $query = "DELETE FROM products WHERE id = :id RETURNING *";
            $params = [
                'id' => $id
            ];
            $response = $this->dBConnection->queryExecute($query, $params);

            return is_array($response) && count($response) > 0 ? [ 'state' => 'Successful response', 'Response' => $response ] : [ 'state' => 'Bad response', 'Response' => $response ];
        }
    }

?>