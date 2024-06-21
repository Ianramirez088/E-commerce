<?php

    require_once '../../Src/Repositories/Product/ProductRepository.php';

    class CustomerRepository extends ProductRepository {
        private $dBConnection;
        private $returnedQueryValidator;
        
        public function __construct(ConnectionDB $dBConnection, ReturnedQueryValidator $returnedQueryValidator) {
            $this->dBConnection = $dBConnection;
            $this->returnedQueryValidator = $returnedQueryValidator;
        }
 
        public function create (Object $customer) : array {
            $query = "INSERT INTO customers(id, names, sur_names, phone, email, address) VALUES (DEFAULT, :names, :sur_names, :phone, :email, :address) RETURNING *";
            $params = [
                'names' => $customer->getNames(),
                'sur_names' => $customer->getSurNames(),
                'phone' => $customer->getPhone(),
                'email' => $customer->getEmail(),
                'address' => $customer->getAddress()
            ];
            $response = $this->dBConnection->queryExecute($query, $params);
            
            return $this->returnedQueryValidator->valuesReturned($response);
        }

        public function read () : array {
            $query = "SELECT id, names, sur_names, phone, email, address FROM customers";
            $response = $this->dBConnection->queryExecute($query);
            
            return $this->returnedQueryValidator->valuesReturned($response);
        }

        public function update (Object $customer) : array {
            $query = "UPDATE customers SET names = :names, sur_names = :sur_names, phone = :phone, email = :email, address = :address, updated_at = NOW() WHERE id = :id RETURNING *";
            $params = [
                'id' => $customer->getId(),
                'names' => $customer->getNames(),
                'surNames' => $customer->getSurNames(),
                'phone' => $customer->getPhone(),
                'email' => $customer->getEmail(),
                'address' => $customer->getAddress()
            ];
            $response = $this->dBConnection->queryExecute($query, $params);
             
            return $this->returnedQueryValidator->valuesReturned($response);
        }

        public function delete (int $id) : array {
            $query = "DELETE FROM customers WHERE id = :id RETURNING *";
            $params = [
                'id' => $id
            ];
            $response = $this->dBConnection->queryExecute($query, $params);

            return $this->returnedQueryValidator->valuesReturned($response);
        }
    }

?>