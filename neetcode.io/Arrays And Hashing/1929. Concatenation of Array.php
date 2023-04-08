<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function getConcatenation($nums) {
        foreach($nums as $num) {
            $nums[] = $num;
        }

        return $nums;
    }
}

$s = new Solution();

$nums = [1,2,3];
$r = $s->getConcatenation($nums);

dd($r);