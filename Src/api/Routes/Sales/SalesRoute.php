<?php
	require_once '../../Src/Controllers/Sales/SaleController.php';

	function route(string $option, array $params = []) {
		switch ($option) {
			case 'create':
				$saleController = new SaleController();
				$response = [];
				for ($i=0; $i < count($params); $i++) { 
					$consecutive = $params[$i]['consecutive'];
					$quantity = $params[$i]['quantity'];
					$totalValue = $params[$i]['totalValue'];
					$person = $params[$i]['person'];
					$product = $params[$i]['product'];
					$state = $params[$i]['state'];
					$response = $saleController->createSaleController(consecutive: $consecutive, quantity: $quantity,
																		totalValue: $totalValue, person: $person,
																		product: $product, state: $state
																	);
				}

				return $response;
			case 'read':
				$saleController = new SaleController();

				return $saleController->showSaleController();
			case 'update':
				$response = [];
				$saleController = new SaleController();
				for ($i=0; $i < count($params); $i++) {
					$id = $params[$i]['id'];
					$consecutive = $params[$i]['consecutive'];
					$quantity = $params[$i]['quantity'];
					$totalValue = $params[$i]['totalValue'];
					$person = $params[$i]['person'];
					$product = $params[$i]['product'];
					$state = $params[$i]['state'];
					$response = $saleController->updateSaleController(id: $id, consecutive: $consecutive, quantity: $quantity,
																		totalValue: $totalValue, person: $person,
																		product: $product, state: $state
																	);
				}

				return $response();
			case 'delete':
				$id = $params['id'];
				$saleController = new SaleController();

				return $saleController->deleteSaleController($id);
		}
	}

	$params =  [
		0 => [
			'id' => 1,
			'consecutive' => '2',
			'quantity' => 5,
			'totalValue' => 5000,
			'person' => 1,
			'product' => 1,
			'state' => 'A'
		],
		1 => [
			'id' => 2,
			'consecutive' => '2',
			'quantity' => 3,
			'totalValue' => 3000,
			'person' => 1,
			'product' => 2,
			'state' => 'A'
		]
	];

	// echo json_encode(route('create', $params), JSON_PRETTY_PRINT);
	echo json_encode(route('read'), JSON_PRETTY_PRINT);
	// echo json_encode(route('delete', [ 'id' => 2	 ]), JSON_PRETTY_PRINT);
?>