<?php

class Solution {

    /**
     * @param Integer[] $students
     * @param Integer[] $sandwiches
     * @return Integer
     */
    function countStudents($students, $sandwiches) {
        $fail = 0;
        while(count($sandwiches) > 0) {
            if($students[0] == $sandwiches[0]) {
                array_shift($sandwiches);
                array_shift($students);
                $fail = 0;
                continue;
            }

            $students[] = array_shift($students);
            $fail++;
            if($fail == count($sandwiches)) {
                return $fail;
            }
        }

        return 0;
    }
}

// $sol = new Solution();
// $students = [1,1,0,0];
// $sandwiches = [0,1,0,1];

// $students = [1,1,1,0,0,1]; $sandwiches = [1,0,0,0,1,1];
// $r = $sol->countStudents($students, $sandwiches);

// dd($r);