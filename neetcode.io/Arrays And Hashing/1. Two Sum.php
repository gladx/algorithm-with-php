<?php

// Time = O(n^2)
function twoSum($nums, $target)
{
    $bound = count($nums);
    for ($i = 0; $i < $bound; $i++) {
        for ($j = 0; $j < $bound; $j++) {
            if ($i == $j) {
                continue;
            }

            if ($nums[$i] + $nums[$j] == $target) {
                return [$i, $j];
            }
        }
    }
}

// Time = O(n)
function twoSumV2($nums, $target)
{
    $bound = count($nums);
    $array = [];
    for ($i = 0; $i < $bound; $i++) {
        $remind = $target - $nums[$i];

        if(isset($array[$remind])) {
            return [$array[$remind], $i];
        }

        $array[$nums[$i]] = $i;
    }
}
