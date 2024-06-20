<?php
	require_once '../../Src/Controllers/People/PersonController.php';

	function route(string $option, array $params = []) {
		switch ($option) {
			case 'create':
				$names = $params['names'];
				$surNames = $params['surNames'];
				$phone = $params['phone'];
				$email = $params['email'];
				$address = $params['address'];
				$personController = new PersonController(names: $names, surNames: $surNames, phone: $phone, email: $email, address: $address);

				return $personController->createPersonController();
			case 'read':
				$personController = new PersonController();

				return $personController->showPersonController();
			case 'update':
				$id = $params['id'];
				$names = $params['names'];
				$surNames = $params['surNames'];
				$phone = $params['phone'];
				$email = $params['email'];
				$address = $params['address'];

				$PersonController = new PersonController(id: $id, names: $names, surNames: $surNames, phone: $phone, email: $email, address: $address);

				return $personController->updatePersonController();
			case 'delete':
				$id = $params['id'];
				$personController = new PersonController(id: $id);

				return $personController->deletePersonController();
		}
	}

	$params =  [
		'id' => 1,
		'names' => 'Sebastian',
		'surNames' => 'Garcia Murillo',
		'phone' => '3185571971',
		'email' => 'sebgarcia54@gmail.com',
		'address' => 'mz 20 cs 22 sector e parque industrial'
	];

	// echo json_encode(route('create', $params), JSON_PRETTY_PRINT);
	echo json_encode(route('read'), JSON_PRETTY_PRINT);
	// echo json_encode(route('delete', [ 'id' => 2	 ]), JSON_PRETTY_PRINT);
?>