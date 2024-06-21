<?php
    require_once '../../Src/Dependencies/PostgresqlConnect.php';
    require_once '../../Src/Dependencies/QueryValidator.php';
    require_once '../../Src/Repositories/Customer/CustomerRepository.php';

    class CustomerService {
        private PostgresqlConnect $postgresqlConnect;
        protected CustomerRepository $customerRepository;
        protected ReturnedQueryValidator $returnedQueryValidator;

        public function __construct() {
            $this->postgresqlConnect = new PostgresqlConnect('ecommerce');
            $this->returnedQueryValidator = new ReturnedQueryValidator();
            $this->customerRepository = new CustomerRepository($this->postgresqlConnect, $this->returnedQueryValidator);
        }

        public function store (Customer $customer) : array {
            // Business logic

            return $this->customerRepository->create($customer);
        }

        public function show () : array {
            // Business logic
            return $this->customerRepository->read();
        }

        public function update (Customer $customer) : array {
            // Business logic
            return $this->customerRepository->update($customer);
        }

        public function destroy (int $id) : array {
            // Business logic
            return $this->customerRepository->delete($id);
        }
    }


?>