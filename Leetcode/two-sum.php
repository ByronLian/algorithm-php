<?php
// https://leetcode.com/problems/two-sum/
// Runtime: 16 ms, faster than 100.00% of PHP online submissions for Two Sum.

// Solution
// use a object hash to record data and data index
//
// e.g.
// $nums: [2, 5, 7, 11]
// $target: 9
//
// loop 1: 9-2 = 7, $hash ={}, not found so continue
// loop 2: 9-5 = 4, $hash ={2:0}, not found so continue
// loop 3: 9-7 = 2, $hash ={2:0, 5:1}, found "2" so return [0, 2]

class Solution
{
    public function twoSum($nums, $target)
    {
        $hash = (object)[];
        $len = count($nums);
    
        for ($i = 0; $i < $len; $i++) {
            $temp = $target - $nums[$i];

            if (property_exists($hash, $temp)) {
                return [$hash -> $temp, $i];
            } else {
                $temp = $nums[$i];
                $hash -> $temp = $i;
            }
        }
    
        return [-1, -1]; // Can't find match
    }
}
?>