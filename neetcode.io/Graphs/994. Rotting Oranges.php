<?php

class Solution
{
    /**
     * @param int[][] $grid
     * @return int
     */
    function orangesRotting($grid)
    {
        $ROWS = count($grid);
        $COLS = count($grid[0]);

        $rottenOrangesVisit = [];
        $rottenOrangesList = [];
        $freshOrange = [];
        $elapsed = 0;
        $freshCount = 0;

        for ($r = 0; $r < $ROWS; $r++) {
            for ($c = 0; $c < $COLS; $c++) {
                if ($grid[$r][$c] == 2) {
                    $rottenOrangesList[] = [$r, $c];
                } elseif ($grid[$r][$c] == 1) {
                    $freshCount++;
                }
            }
        }

        while (count($rottenOrangesList) > 0) {
            $list = $rottenOrangesList;
            $rottenOrangesList = [];
            $isRottenNew = false;
            while (count($list) > 0) {
                [$r, $c] = array_shift($list);
                $rottenOrangesVisit[$r][$c] = true;
                $result = $this->doRottenNext($r, $c, $ROWS, $COLS, $grid, $rottenOrangesVisit, $rottenOrangesList, $freshCount, $elapsed);
                $isRottenNew = $result || $isRottenNew;
            }

            if ($isRottenNew == true) {
                $elapsed++;
            }
        }

        if ($freshCount > 0) {
            return -1;
        }

        return $elapsed;
    }

    private function doRottenNext($r, $c, $ROWS, $COLS, &$grid, &$rottenOrangesVisit, &$rottenOrangesList, &$freshCount, &$elapsed)
    {
        $neighbors = [[0, 1], [0, -1], [1, 0], [-1, 0]];

        $isRottenNew = false;

        foreach ($neighbors as $n) {
            if (($n[0] + $r) < 0 || ($n[1] + $c) < 0 || ($n[0] + $r) == $ROWS || ($n[1] + $c) == $COLS || isset($rottenOrangesVisit[$n[0] + $r][$n[1] + $c]) || $grid[$n[0] + $r][$n[1] + $c] != "1") {
                continue;
            }

            $rottenOrangesList[] = [$n[0] + $r, $n[1] + $c];
            $grid[$n[0] + $r][$n[1] + $c] = "2";
            $freshCount--;
            $isRottenNew = true;
        }

        return $isRottenNew;
    }
}

$grid = [
    [2, 1, 1],
    [1, 1, 0],
    [0, 1, 1]
]; // 4

// $grid =  [
//     [2, 1, 1],
//     [0, 1, 1],
//     [1, 0, 1]
// ];

$s = new Solution();
$res = $s->orangesRotting($grid);

dd($res);
