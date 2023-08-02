<?php

class Point
{
    public $compare;
    public function __construct(private  $x, private  $y)
    {
        $this->compare = (int)($this->x**2 + $this->y**2);
    }

    public function __toString()
    {
        return (int)($this->x**2 + $this->y**2);
    }
}

class Solution
{

    /**
     * @param int[][] $points
     * @param int $k
     * @return int[][]
     */
    function kClosest($points, $k)
    {
        $minHeap = new SplMinHeap();
        $arr = []; 
        foreach($points as $point) {
            $d = (int)($point[0]**2 + $point[1]**2);
            $arr[$d][] = $point;
            $minHeap->insert($d);
        }

        $result = [];
        while($k--) {
            $d = $minHeap->extract();
            $result[] = array_pop($arr[$d]);
        }

        return $result;
    }
}


// $points = [[1, 3], [-2, 2]];
// $k = 1;
$points = [[3,3],[5,-1],[-2,4]];
$k = 2;
$points = [[1,3],[-2,2],[2,-2], [1,3]];

$s = new Solution();
$res = $s->kClosest($points, $k);

dd($res);
