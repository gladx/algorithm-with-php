<?php

# Q: Given an array, return true
# if there are two elements within a window of size k that are equal

/**
 * Check if  array contains a pair of duplicate values, 
 * where the two duplicates are no farther than k positions from
 * each other (i.e arr[i] == arr[j] and abs(i - j) <= k).
 * O(n * k)
 */
function closeDuplicatesBruteForce($nums, $k)
{
    $count = count($nums);
    for ($l = 0; $l < $count; $l++) {
        for ($r = $l + 1; $r < min($count, $l + $k); $r++) {
            if ($nums[$l] == $nums[$r]) {
                return true;
            } 
        }
    }

    return false;
}

// Same problem using sliding window.
// O(n)
function closeDuplicates($nums, $k) {
    $count = count($nums);

    $curWindow = []; // current window off size <= k
    $l = 0;

    for($r = 0; $r < $count; $r++) {
        if(($r - $l) > $k) {
            // unset($curWindow[$nums[$l]]);
            array_shift($curWindow);
            $l += 1;
        }
        if(isset($curWindow[$nums[$r]])) {
            return true;
        }

        $curWindow[(string)$nums[$r]] = true;
    }

    return false;
}

$nums = [1, 2, 3, 4, 2, 3, 4];

// dump(closeDuplicatesBruteForce($nums, 2));
// dump(closeDuplicates($nums, 2));
// dump(closeDuplicates([4,1,2,3,1,5], 3)); // true
dump(closeDuplicates([1,2,3,1,2,3], 2)); // false