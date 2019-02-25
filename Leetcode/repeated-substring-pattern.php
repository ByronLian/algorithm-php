<?php
// https://leetcode.com/problems/repeated-substring-pattern/
// Runtime: 68 ms, faster than 100.00% of PHP online submissions for Repeated Substring Pattern.
// Memory Usage: 14.9 MB, less than 100.00% of PHP online submissions for Repeated Substring Pattern.

class Solution
{

  /*
   * @param String $s
   * @return Boolean
   */
    public function repeatedSubstringPattern($s)
    {
        $len = strlen($s);
        if ($len === 1) {
            return false;
        }
  
        // Solution
        // The idea is repeat current substring and compare with s
        //
        // e.g s = "abab"
        // loop1: $current_sub_str = "a", $current_sub_str repeat = "aaaa", not equals s
        // loop2" $current_sub_str = "ab", $current_sub_str repeat = "abab" equals s
    
        for ($i = 0; $i < $len; $i++) {
            $current_sub_str = substr($s, 0, $i+1);
            $current_sub_str_len = $i+1;
  
            if (str_repeat($current_sub_str, $len / $current_sub_str_len) === $s) {
                return true;
            }
            if ($current_sub_str_len * 2 >= $len) {
                return false;
            }
        }
    }
}
?>