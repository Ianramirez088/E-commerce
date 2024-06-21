<?php
    Class Customer {
        private $id, $names, $surNames, $phone, $email, $address;

        public function setId(int $id) : Customer {
            $this->id = $id;
            return $this;
        }

        public function setNames(string $names) : Customer {
            $this->names = $names;
            return $this;
        }

        public function setSurNames(string $surNames) : Customer {
            $this->surNames = $surNames;
            return $this;
        }

        public function setPhone(string $description) : Customer {
            $this->description = $description;
            return $this;
        }

        public function setEmail(string $price) : Customer {
            $this->price = $price;
            return $this;
        }

        public function setAddress(string $address) : Customer {
            $this->address = $address;
            return $this;
        }

        public function getId() : int {
            return (int) $this->id;
        }

        public function getNames() : string {
            return $this->names;
        }

        public function getSurNames() : string {
            return $this->surNames;
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