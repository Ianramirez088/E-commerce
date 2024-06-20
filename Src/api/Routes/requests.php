<?php
	header("Access-Control-Allow-Origin: https://www.aplicativosbl.com");
	header('Content-Type: application/json');
	header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
	header("Allow: GET, POST, PUT, DELETE");
	header("Access-Control-Allow-Headers: Content-Type, Accept");


	require_once '../Repositories/show.php';
	require_once '../Repositories/show_int.php';
	require_once '../Repositories/insert.php';
	require_once '../Repositories/update.php';
	require_once '../Repositories/delete.php';
	require_once '../../../../libs/bl/php/conn.php';
	

	class Router
	{
		private array $response = [];
		private show $index;
		private ShowInt $generate;
		private store $store;
		private update $update;
		private delete $delete;
		private $db;

		public function __construct()
		{
			$this->db = new Conn('cartera');
			$this->index = new Show($this->db);
			$this->generate = new ShowInt($this->db);
			$this->store = new Store($this->db);
			$this->update = new Update($this->db);
			$this->delete = new Delete($this->db);
			$this->execute();
		}

		private function execute() : void
		{
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					$item = json_decode($_GET['data'], true);
					if(isset($item['interfaz'])){
						$this->response = $this->generate->showInt($item);
						break;
					} else {
						$this->response = $this->index->show($item);
						break;
					}
				case'POST':
					// $_POST = json_decode(file_get_contents('php://input'), true);
					$this->response = $this->store->stores($_POST);
					break;
				case 'PUT':
					$_PUT = json_decode(file_get_contents('PHP://input'), true);
					$this->response = $this->update->update($_PUT);
					break;
				case 'DELETE':
					$_DELETE = json_decode(file_get_contents('PHP://input'), true);
					$this->response = $this->delete->delete($_DELETE);
					break;
			}

			echo json_encode($this->response, JSON_PRETTY_PRINT);
		}
	}

	new Router();
?>