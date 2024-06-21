<?php
    Class Sale {
        private $id, $consecutive, $quantity, $totalValue, $person, $product, $state;

        public function setId(int $id) : Sale {
            $this->id = $id;
            return $this;
        }

        public function setConsecutive(string $consecutive) : Sale {
            $this->consecutive = $consecutive;
            return $this;
        }

        public function setQuantity(int $quantity) : Sale {
            $this->quantity = $quantity;
            return $this;
        }

        public function setTotalValue(int $totalValue) : Sale {
            $this->totalValue = $totalValue;
            return $this;
        }

        public function setPerson(int $person) : Sale {
            $this->person = $person;
            return $this;
        }

        public function setProduct(int $product) : Sale {
            $this->product = $product;
            return $this;
        }

        public function setState(string $state) : Sale {
            $this->state = $state;
            return $this;
        }

        public function getId() : int {
            return (int) $this->id;
        }

        public function getConsecutive() : string {
            return $this->consecutive;
        }

        public function getQuantity() : int {
            return $this->quantity;
        }

        public function getTotalValue() : int {
            return $this->totalValue;
        }

        public function getPerson() : int {
            return $this->person;
        }

        public function getProduct() : int {
            return $this->product;
        }

        public function getState() : string {
            return $this->state;
        }
    }
?>