<?php
// https://leetcode.com/problems/set-mismatch/
// Runtime: 84 ms, faster than 100.00% of PHP online submissions for Set Mismatch.
// Memory Usage: 16.2 MB, less than 100.00% of PHP online submissions for Set Mismatch.

class Solution {

  /*
   * @param Integer[] $nums
   * @return Integer[]
   */
  function findErrorNums($nums) {
    $len = count($nums);

    sort($nums);
  
    $duplicate_val = 0;
    $lost_val = 0;
  
    // Case when lost value is 1
    if ($nums[0] !== 1) {
      $lost_val = 1;
    }
  
    // Compare sorted elements and find the lost and duplicate element
    for ($i = 0; $i < $len - 1; $i++) {
      $current_el_val = $nums[$i];
      $next_el_val = $nums[$i + 1];
  
      if ($next_el_val - $current_el_val > 1) {
        $lost_val = $next_el_val - 1;
        if ($duplicate_val !== 0) break;
      }
  
      if ($current_el_val === $next_el_val) {
        $duplicate_val = $nums[$i];
        if ($lost_val !== 0) break;
      }
    }
  
    // Case when lost value is biggest value + 1
    if ($lost_val === 0 && $nums[0] === 1) {
      $lost_val = $nums[$len - 1] + 1;
    }
  
    return [$duplicate_val, $lost_val];
  }
}