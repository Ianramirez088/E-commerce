<?php
	require_once '../../Src/Models/People/Person.php';
	require_once '../../Src/Services/People/PersonService.php';

	class PersonController
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

		public function createPersonController() : array {
			$person = new Person;
			$person->setNames($this->names)
					->setSurNames($this->surNames)
					->setPhone($this->phone)
					->setEmail($this->email)
					->setAddress($this->address);
			$personService = new PersonService();

			return $personService->store($person);
		}

		public function showPersonController() : array {
			$personService = new PersonService();
			return $personService->show();
		}

		public function updatePersonController() : array {
			$person = new Person;
			$person->setId($this->id)
					->setNames($this->surNames)
					->setSurNames($this->names)
					->setPhone($this->phone)
					->setEmail($this->email)
					->setAddress($this->address);
			$personService = new PersonService();

			return $personService->update($person);
		}

		public function deletePersonController() : array {
			$personService = new PersonService();

			return $personService->destroy((int) $this->id);
		}
	}
	

?>