<?php

class Solution
{

    /**
     * @param string[][] $grid
     * @return int
     */
    function numIslands($grid)
    {

        $ROWS = count($grid);
        $COLS = count($grid[0]);
        $visit = [];
        $count = 0;

        for ($r = 0; $r < $ROWS; $r++) {
            for ($c = 0; $c < $COLS; $c++) {
                if ($grid[$r][$c] == 1 && !isset($visit[$r][$c])) {
                    $this->checkIsland($r, $c, $grid, $ROWS, $COLS, $visit);
                    $count += 1;
                }
            }
        }

        return $count;
    }

    public function checkIsland($r, $c, $grid, $ROWS, $COLS, &$visit)
    {
        if (isset($visit[$r][$c]) || $r < 0 || $c < 0 || $r == $ROWS || $c == $COLS || $grid[$r][$c] != "1") {
            return false;
        }

        $visit[$r][$c] = 1;
        $this->checkIsland($r + 1, $c, $grid, $ROWS, $COLS, $visit);
        $this->checkIsland($r - 1, $c, $grid, $ROWS, $COLS, $visit);
        $this->checkIsland($r, $c + 1, $grid, $ROWS, $COLS, $visit);
        $this->checkIsland($r, $c - 1, $grid, $ROWS, $COLS, $visit);
    }
}

$grid = [
    ["1", "1", "0", "0", "0"],
    ["1", "1", "0", "0", "0"],
    ["0", "0", "1", "0", "0"],
    ["0", "0", "0", "1", "1"]
];
$grid = [
    ["1", "1", "1", "1", "0"],
    ["1", "1", "0", "1", "0"],
    ["1", "1", "0", "0", "0"],
    ["0", "0", "0", "0", "0"]
];

$s = new Solution();
$res = $s->numIslands($grid);

dd($res);
