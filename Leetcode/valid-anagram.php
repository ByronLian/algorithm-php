<?php
// https://leetcode.com/problems/valid-anagram/
// Runtime: 52 ms, faster than 40.00% of PHP online submissions for Valid Anagram.
// Memory Usage: 20.9 MB, less than 100.00% of PHP online submissions for Valid Anagram.

// Solution
// split string to array and sort it
// then compare element each by each

class Solution
{

  /*
   * @param String $s
   * @param String $t
   * @return Boolean
   */
    public function isAnagram($s, $t)
    {
        $new_s = str_split($s);
        sort($new_s);
      
        $new_t = str_split($t);
        sort($new_t);

        $new_s_len = count($new_s);
        $new_t_len = count($new_t);

        if ($new_s_len !== $new_t_len) {
            return false;
        }

        for ($i=0; $i<$new_s_len; $i++) {
            if ($new_s[$i] !== $new_t[$i]) {
                return false;
            }
        }

        return true;
    }
}
?>