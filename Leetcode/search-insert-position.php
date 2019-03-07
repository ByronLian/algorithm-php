<?php
// https://leetcode.com/problems/search-insert-position/
// Runtime: 12 ms, faster than 100.00% of PHP online submissions for Search Insert Position.
// Memory Usage: 15.8 MB, less than 75.00% of PHP online submissions for Search Insert Position.

// TO-DO use binary search

class Solution
{

  /*
   * @param Integer[] $nums
   * @param Integer $target
   * @return Integer
   */
    public function searchInsert($nums, $target)
    {
        $len = count($nums);
  
        if ($target < $nums[0]) {
            return 0;
        }
        if ($target > $nums[$len - 1]) {
            return $len;
        }
        if (array_search($target, $nums) !== false) {
            return array_search($target, $nums);
        }

        for ($i = 0; $i < $len; $i++) {
            if ($nums[$i] > $target && $nums[$i - 1] < $target) {
                return $i;
            }
        }
    }
}
?>