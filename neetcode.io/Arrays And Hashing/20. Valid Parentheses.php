<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $stack = [];
        for($i = 0; $i < strlen($s); $i++) {
            $ch = $s[$i];

            if($ch == ')') {
                if(array_pop($stack) != '(') {
                    return false;
                }
            } else if($ch == '}') {
                if(array_pop($stack) != '{') {
                    return false;
                }
            } else if($ch == ']') {
                if(array_pop($stack) != '[') {
                    return false;
                }
            } else {
                $stack[] = $ch;
            }
        }

        if(!empty($stack)) {
            return false;
        }

        return true;
    }
}

$sol = new Solution();

$s = '([[()([()])])';
$s = '()[]{}';

$r = $sol->isValid($s);

// dd($r);