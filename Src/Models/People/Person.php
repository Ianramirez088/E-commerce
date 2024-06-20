<?php
    Class Person {
        private $id, $names, $surNames, $phone, $email, $address;

        public function setId(int $id) : Person {
            $this->id = $id;
            return $this;
        }

        public function setNames(string $names) : Person {
            $this->names = $names;
            return $this;
        }

        public function setSurNames(string $surNames) : Person {
            $this->surNames = $surNames;
            return $this;
        }

        public function setPhone(string $description) : Person {
            $this->description = $description;
            return $this;
        }

        public function setEmail(string $price) : Person {
            $this->price = $price;
            return $this;
        }

        public function setAddress(string $address) : Person {
            $this->address = $address;
            return $this;
        }

        public function getId() : int {
            return (int) $this->id;
        }

        public function getNames() : string {
            return $this->category;
        }

        public function getSurNames() : string {
            return $this->name;
        }

        public function getPhone() : string {
            return $this->description;
        }

        public function getEmail() : string {
            return $this->price;
        }

        public function getAddress() : string {
            return $this->address;
        }
    }
?>