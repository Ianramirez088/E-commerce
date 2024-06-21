<?php
    require_once '../../Src/Dependencies/PostgresqlConnect.php';
    require_once '../../Src/Dependencies/QueryValidator.php';
    require_once '../../Src/Repositories/Sale/SaleRepository.php';

    class SaleService {
        private PostgresqlConnect $postgresqlConnect;
        protected SaleRepository $saleRepository;
        protected ReturnedQueryValidator $returnedQueryValidator;

        public function __construct() {
            $this->postgresqlConnect = new PostgresqlConnect('ecommerce');
            $this->returnedQueryValidator = new ReturnedQueryValidator();
            $this->saleRepository = new SaleRepository($this->postgresqlConnect, $this->returnedQueryValidator);
        }

        public function store (Sale $sale) : array {
            // Business logic
            return $this->saleRepository->create($sale);
        }

        public function show () : array {
            // Business logic
            return $this->saleRepository->read();
        }

        public function update (Sale $sale) : array {
            // Business logic
            return $this->saleRepository->update($sale);
        }

        public function destroy (int $id) : array {
            // Business logic
            return $this->saleRepository->delete($id);
        }
    }


?>