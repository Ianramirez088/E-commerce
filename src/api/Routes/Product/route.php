<?php
	require_once '../../Src/Controllers/Product/ProductController.php';

	function route(string $option, array $params = []) {
		switch ($option) {
			case 'create':
				$category = $params['category'];
				$name = $params['name'];
				$description = $params['description'];
				$price = $params['price'];
				$stock = $params['stock'];
				$productController = new ProductController(category: $category, name: $name, description: $description, price: $price,
				stock: $stock);
	
				return $productController->createProductController();
			case 'read':
				$productController = new ProductController();

				return $productController->showProductController();
			case 'update':
				$id = $params['id'];
				$category = $params['category'];
				$name = $params['name'];
				$description = $params['description'];
				$price = $params['price'];
				$stock = $params['stock'];

				$productController = new ProductController(category: $category, name: $name, description: $description, price: $price,
															id: $id, stock: $stock);

				return $productController->updateProductController();
			case 'delete':
				$id = $params['id'];
				$productController = new ProductController(id: $id);

				return $productController->deleteProductController();
		}
	}

	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		echo json_encode([ route($_GET['option']) ], JSON_PRETTY_PRINT);
	} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$data = json_decode(file_get_contents('php://input'), true);
		echo json_encode([ route($data['option'], $data['product']) ], JSON_PRETTY_PRINT);
	}
?>