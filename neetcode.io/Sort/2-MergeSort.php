<?php

// O(n log n)
function mergeSort(&$arr, $l, $r)
{
    if ($l >= $r) {
        return $arr;
    }

    $mid = intdiv($l + $r, 2);
    mergeSort($arr, $l, $mid);
    mergeSort($arr, $mid + 1, $r);
    merge($arr, $l, $mid, $r);
}

function merge(&$arr, $l, $mid, $r)
{
    $lenSubArray1 = $mid - $l + 1;
    $lenSubArray2 = $r - $mid;

    $leftArray = [];
    $rightArray = [];

    for ($i = 0; $i < $lenSubArray1; $i++) {
        $leftArray[$i] = $arr[$l + $i];
    }

    for ($i = 0; $i < $lenSubArray2; $i++) {
        $rightArray[$i] = $arr[$mid + 1 + $i];
    }

    $i = 0;
    $j = 0;
    $k = $l;

    while ($i < $lenSubArray1 && $j < $lenSubArray2) {
        if ($leftArray[$i] <= $rightArray[$j]) {
            $arr[$k] = $leftArray[$i];
            $i++;
        } else {
            $arr[$k] = $rightArray[$j];
            $j++;
        }
        $k++;
    }

    while ($i < $lenSubArray1) {
        $arr[$k] = $leftArray[$i];
        $i++;
        $k++;
    }

    while ($j < $lenSubArray2) {
        $arr[$k] = $rightArray[$j];
        $j++;
        $k++;
    }
}


$arr = [4, 3, 7, 5, 1];

mergeSort($arr, 0, count($arr) - 1);

dd($arr);