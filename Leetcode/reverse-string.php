<?php
// https://leetcode.com/problems/reverse-string/
// Runtime: 76 ms, faster than 100.00% of PHP online submissions for Reverse String.

/*
 * @param {character[]} s
 * @return {void} Do not return anything, modify s in-place instead.
 */

class Solution
{

  /**
   * @param String[] $s
   * @return NULL
   */
    function reverseString(&$s)
    {
        $len = count($s);
        $half_len = floor($len / 2);
  
        // Solution
        // use temp space and swap elements
        // e.g ["h", "e", "l", "l", "o"]
        // loop 1: swap "h" and "o"
        // loop 2: swap "e" and "l"
        // return result
    
        for ($i = 0; $i < $half_len; $i++) {
            $temp = $s[$i];
            $s[$i] = $s[$len - 1 - $i];
            $s[$len - 1 - $i] = $temp;
        }
  
        return $s;
    }
}
?>