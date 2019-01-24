<?php
// https://leetcode.com/problems/search-in-rotated-sorted-array/

/*
  Solution 1:
  class Solution
  {
      public function search($nums, $target)
      {
          $result = array_search($target, $nums);
          return  $result === false ? -1 :  $result;
      }
  }
*/
/*
  Solution 2:
  class Solution
  {
      public function search($nums, $target)
      {
          for ($i=0; $i<count($nums);$i++) {
              if ($nums[$i] === $target) {
                  return $i;
              }
          }

          return -1;
      }
  }
*/

// Solution 3:
// I suggest separate search area + binary search
class Solution
{
    public function search($nums, $target)
    {
        $len = count($nums);
        $first_element = $nums[0];
        $last_element = $nums[$len - 1];
  
        // $nums: []
        if ($len === 0) {
            return -1;
        }
  
        // $nums: [1]
        if ($len === 1) {
            if ($first_element === $target) {
                return 0;
            } // $target: 1

            return -1; // $target not 1
        }
  
        // $nums: [0, 1, 2, 3, 4], ordered array
        // I use linear search O(N) here but I suggest to use binary search for ordered array O(log n)
        if ($last_element > $first_element) {
            for ($i = 0; $i < $len; $i++) {
                if ($nums[$i] === $target) {
                    return $i;
                }
            }
            return -1;
        } else {
            $min_element = $first_element;
            $max_element = $first_element;
            $min_element_idx = -1;
            $max_element_idx = -1;

            // Find the break points
            // e.g $nums: [5, 6, 7, 0, 3]
            // 7 and 0 are break points
            for ($i = 0; $i < $len; $i++) {
                if ($nums[$i] >= $max_element) {
                    $max_element = $nums[$i];
                    $max_element_idx = $i;
                }
                if ($nums[$i] <= $min_element) {
                    $min_element = $nums[$i];
                    $min_element_idx = $i;
                }
                if ($nums[$i] < $nums[$i - 1]) {
                    break;
                }
            }
  
            // $nums: [5, 6, 7, 0, 3], $target = 8 or -1
            if ($target > $max_element || $target < $min_element) {
                return -1;
            }
  
            // $nums: [5, 6, 7, 0, 3], $target = 4
            if ($target > $last_element && $target < $first_element) {
                return -1;
            }
  
            // $nums: [5, 6, 7, 0, 3], $target might be in [5, 6, 7]
            // again, we should use binary search here but I use linear search
            if ($target >= $first_element && $target <= $max_element) {
                for ($i = 0; $i <= $max_element_idx; $i++) {
                    if ($nums[$i] === $target) {
                        return $i;
                    }
                }
                return -1;
            }
  
            // $nums: [5, 6, 7, 0, 3], $target might be in [0, 3]
            // again, we should use binary search here but I use linear search
            if ($target >= $min_element && $target <= $last_element) {
                for ($i = $min_element_idx; $i < $len; $i++) {
                    if ($nums[$i] === $target) {
                        return $i;
                    }
                }
                return -1;
            }
        }
    }
}
?>