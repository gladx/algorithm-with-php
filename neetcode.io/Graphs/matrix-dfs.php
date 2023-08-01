<?php

// Count paths (backtracking)
// Q: count the unique paths from the top to the bottom right. A single path 
// may only move along 0's and can't visit the same cell more than once

function dfs($grid, $r, $c, &$visit)
{
    printf("[%d][%d]", $r, $c);
    echo "\n";
    $ROWS = count($grid);
    $COLS = count($grid[0]);

    if ($r == $ROWS - 1 && $c == $COLS - 1) {
        return 1;
    }

    if (
        $r < 0 || $c < 0 || $r == $ROWS || $c == $COLS
        || isset($visit[$r][$c]) || $grid[$r][$c] == 1
    ) {
        return 0;
    }

    

    $visit[$r][$c] = 1;
    printf("Visit [%d][%d] => v: %d\n", $r, $c, $grid[$r][$c]);
    echo "\n";
    $count = 0;

    $count += dfs($grid, $r + 1, $c, $visit);
    $count += dfs($grid, $r - 1, $c, $visit);
    $count += dfs($grid, $r, $c + 1, $visit);
    $count += dfs($grid, $r, $c - 1, $visit);

    unset($visit[$r][$c]);

    return $count;
}

$grid = [
    [0, 0, 0, 0],
    [1, 1, 0, 0],
    [0, 0, 0, 1],
    [0, 1, 0, 1],
];

$grid = [
    [0, 0, 0, 0],
    [1, 1, 0, 1],
    [0, 0, 0, 1],
    [0, 1, 0, 1],
];
$grid = [
    [0, 0, 0, 0],
    [1, 1, 0, 1],
    [0, 0, 0, 1],
    [0, 1, 1, 1],
];

$visit = [];
$count = dfs($grid, 0, 0, $visit);

dd($count);