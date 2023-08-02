<?php

class Solution
{
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function shortestPathBinaryMatrix($grid)
    {
        $ROWS = count($grid);
        $COLS = count($grid[0]);

        $visit = [];
        $queue = [];

        $queue[] = [0, 0];
        $visit[0][0] = true;


        if ($grid[0][0] == 1 || $grid[$ROWS - 1][$COLS - 1] == 1) {
            return -1;
        }

        $length = 1;

        while (count($queue) > 0) {
            $queueLength = count($queue);
            for ($i = 0; $i < $queueLength; $i++) {
                $pair = array_shift($queue);
                $r = $pair[0];
                $c = $pair[1];

                // printf("[%d][%d]\n", $r, $c);
                if ($r == $ROWS  - 1 &&  $c == $COLS - 1) {
                    return $length;
                }

                // four neighbors
                $neighbors = [
                    [$r, $c + 1], [$r, $c - 1], [$r + 1, $c], [$r - 1, $c],
                    [$r + 1, $c + 1], [$r + 1, $c - 1], [$r - 1, $c + 1], [$r - 1, $c - 1],
                ];
                for ($j  = 0; $j < 8; $j++) {
                    $newR = $neighbors[$j][0];
                    $newC = $neighbors[$j][1];

                    if (
                        $newR < 0 || $newC < 0 || $newR == $ROWS || $newC == $COLS
                        || isset($visit[$newR][$newC]) || $grid[$newR][$newC] == 1
                    ) {
                        continue;
                    }

                    $queue[] = $neighbors[$j];
                    // printf("Visit [%d][%d] : [%d][%d]\n", $r, $c, $newR, $newC);
                    $visit[$newR][$newC] = true;
                }
            }
            $length++;
        }

        return -1;
    }
}


$grid = [[0, 0, 0], [1, 1, 0], [1, 1, 0]]; // 4
// $grid = [[1, 0, 0], [1, 1, 0], [1, 1, 0]]; // -1
// $grid = [[0, 0, 0], [0, 1, 0], [0, 0, 0]]; // 4
$grid = [[0, 1], [1, 0]]; // 2
// $grid = 
// [[0,1,1,0,0,0] 
// ,[0,1,0,1,1,0]
// ,[0,1,1,0,1,0] // 2,3
// ,[0,0,0,1,1,0]
// ,[1,1,1,1,1,0]
// ,[1,1,1,1,1,0]]; // 14

// $grid = [[0,0,0,0,1],[1,0,0,0,0],[0,1,0,1,0],[0,0,0,1,1],[0,0,0,1,0]];

$s = new Solution();
$res = $s->shortestPathBinaryMatrix($grid);

dd($res);
