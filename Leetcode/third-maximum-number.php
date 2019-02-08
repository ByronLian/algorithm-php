<?php
// https://leetcode.com/problems/third-maximum-number/
// Runtime: 48 ms, faster than 100.00% of PHP online submissions for Third Maximum Number.
// Memory Usage: 6.2 MB, less than 100.00% of PHP online submissions for Third Maximum Number.

class Solution
{

  /*
   * @param Integer[] $nums
   * @return Integer
   */
    public function thirdMax($nums)
    {
        // Solution 
        // Go through array and re-arrange biggest, sec max and third max element in each loop
        // return biggest when there is no third max element

        $len = count($nums);
        $minimum = -PHP_INT_MAX;
        $first = $nums[0];
        $sec = $minimum;
        $third = $minimum;
  
        for ($i = 1; $i < $len; $i++) {
            $current = $nums[$i];
  
            if ($current === $first || $current === $sec || $current === $third) {
                continue;
            }
  
            if ($current > $first) {
                $third = $sec;
                $sec = $first;
                $first = $current;
            } else {
                if ($current > $sec) {
                    $third = $sec;
                    $sec = $current;
                } else {
                    if ($current > $third) {
                        $third = $current;
                    }
                }
            }
        }
  
        return $third === $minimum ? $first : $third;
    }
}
?>