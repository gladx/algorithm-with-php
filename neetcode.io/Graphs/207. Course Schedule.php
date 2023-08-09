<?php

class Solution
{

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    function canFinish($numCourses, $prerequisites)
    {
        $preMap = [];
        $visit = [];

        foreach ($prerequisites as $p) {
            $preMap[$p[0]][] = $p[1];
        }


        foreach (array_keys($preMap) as $course) {
            if ($this->dfs($course, $preMap, $visit) != true) {
                return false;
            }
        }

        return true;
    }

    private function dfs($course, &$preMap, &$visit)
    {
        if (empty($preMap[$course])) {
            return true;
        }

        if (isset($visit[$course])) {
            return false;
        }

        $visit[$course] = true;

        foreach ($preMap[$course] as $crs) {
            if ($this->dfs($crs, $preMap, $visit) != true) {
                return false;
            }
        }

        unset($visit[$course]);
        $preMap[$course] = [];

        return true;
    }
}

$numCourses = 2;
// $prerequisites = [[1, 0]];
// $prerequisites = [[1, 0], [0,1]];
$prerequisites = [[1, 0]];

$s = new Solution();
$res = $s->canFinish($numCourses, $prerequisites);
dd($res);
