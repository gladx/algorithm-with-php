<?php

// Worst case O(n^2) when array reversed 
// Best case O(n) when array sorted before
// Average O(n^2)
function insertionSort($arr) {
    for($i = 1; $i < count($arr); $i++) {
        $j = $i - 1;
        while($j >= 0 && $arr[$j] > $arr[$j+1]) {
            $tmp = $arr[$j];
            $arr[$j] = $arr[$j + 1];
            $arr[$j + 1] = $tmp;
            $j--;
        }
    }

    return $arr;
}

$arr = [4, 3, 7, 5, 1];

dd(insertionSort($arr));