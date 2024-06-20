<?php
    interface Crud {
        public function create(Object $product) : array;
        public function read() : array;
        public function update(Object $product) : array;
        public function delete(int $id) : array;
    }
?>