<?php
    require_once '../../Src/Interfaces/QueryValidator.php';

    class ReturnedQueryValidator implements QueryValidator {
        public function valuesReturned($response) : array {
            if(is_array($response) && count($response) > 0) {
                return [ 'state' => 'Successful response', 'Response' => $response ];
            } else {
                return [ 'state' => 'Bad response', 'Response' => $response ];
            }
        }

        public function quantityChangesReturned($response) : array {
            if(is_int($response) && $response > 0) {
                return [ 'state' => 'Successful response', 'Response' => $response ];
            } else {
                return [ 'state' => 'Bad response', 'Response' => $response ];
            }
        }
    }
?>