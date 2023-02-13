<?php

function isAnagram($s, $t)
{
    $sArray = [];
    $tArray = [];

    if (strlen($s) != strlen($t)) {
        return false;
    }

    for ($i = 0; $i < strlen($s); $i++) {
        if (!isset($sArray[$s[$i]])) {
            $sArray[$s[$i]] = 1;
        } else {
            $sArray[$s[$i]]++;
        }

        if (!isset($tArray[$t[$i]])) {
            $tArray[$t[$i]] = 1;
        } else {
            $tArray[$t[$i]]++;
        }
    }

    for ($i = 0; $i < strlen($t); $i++) {
        if (!isset($sArray[$t[$i]]) || !isset($tArray[$t[$i]]) || $tArray[$t[$i]] != $sArray[$t[$i]]) {
            return false;
        }
    }

    return true;
}

$s = "anagram";
$t = "nagaram";

// $s = "aacc";
// $t = "ccac";

$r = isAnagram($s, $t);

// T = O(n) // O(s + t)
// S = 2n
