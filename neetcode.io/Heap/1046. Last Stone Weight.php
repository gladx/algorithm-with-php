<?php

class Solution
{

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones)
    {
        $maxHeap = new SplMaxHeap();

        foreach ($stones as $w) {
            $maxHeap->insert($w);
        }

        $s1 = 0;
        $s1 = $maxHeap->extract();
        while (!$maxHeap->isEmpty()) {
            $s2 = $maxHeap->extract();

            $s1 = abs($s1 - $s2);

            if ($s1 != 0) {
                $maxHeap->insert($s1);
            }

            if(!$maxHeap->isEmpty()) {
                $s1 = $maxHeap->extract();
            }
        }

        return $s1;
    }
}

$stones = [2, 7, 4, 1, 8, 1];
// $stones = [1];
// $stones = [2, 2];
$s = new Solution();
$res =  $s->lastStoneWeight($stones);

dd($res);
