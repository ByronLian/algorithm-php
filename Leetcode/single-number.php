<?php
// https://leetcode.com/problems/single-number/
// Runtime: 48 ms, faster than 72.73% of PHP online submissions for Single Number.

class Solution
{
    public function singleNumber($nums)
    {
        $len = count($nums);
        $pre_element = null;
  
        // Solution:
        // e.g [1, 4, 1, 2, 2]
        // Sort the array from small to big first
        // [1, 4, 1, 2, 2] => [1, 1, 2, 2, 4]
        // use current element compare with previous and next element
        // if previous or next element can match current element then current element is not single
        // if not then we can know current element is single
  
        sort($nums);
  
        for ($i = 0; $i < $len; $i++) {
            $current_element = $nums[$i];
            $next_element = $nums[$i + 1];
            $is_single = true;
  
            // Case [1, 2, 2]
            if ($pre_element === null && $current_element !== $next_element) {
                return $current_element;
            }
  
            // Other cases
            if ($pre_element === $current_element) {
                $is_single = false;
            }
            if ($current_element === $next_element) {
                $is_single = false;
            }
  
            $pre_element = $current_element;
  
            if ($is_single) {
                return $current_element;
            }
        }
    }
}
?>