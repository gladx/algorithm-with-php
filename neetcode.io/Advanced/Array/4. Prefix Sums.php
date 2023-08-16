<?php

function prefixSum($nums): array
{
    $prefix = [];
    $total = 0;
    foreach ($nums as $num) {
        $total += $num;
        $prefix[] = $total;
    }

    return $prefix;
}

function rangeSum(&$array, $left, $right)
{
    $prefix = prefixSum($array);

    $preRight = $prefix[$right];
    $preLeft = $left > 0 ? $prefix[$left - 1] : 0;

    return ($preRight - $preLeft);
}


$arr = [2, -1, 3, -3, 4];
$res = rangeSum($arr, 4, 4);

dd($res);
