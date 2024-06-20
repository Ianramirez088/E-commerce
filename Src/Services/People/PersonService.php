<?php
    require_once '../../Src/Dependencies/PostgresqlConnect.php';
    require_once '../../Src/Dependencies/QueryValidator.php';
    require_once '../../Src/Repositories/People/PersonRepository.php';

    class PersonService {
        private PostgresqlConnect $postgresqlConnect;
        protected PersonRepository $personRepository;
        protected ReturnedQueryValidator $returnedQueryValidator;

        public function __construct() {
            $this->postgresqlConnect = new PostgresqlConnect('solid');
            $this->returnedQueryValidator = new ReturnedQueryValidator();
            $this->personRepository = new PersonRepository($this->postgresqlConnect, $this->returnedQueryValidator);
        }

        public function store (Person $person) : array {
            // Business logic

            return $this->personRepository->create($person);
        }

        public function show () : array {
            // Business logic
            return $this->personRepository->read();
        }

        public function update (Person $person) : array {
            // Business logic
            return $this->personRepository->update($person);
        }

        public function destroy (int $id) : array {
            // Business logic
            return $this->personRepository->delete($id);
        }
    }


?>