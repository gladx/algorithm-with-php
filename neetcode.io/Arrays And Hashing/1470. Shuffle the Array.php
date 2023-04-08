<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer[]
     */
    function shuffle($nums, $n) {
        $shuffledArray = [];
        $mid = $n;

        for($i = 0, $j = $mid; $i < $mid; $i++, $j++){
            $shuffledArray[] = $nums[$i];
            $shuffledArray[] = $nums[$j];
        }

        return $shuffledArray;
    }

    function shuffle_v2($nums, $n) {
        $array = [];
        
        foreach($nums as $key => $num) {
            if($key < $n) {
                continue;
            }
            $array[] = $nums[$key - $n];
            $array[] = $num;
        }
        return $array;
    }
}

$s = new Solution();

$nums = [2,5,1,3,4,7];
        [2,3,5,4,1,7];
$n = 3;

$nums = [1,2,3,4,4,3,2,1]; $n = 4;

$r = $s->shuffle($nums, $n);

dd($r);