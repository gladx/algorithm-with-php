<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        $list3 = null;
        $cur = null;
        while($list1 || $list2) {
            if(!$list2 || $list1->val < $list2->val) {
                $val = $list1->val;
                $list1 = $list1->next;
            } else {
                $val = $list2->val;
                $list2 = $list2->next;
            }

            if($list3 == null) {
                $cur = $list3 = new ListNode($val);
            } else {
                $cur->next = new ListNode($val);
                $cur = $cur->next;
            }
        }

        return $list3;
    }
}