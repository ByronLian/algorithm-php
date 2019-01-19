<?php
// https://leetcode.com/problems/reverse-integer
// Runtime: 16 ms, faster than 100.00% of PHP online submissions for Reverse Integer.

class Solution
{
    public function reverse($x)
    {
        // The max value rule
        $MAX_VALUE = pow(2, 31);

        // Solution
        // 1. convert int to string
        $str = (string)abs($x);
        $result = "";

        // 2. add char into new string from last element of old one
        for ($i = strlen($str) - 1; $i >= 0; $i--) {
            $result .= $str[$i];
        }
        
        // 3. check the number is positive or negative
        if ($x < 0) {
            $result = 0 - (int)$result;
        } else {
            $result = (int)$result;
        }
        return ($result < -$MAX_VALUE || $result > $MAX_VALUE) ? 0 : $result;
    }
}
?>