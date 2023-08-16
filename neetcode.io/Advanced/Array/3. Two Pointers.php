<?php

// Q: palindrome

function isPalindrome($str)
{
    $l = 0;
    $r = strlen($str) - 1;

    while($l < $r) {
        if($str[$l] !== $str[$r]) {
            return false;
        }
        $r--;
        $l++;
    }

    return true;
}

// dump(isPalindrome("abcba")); // true
// dump(isPalindrome("abxcba")); // false


// Q: Given a sorted array the two indices of two elements 
// which sum up to the target value.
// Assume there's exactly one solution 
// O(n)
function targetSum($nums, $target)
{
    $l = 0;
    $r = count($nums) - 1;

    while($l < $r) {
        if (($nums[$l] + $nums[$r]) > $target) {
            $r--;
        } elseif(($nums[$l] + $nums[$r]) < $target) {
            $l++;
        } else {
            return [$l, $r];
        }
    }
}

$nums = [-2, 2, 3, 4, 8, 10];
$target = 7;
dump(targetSum($nums, $target));