<?php
// https://leetcode.com/problems/hamming-distance/
// Runtime: 28 ms, faster than 100.00% of PHP online submissions for Hamming Distance.

class Solution
{
    public function hammingDistance($x, $y)
    {
        $x_binary = decbin($x); // Turn to binary (only can be use when value bigger than or 0)
        $y_binary = decbin($y); // Turn to binary (only can be use when value bigger than or 0)
        $count = 0;               // Count how many different place
        $len = strlen($x_binary);
        $x_length = strlen($x_binary);
        $y_length = strlen($y_binary);
  
        // Find the biggest len of two variable
        // Append 0 to the shorter one to make sure both variables have same length
        // e.g
        // x = 1, y = 4
        // x to binary = 1
        // y to binary = 100
        // append "00" to x
        // x = 001
        if ($x_length > $y_length) {
            $len = $x_length;
            $y_binary = str_pad($y_binary, $len, "0", STR_PAD_LEFT);
        } else {
            $len = $y_length;
            $x_binary = str_pad($x_binary, $len, "0", STR_PAD_LEFT);
        }
  
        // Check how many different place
        for ($i = $len - 1; $i >= 0; $i--) {
            if ($x_binary[$i] !== $y_binary[$i]) {
                $count++;
            }
        }

        return $count;
    }
}
?>