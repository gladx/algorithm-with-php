<?php

class Solution
{

    /**
     * @param int $m
     * @param int $n
     * @return int
     */
    function uniquePaths($m, $n)
    {
        $prevRow = [];
        for ($i = $m - 1; $i >= 0; $i--) {
            $curRow = [];
            for ($j = $n - 1; $j >= 0; $j--) {
                if($j == $n - 1) {
                    $curRow[$j] = 1;
                } else {
                    $curRow[$j] = ($prevRow[$j] ?? 0) + ($curRow[$j + 1] ?? 0);
                }
            }
            $prevRow = $curRow;
        }

        return $prevRow[0];
    }
}

$s = new Solution();
$res = $s->uniquePaths(3, 7);
$res = $s->uniquePaths(3, 2);

dd($res);
