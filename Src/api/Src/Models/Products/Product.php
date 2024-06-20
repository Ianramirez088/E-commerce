<?php
    Class Product {
        private $id, $category, $name, $description, $price;

        public function setId($id) {
            $this->id = $id;
            return $this;
        }

        public function setCategory($category) {
            $this->category = $category;
            return $this;
        }

        public function setName($name) {
            $this->name = $name;
            return $this;
        }

        public function setDescription($description) {
            $this->description = $description;
            return $this;
        }

        public function setPrice($price) {
            $this->price = $price;
            return $this;
        }

        public function getId() {
            return $this->id;
        }

        public function getCategory() {
            return $this->category;
        }

        public function getName() {
            return $this->name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getPrice() {
            return $this->price;
        }
    }
?>