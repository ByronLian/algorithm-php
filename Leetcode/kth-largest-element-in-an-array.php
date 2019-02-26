<?php
// https://leetcode.com/problems/kth-largest-element-in-an-array/
// Runtime: 20 ms, faster than 100.00% of PHP online submissions for Kth Largest Element in an Array.
// Memory Usage: 16.7 MB, less than 100.00% of PHP online submissions for Kth Largest Element in an Array.

class Solution
{

  /*
   * @param Integer[] $nums
   * @param Integer $k
   * @return Integer
   */
    public function findKthLargest($nums, $k)
    {
        rsort($nums);
      
        return $nums[$k - 1];
    }
}
?>