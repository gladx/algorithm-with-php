<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val)
    {
        $count = 0;

        $ti = 0;
        for($i = 0; $i < count($nums); $i++) {
            if($nums[$i] !== $val) {
                $count++;
                $nums[$ti] = $nums[$i];
                $ti++;
            }
        }

        return $count
    }

    function removeElement_v2(&$nums, $val)
    {
        for($i = 0, $l = 0; $i < count($nums); $i++) {
            if($nums[$i] !== $val) {
                $nums[$l] = $nums[$i];
                $l++;
            }
        }

        return $l;
    }
}

$solution = new Solution();

$nums = [3,2,2,3];
$val = 3;

$nums = [0,1,2,2,3,0,4,2];
$val = 2;

$result = $solution->removeElement($nums, $val);

dd($result);