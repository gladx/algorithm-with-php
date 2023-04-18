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

class ListNode
{
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head)
    {
        $prev = $head;
        while ($head != null) {
            $next = $head->next;

            if ($prev == $head) {
                $prev->next = null;
            } else {
                $head->next = $prev;
                $prev = $head;
            }

            $head = $next;
        }

        return $prev;
    }

    function reverseListV2($head)
    {
        $prev = null;
        while ($head != null) {
            $next = $head->next;
            $head->next = $prev;
            $prev = $head;
            $head = $next;
        }

        return $prev;
    }

    function reverseListV3($head)
    {
        if ($head == null) {
            return null;
        }

        $new = $head;
        if ($head->next) {
            $new = $this->reverseListV3($head->next);
            $head->next->next = $head;
            $head->next = null;
        }

        return $new;
    }

    function reverseListV4($head) {
        if ($head == null || $head->next == null) {
            return $head;
        }

        $p = $this->reverseListV4($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $p;
    }
}