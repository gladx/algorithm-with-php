<?php

// Average time O(n lon g)
// Worst case O(n^2)
function quickSort(&$arr, $start, $pivotIndex)
{
    if ($pivotIndex - $start + 1 <= 1) {
        return $arr;
    }

    $pivot = $arr[$pivotIndex];
    $left = $start;       // pointer for left side

    // Partition: elements smaller than $pivot on left side
    for ($i = $start; $i < $pivotIndex; $i++) {
        if ($arr[$i] < $pivot) {
            $tmp = $arr[$left];
            $arr[$left] = $arr[$i];
            $arr[$i] = $tmp;
            $left++;
        }
    }

    // Move $pivot in-between left & right sides
    $arr[$pivotIndex] = $arr[$left];
    $arr[$left] = $pivot;

    // Quick sort left side
    quickSort($arr, $start, $left - 1);

    // Quick sort right side
    quickSort($arr, $left + 1, $pivotIndex);

    return $arr;
}

$arr = [4, 3, 7, 5, 1];
$arr = [5, 2, 3, 1];

quickSort($arr, 0, count($arr) - 1);
var_dump($arr);
dd($arr);
