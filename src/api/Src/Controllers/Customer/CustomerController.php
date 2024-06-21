<?php
	require_once '../../Src/Models/Customer/Customer.php';
	require_once '../../Src/Services/Customer/CustomerService.php';

	class CustomerController
	{
		protected $id, $names, $surNames, $phone, $email, $address;

		public function __construct($names = '', $surNames = '', $phone = '', $email = '', $address = '', $id = '') {
			$this->id= $id;
			$this->surNames = $surNames;
			$this->names = $names;
			$this->phone = $phone;
			$this->email = $email;
			$this->address = $address;
		}

		public function createCustomerController() : array {
			$customer = new Customer;
			$customer->setNames($this->names)
					->setSurNames($this->surNames)
					->setPhone($this->phone)
					->setEmail($this->email)
					->setAddress($this->address);
			$customerService = new CustomerService();

			return $customerService->store($customer);
		}

		public function showCustomerController() : array {
			$customerService = new CustomerService();
			return $customerService->show();
		}

		public function updateCustomerController() : array {
			$customer = new Customer;
			$customer->setId($this->id)
					->setNames($this->surNames)
					->setSurNames($this->names)
					->setPhone($this->phone)
					->setEmail($this->email)
					->setAddress($this->address);
			$customerService = new CustomerService();

			return $customerService->update($customer);
		}

		public function deleteCustomerController() : array {
			$customerService = new CustomerService();

			return $customerService->destroy((int) $this->id);
		}
	}
	

?>