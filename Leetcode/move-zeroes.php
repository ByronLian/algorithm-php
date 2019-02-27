<?php
// https://leetcode.com/problems/move-zeroes/
// Runtime: 72 ms, faster than 36.36% of PHP online submissions for Move Zeroes.
// Memory Usage: 18.5 MB, less than 25.00% of PHP online submissions for Move Zeroes.

class Solution
{

  /**
   * @param Integer[] $nums
   * @return NULL
   */
    public function moveZeroes(&$nums)
    {
        $len = count($nums);
        $i = 0;
    
        // Solution
        // The idea is remove 0 and add new one to last when we found 0
        while ($i < $len) {
            if ($nums[$i] === 0) {
                array_splice($nums, $i, 1);
                array_push($nums, 0);
                $len--;
            } else {
                $i++;
            }
        }
    }
}
?>