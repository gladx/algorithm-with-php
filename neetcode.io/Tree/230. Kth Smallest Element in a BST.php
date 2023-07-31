
<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    public $k = 0;
    public $result = null;
    

    /**
     * @param TreeNode $root
     * @param int $k
     * @return int
     */
    function kthSmallestV2($root, $k) {
        $stack  = [];
        $cur = $root;

        while($cur || !empty($stack)){
            while($cur) {
                $stack[] = $cur;
                $cur = $cur->left;
            }

            $cur = array_pop($stack);
            $k--;
            if($k == 0) {
                return $cur->val;
            }

            $cur = $cur->right;
        }
    }


    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($root, $k) {
        $this->k = $k;
        $this->result  = null;
        $this->inorder($root);
        return $this->result;
    }
    
    function inorder($root) {
        if(!$root || $this->result) {
            return;
        }
        
        if($root->left) {
            $this->inorder($root->left);
        }
        
        $this->k--;
        if($this->k == 0){
            $this->result = $root->val;
            return;
        }
        
        if($root->right) {
            $this->inorder($root->right);
        }
    }
}