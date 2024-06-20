<?php
	require_once '../../Src/Controllers/Products/ProductController.php';

	function route(string $option, array $params = []) {
		switch ($option) {
			case 'create':
				$category = $params['category'];
				$name = $params['name'];
				$description = $params['description'];
				$price = $params['price'];
				$ProductController = new ProductController($category, $name, $description, $price);
	
				return $ProductController->createProductController();
			case 'read':
				$ProductController = new ProductController();

				return $ProductController->showProductController();
			case 'update':
				$id = $params['id'];
				$category = $params['category'];
				$name = $params['name'];
				$description = $params['description'];
				$price = $params['price'];

				$ProductController = new ProductController($category, $name, $description, $price, $id);

				return $ProductController->updateProductController();
			case 'delete':
				$id = $params['id'];
				$ProductController = new ProductController(id: $id);

				return $ProductController->deleteProductController();
		}
	}

	$params =  [
		'id' => 47,
		'category' => 'Frutas',
		'name' => 'Pera',
		'description' => 'Se denomina pera al fruto de distintas especies del genero Pyrus, integrado por árboles caducifolios conocidos comunmente como perales.',
		'price' => 1000
	];

	// echo json_encode(main('create', $params), JSON_PRETTY_PRINT);
	echo json_encode(route('read'), JSON_PRETTY_PRINT);
	// echo json_encode(main('delete', [ 'id' => 47 ]), JSON_PRETTY_PRINT);
?>