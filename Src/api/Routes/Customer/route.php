<?php
	require_once '../../Src/Controllers/Customer/CustomerController.php';

	function route(string $option, array $params = []) {
		switch ($option) {
			case 'create':
				$names = $params['names'];
				$surNames = $params['surNames'];
				$phone = $params['phone'];
				$email = $params['email'];
				$address = $params['address'];
				$customerController = new CustomerController(names: $names, surNames: $surNames, phone: $phone, email: $email, address: $address);

				return $customerController->createCustomerController();
			case 'read':
				$customerController = new CustomerController();

				return $customerController->showCustomerController();
			case 'update':
				$id = $params['id'];
				$names = $params['names'];
				$surNames = $params['surNames'];
				$phone = $params['phone'];
				$email = $params['email'];
				$address = $params['address'];

				$customerController = new CustomerController(id: $id, names: $names, surNames: $surNames, phone: $phone, email: $email, address: $address);

				return $customerController->updateCustomerController();
			case 'delete':
				$id = $params['id'];
				$customerController = new CustomerController(id: $id);

				return $customerController->deleteCustomerController();
		}
	}


	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		echo json_encode(route($_GET['option']), JSON_PRETTY_PRINT);
	} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$data = json_decode(file_get_contents('php://input'), true);
		echo json_encode(route($data['option'], $data['customer']), JSON_PRETTY_PRINT);
	}
	
	// echo json_encode(route('delete', [ 'id' => 2	 ]), JSON_PRETTY_PRINT);
?>