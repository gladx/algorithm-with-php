<?php

function showBit($num)
{
    $d = 0;
    $tmp = $num;
    do {
        echo showNthBit($tmp, $d);
        $num >>= 1;
        $d++;
    } while ($num > 0);
}


function showNthBit($num, $i)
{
    return ($num >> $i & 1);
}

showBit(15);