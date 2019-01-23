<?php
// https://leetcode.com/problems/merge-two-sorted-lists/
// Runtime: 16 ms, faster than 100.00% of PHP online submissions for Merge Two Sorted Lists.

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution
{
    public function mergeTwoLists($l1, $l2)
    {
        $result = new ListNode($val = 0);
        $currentHead = $result; // Pointer
  
        while (is_object($l1) && is_object($l2)) {
            if ($l1 -> val <= $l2 -> val) {
                $currentHead -> next = $l1;
                $l1 = $l1 -> next;
            } else {
                $currentHead -> next = $l2;
                $l2 = $l2 -> next;
            }
  
            $currentHead = $currentHead -> next;
        }
  
        $currentHead -> next = is_object($l1) ? $l1 : $l2;
    
        return $result -> next;
    }
}
?>