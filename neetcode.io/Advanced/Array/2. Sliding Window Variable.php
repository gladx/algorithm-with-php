<?php

// Find the length of the longest subarray, with the same value
// in each position 
// O(n)
function longestSubArray($nums)
{
    $count = count($nums);
    $length = 0;
    $l = 0;

    for ($r = 0; $r < $count; $r++) {
        if ($nums[$r] != $nums[$l]) {
            $l = $r;
        }
        $length = max($length, $r - $l + 1);
    }

    return $length;
}

// dump(longestSubArray([4, 2, 2, 2, 2, 3, 3, 3]));

// Q: Find the minimum length subarray, where the sum is greater than or equal 
// the largest. Assume all values are positive 
// O(n)
function shortestSubarray($nums, $target)
{
    $count = count($nums);
    $l = 0;
    $total = 0;
    $length = +INF;

    for ($r = 0; $r < $count; $r++) {
        $total += $nums[$r];
        while($total >= $target) {
            $length = min($r - $l + 1, $length);
            $total -= $nums[$l];
            $l++;
        }
    }

    return $length == INF ? 0 : $length;
}


dump(shortestSubarray([2,3,1,2,4,3], 18));