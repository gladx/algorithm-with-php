<?php

class Solution {

    /**
     * @param String[] $operations
     * @return Integer
     */
    function calPoints($operations) {
        $records = [];
        foreach($operations as $operation) {
            switch($operation) {
                case 'C':
                    array_pop($records);
                    break;
                case 'D':
                    $doubleValue = $records[count($records) - 1] * 2;
                    $records[] = $doubleValue;
                    break;
                case '+':
                    $newRecord = $records[count($records) - 1] + $records[count($records) - 2];
                    $records[] = $newRecord;
                    break;
                default:
                    $records[] = $operation;
            }
        }

        return array_sum($records);
    }
}

$s = new Solution();
$operations = ["5","2","C","D","+"];

$r = $s->calPoints($operations);

// dd($r);

