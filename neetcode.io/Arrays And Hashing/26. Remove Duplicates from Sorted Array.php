<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        $j = 0;
        $count = count($nums);
        for ($i = 1; $i < $count; $i++) {
            if ($nums[$i] != $nums[$j]) {
                $j++;
                $nums[$j] = $nums[$i];
            }
        }

        $k = $j + 1;

        for ($j = $j + 1; $j < $count; $j++) {
            unset($nums[$j]);
        }

        return $k;
    }

    function removeDuplicates_v2(&$nums)
    {
        $count = count($nums);
        for ($l = 0, $r = 1; $r < $count; $r++) {
            if ($nums[$l] != $nums[$r]) {
                $l++;
                $nums[$l] = $nums[$r];
            }
        }

        return $l + 1;
    }


    function removeDuplicates_v3(&$nums)
    {
        $count = count($nums);
        for ($l = 1, $r = 1; $r < $count; $r++) {
            if ($nums[$r] != $nums[$r - 1]) {
                $nums[$l] = $nums[$r];
                $l++;
            }
        }

        return $l;
    }
}