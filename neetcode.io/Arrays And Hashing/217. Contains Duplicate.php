<?php

function containsDuplicate($numbers) {
    $check = [];
    foreach($numbers as $num) {
        if(isset($check[$num])) {
            return true;
        }
        $check[$num] = true;
    }
    
    return false;
}