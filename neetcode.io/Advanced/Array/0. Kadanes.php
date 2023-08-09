<?php

// Q: Find a none-empty subarray with the largest sum
// Brute Force: O(n^2)
function bruteForce($nums)
{
    $maxSum = $nums[0];
    $count = count($nums);

    for ($l = 0; $l < $count; $l++) {
        $curSum = 0;
        for ($r = $l; $r < $count; $r++) {
            $curSum += $nums[$r];
            $maxSum = max($curSum, $maxSum);
        }
    }

    return $maxSum;
}

// Kadane's Algorithm: O(n)
// opedia.ir/آموزش/الگوریتم/زیر_آرایه_با_بیشینه_ی_جمع
// fa.wikipedia.org/wiki/مسئله_زیرآرایه_بیشینه
// https://wordaligned.org/articles/the-maximum-subsequence-problem
// In computer vision, maximum-subarray algorithms are used on bitmap images to detect the brightest area in an image.
function kadanes($nums)
{
    $count = count($nums);
    $maxSum = $nums[0];
    $curSum = 0;

    for ($i = 0; $i < $count; $i++) {
        $curSum = max($curSum, 0);
        $curSum += $nums[$i];
        $maxSum = max($maxSum, $curSum);
    }

    return $maxSum;
}

// Return the left and right index of the max subarray sum,
// assuming there's exactly one result (no ties).
// Sliding window variation of Kadane's: O(n)
function slidingWindow($nums)
{
    $count = count($nums);
    $maxSum = $nums[0];
    $curSum = 0;
    $l = 0; 
    $r = 0;
    $maxL = 0;
    $maxR = 0;

    for ($r = 0; $r < $count; $r++) {
        if ($curSum < 0) {
            $l = $r;
            $curSum = 0;
        }

        $curSum += $nums[$r];

        if ($curSum > $maxSum) {
            $maxL = $l;
            $maxR = $r;
            $maxSum = $curSum;
        }
    }

    return [$maxL, $maxR, $maxSum];
}


$nums = [4, -1, 2, -7, 3, 4]; // 7
$nums = [4, -1, 2, -7, 3, 1]; // 7

$nums = [-4, -2, -1, -5];

// dd(slidingWindow($nums));
// dd(kadanes($nums));
// dd(bruteForce($nums));
