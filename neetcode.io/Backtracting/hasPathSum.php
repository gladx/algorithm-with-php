<?php

function hasPathSum($root, $targetSum) {
    if(!$root) {
        return false;
    }

    $targetSum -= $root->val;

    if(!$root->left && !$root->right) {
        return $targetSum == 0 ? true : false;
    }

    if(hasPathSum($root->left, $targetSum)) {
        return true;
    }

    if(hasPathSum($root->right, $targetSum)) {
        return true;
    }

    $targetSum += $root->val;
    return false;
}
