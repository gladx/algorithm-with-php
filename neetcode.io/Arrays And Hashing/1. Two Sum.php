<?php

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
