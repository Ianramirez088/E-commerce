<?php

	require_once '../../Src/Repositories/Products/ProductRepository.php';

	class SaleRepository extends ProductRepository {
		private $dBConnection;
		private $returnedQueryValidator;
		
		public function __construct(ConnectionDB $dBConnection, ReturnedQueryValidator $returnedQueryValidator) {
			$this->dBConnection = $dBConnection;
			$this->returnedQueryValidator = $returnedQueryValidator;
		}
 
		public function create (Object $sale) : array {
			$query = "INSERT INTO sales(id, consecutive, quantity, total_value, person, product, state)
							VALUES (DEFAULT, :consecutive, :quantity, :total_value, :person, :product, :state) RETURNING *";
			$params = [
				'consecutive' => $sale->getConsecutive(),
				'quantity' => $sale->getQuantity(),
				'total_value' => $sale->getTotalValue(),
				'person' => $sale->getPerson(),
				'product' => $sale->getProduct(),
				'state' => $sale->getState()
			];

			$response = $this->dBConnection->queryExecute($query, $params);
			
			return $this->returnedQueryValidator->valuesReturned($response);
		}

		public function read () : array {
			$query = "SELECT sales.consecutive,
							STRING_AGG(sales.id || ' - ' || products.id::TEXT || ' - ' || products.category || ' - ' || products.name || ' - ' || products.description
										|| ' - ' || products.value::TEXT || ' - ' || sales.quantity || ' - ' || sales.total_value, '|') AS listProducts,
							people.names, people.sur_names, people.phone, people.email, people.address
						FROM sales
							INNER JOIN products
								ON sales.product = products.id
							INNER JOIN people
								ON sales.person = people.id
						GROUP BY sales.consecutive, people.names, people.sur_names, people.phone, people.email, people.address";
			$response = $this->dBConnection->queryExecute($query);
			
			return $this->returnedQueryValidator->valuesReturned($response);
		}

		public function update (Object $sale) : array {
			$query = "UPDATE sales
							SET consecutive = :consecutive, quantity = :quantity, total_value = :total_value,
								person = :person, product = :product, state = :state, updated_at = NOW()
							WHERE id = :id RETURNING *";
			$params = [
				'id' => $sale->getId(),
				'consecutive' => $sale->getConsecutive(),
				'quantity' => $sale->getQuantity(),
				'total_value' => $sale->getTotalValue(),
				'person' => $sale->getPerson(),
				'product' => $sale->getProduct(),
				'state' => $sale->getState()
			];
			$response = $this->dBConnection->queryExecute($query, $params);
			 
			return $this->returnedQueryValidator->valuesReturned($response);
		}

		public function delete (int $id) : array {
			$query = "DELETE FROM sales WHERE id = :id RETURNING *";
			$params = [
				'id' => $id
			];
			$response = $this->dBConnection->queryExecute($query, $params);

			return $this->returnedQueryValidator->valuesReturned($response);
		}
	}

?>