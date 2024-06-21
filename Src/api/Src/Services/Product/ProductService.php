<?php
    require_once '../../Src/Dependencies/PostgresqlConnect.php';
    require_once '../../Src/Dependencies/QueryValidator.php';
    require_once '../../Src/Repositories/Product/ProductRepository.php';

    class ProductService {
        private PostgresqlConnect $postgresqlConnect;
        protected ProductRepository $productRepository;
        protected ReturnedQueryValidator $returnedQueryValidator;

        public function __construct() {
            $this->postgresqlConnect = new PostgresqlConnect('ecommerce');
            $this->returnedQueryValidator = new ReturnedQueryValidator();
            $this->productRepository = new ProductRepository($this->postgresqlConnect, $this->returnedQueryValidator);
        }

        public function store (Product $product) : array {
            // Business logic
            return $this->productRepository->create($product);
        }

        public function show () : array {
            return $this->productRepository->read();
        }

        public function update (Product $product) : array {
            return $this->productRepository->update($product);
        }

        public function destroy (int $id) : array {
            return $this->productRepository->delete($id);
        }
    }


?>