<?php

    require_once '../../Src/Interfaces/Crud.php';

    class ProductRepository implements Crud {
        private $dBConnection;
        private $returnedQueryValidator;

        public function __construct(ConnectionDB $dBConnection, ReturnedQueryValidator $returnedQueryValidator) {
            $this->dBConnection = $dBConnection;
            $this->returnedQueryValidator = $returnedQueryValidator;
        }
 
        public function create (Object $product) : array {
            $query = "INSERT INTO products(id, category, name, description, price, state, stock) VALUES (DEFAULT, :category, :name, :description, :price, :state, :stock) RETURNING *";
            $params = [
                'category' => $product->getCategory(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice(),
                'state' => $product->getState(),
                'stock' => $product->getStock()
            ];

            $response = $this->dBConnection->queryExecute($query, $params);
            
            return $this->returnedQueryValidator->valuesReturned($response);
        }

        public function read () : array {
            $query = "SELECT id, category, name, description, price FROM products";
            $response = $this->dBConnection->queryExecute($query);
            
            return $this->returnedQueryValidator->valuesReturned($response);
        }

        public function update (Object $product) : array {
            $query = "UPDATE products SET category = :category, name = :name, description = :description, price, = :price, state = :state, stock = :stock, updated_at = NOW() WHERE id = :id RETURNING *";
            $params = [
                'id' => $product->getId(),
                'category' => $product->getCategory(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice(),
                'state' => $product->getState(),
                'stock' => $product->getStock()
            ];
            $response = $this->dBConnection->queryExecute($query, $params);
             
            return $this->returnedQueryValidator->valuesReturned($response);
        }

        public function delete (int $id) : array {
            $query = "DELETE FROM products WHERE id = :id RETURNING *";
            $params = [
                'id' => $id
            ];
            $response = $this->dBConnection->queryExecute($query, $params);

            return $this->returnedQueryValidator->valuesReturned($response);
        }
    }

?>