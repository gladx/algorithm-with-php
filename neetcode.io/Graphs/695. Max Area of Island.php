<?php

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland($grid)
    {
        $ROWS = count($grid);
        $COLS = count($grid[0]);

        $visit = [];
        $max = 0;

        for ($r = 0; $r < $ROWS; $r++) {
            for ($c = 0; $c < $COLS; $c++) {
                if ($grid[$r][$c] == 1 && !isset($visit[$r][$c])) {
                    $max = max($max, $this->markIsland($grid, $r, $c, $ROWS, $COLS, $visit));
                }
            }
        }

        return $max;
    }

    private function markIsland($grid, $r, $c, $ROWS, $COLS, &$visit)
    {
        $count = 0;
        if ($r < 0 || $c < 0 || $r == $ROWS || $c == $COLS || isset($visit[$r][$c]) || $grid[$r][$c] == "0") {
            return 0;
        }

        $count++;
        $visit[$r][$c] = true;
        return 1 + $this->markIsland($grid, $r + 1, $c, $ROWS, $COLS, $visit) +
        $this->markIsland($grid, $r - 1, $c, $ROWS, $COLS, $visit) +
        $this->markIsland($grid, $r, $c + 1, $ROWS, $COLS, $visit) +
        $this->markIsland($grid, $r, $c - 1, $ROWS, $COLS, $visit);
    }
}

$grid = [
    [0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0],
    [0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 0],
    [0, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0]
]; // 6

$grid = [[0, 0, 0, 0, 0, 0, 0, 0]]; // 0

$grid = [
    [1, 1, 0, 0, 0],
    [1, 1, 0, 0, 0],
    [0, 0, 0, 1, 1],
    [0, 0, 0, 1, 1]
]; // 4

$s = new Solution();
$res = $s->maxAreaOfIsland($grid);

dd($res);
