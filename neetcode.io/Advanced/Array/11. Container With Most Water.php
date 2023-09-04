<?php
// https://leetcode.com/problems/container-with-most-water

// Brute Force O(n^2)
// Time Limit Exceeded
function maxArea($height)
{
    $count = count($height);
    $l = 0;
    $r = $count - 1;
    $max = 0;

    for ($l = 0; $l < $count; $l++) {
        for ($r = $l + 1; $r < $count; $r++) {
            $cap = min($height[$l], $height[$r]) * ($r - $l);
            $max = max($max, $cap);
        }
    }

    return $max;
}

// O(n)
function maxAreaV2($height)
{
    $count = count($height);
    $l = 0;
    $r = $count - 1;
    $max = 0;

    while ($l < $r) {
        $cap = min($height[$l], $height[$r]) * ($r - $l);
        $max = max($max, $cap);
        if ($height[$l] < $height[$r]) {
            $l++;
        } else {
            $r--;
        }
    }

    return $max;
}

function maxAreaV3($height)
{
    $count = count($height);
    $l = 0;
    $r = $count - 1;
    $max = 0;

    while ($l < $r) {
        if ($height[$l] < $height[$r]) {
            $cap = $height[$l] * ($r - $l);
            $l++;
        } else {
            $cap = $height[$r] * ($r - $l);
            $r--;
        }
        $max = max($max, $cap);
    }

    return $max;
}

// echo maxArea([1,8,6,2,5,4,8,3,7]);
echo maxArea([2, 3, 4, 5, 18, 17, 6]);
