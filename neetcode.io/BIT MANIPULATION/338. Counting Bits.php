<?php

function countBits($n) {
    $ans = [];

    for($i = 0; $i <= $n; $i++) {
        if($i == 0) {
            $ans[0] = 0;
        } else if($i == 1) {
            $ans[1] = 1;
        }

        $count = 0;
        $num = $i;
        while($num > 0) {
            $mod = $num % 2;
            if($mod == 1) {
                $count++;
            }

            $num = intdiv($num, 2);

            if(isset($ans[$num])) {
                $count += $ans[$num];
                break;
            }
        } 
        $ans[$i] = $count;
    }

    return $ans;
}


$ans = countBits(2);

dd($ans);