<?php
    interface QueryValidator {
        public function valuesReturned($response) : array;
        public function quantityChangesReturned($response) : array;
    }
?>