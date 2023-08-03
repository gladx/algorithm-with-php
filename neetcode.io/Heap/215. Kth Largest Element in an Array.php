<?php

class Solution {

    /**
     * @param int[] $nums
     * @param int $k
     * @return int
     */
    function findKthLargest($nums, $k) {
        $maxHeap = new SplMaxHeap();

        foreach($nums as $num) {
            $maxHeap->insert($num);
        }

        while($k--) {
            $max = $maxHeap->extract();
        }

        return $max;
    }
}

$s = new Solution();
$res = $s->findKthLargest([3,2,1,5,6,4], 2);

dd($res);
