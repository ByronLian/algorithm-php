<?php
// https://leetcode.com/problems/palindrome-number/
// Runtime: 92 ms, faster than 88.00% of PHP online submissions for Palindrome Number.

/*
 * @param {number} x
 * @return {boolean}
 */

// Solution
// 1. convert integer to string
// 2. compare the char of string from both left and right side
// 3. if any of them is not equals to each other then return false
// 4. if all of them are equal to each other after loop, then return true

class Solution
{
    public function isPalindrome($x)
    {
        if ($x < 0) {
            return false;
        }

        $x_str = (string)$x;
        $x_str_length = strlen($x_str);
        $len = $x_str_length / 2;

        for ($i = 0; $i < $len; $i++) {
            $left = $x_str[$i];
            $right = $x_str[$x_str_length - $i - 1];
  
            if ($left !== $right) {
                return false;
            }
        }
  
        return true;
    }
}
?>