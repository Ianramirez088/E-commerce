<?php

    require_once '../../Src/Repositories/Products/ProductRepository.php';

    class PersonRepository extends ProductRepository {
        private $dBConnection;
        private $returnedQueryValidator;
        
        public function __construct(ConnectionDB $dBConnection, ReturnedQueryValidator $returnedQueryValidator) {
            $this->dBConnection = $dBConnection;
            $this->returnedQueryValidator = $returnedQueryValidator;
        }
 
        public function create (Object $person) : array {
            $query = "INSERT INTO people(id, names, sur_names, phone, email, address) VALUES (DEFAULT, :names, :sur_names, :phone, :email, :address) RETURNING *";
            $params = [
                'names' => $person->getNames(),
                'sur_names' => $person->getSurNames(),
                'phone' => $person->getPhone(),
                'email' => $person->getEmail(),
                'address' => $person->getAddress()
            ];
            $response = $this->dBConnection->queryExecute($query, $params);
            
            return $this->returnedQueryValidator->valuesReturned($response);
        }

        public function read () : array {
            $query = "SELECT id, names, sur_names, phone, email, address FROM people";
            $response = $this->dBConnection->queryExecute($query);
            
            return $this->returnedQueryValidator->valuesReturned($response);
        }

        public function update (Object $person) : array {
            $query = "UPDATE people SET names = :names, sur_names = :sur_names, phone = :phone, email = :email, address = :address, updated_at = NOW() WHERE id = :id RETURNING *";
            $params = [
                'id' => $person->getId(),
                'names' => $person->getNames(),
                'surNames' => $person->getSurNames(),
                'phone' => $person->getPhone(),
                'email' => $person->getEmail(),
                'address' => $person->getAddress()
            ];
            $response = $this->dBConnection->queryExecute($query, $params);
             
            return $this->returnedQueryValidator->valuesReturned($response);
        }

        public function delete (int $id) : array {
            $query = "DELETE FROM people WHERE id = :id RETURNING *";
            $params = [
                'id' => $id
            ];
            $response = $this->dBConnection->queryExecute($query, $params);

            return $this->returnedQueryValidator->valuesReturned($response);
        }
    }

?>