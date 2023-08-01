<?php

// Q: Find the length of the shortest path from the 
// top left of the grid to the bottom right
function bfs($grid)
{
    $ROWS = count($grid);
    $COLS = count($grid[0]);

    $visit = [];
    $queue = [];

    $queue[] = [0, 0];
    $visit[0][0] = true;

    $length = 0;

    while (count($queue) > 0) {
        $queueLength = count($queue);
        for ($i = 0; $i < $queueLength; $i++) {
            $pair = array_shift($queue);
            $r = $pair[0];
            $c = $pair[1];

            if ($r == $ROWS  - 1 &&  $c = $COLS - 1) {
                return ++$length;
            }

            // four neighbors
            $neighbors = [[$r, $c + 1], [$r, $c - 1], [$r + 1, $c], [$r - 1, $c]];
            for ($j  = 0; $j < 4; $j++) {
                $newR = $neighbors[$j][0];
                $newC = $neighbors[$j][1];

                if (
                    $newR < 0 || $newC < 0 || $newR == $ROWS || $newC == $COLS
                    || isset($visit[$newR][$newC]) || $grid[$newR][$newC] == 1
                ) {
                    continue;
                }

                $queue[] = $neighbors[$j];
                $visit[$newR][$newC] = true;
            }
        }
        $length++;
    }

    return $length;
}

$grid = [
    [0, 0, 0, 0],
    [1, 1, 0, 0],
    [0, 0, 0, 1],
    [0, 1, 0, 0],
];

$visit = [];
$count = bfs($grid);

dd($count);
