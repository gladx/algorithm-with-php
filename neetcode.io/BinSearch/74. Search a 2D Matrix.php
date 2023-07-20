<?php

class Solution
{

    public $m;
    public $n;
    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target)
    {
        $m = count($matrix);
        $n = count($matrix[0]);

        $this->m = $m;
        $this->n = $n;

        return $this->binSearch($matrix, $target, 0, ($m * $n) - 1);
    }

    function binSearch($matrix, $target, $start, $end)
    {
        if ($start > $end) {
            return false;
        }

        $mid = (int)(($start + $end) / 2);

        $indexM = (int)($mid / $this->n);
        $indexN = (int)($mid % $this->n);

        if ($matrix[$indexM][$indexN] == $target) {
            return true;
        }


        if ($matrix[$indexM][$indexN] > $target) {
            return $this->binSearch($matrix, $target, $start, $mid - 1);
        }

        return $this->binSearch($matrix, $target, $mid + 1, $end);
    }
}


$s = new Solution();

$r = $s->searchMatrix([[-8,-7],[-5,-5]], 0);

var_dump($r);