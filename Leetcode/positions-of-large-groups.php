<?php
// https://leetcode.com/problems/positions-of-large-groups/
// Runtime: 40 ms, faster than 100.00% of JavaScript online submissions for Positions of Large Groups.

class Solution
{
    public function largeGroupPositions($S)
    {
        $len = strlen($S);
        $temp = $S[0];        // Current element
        $temp_start_idx = 0;  // Temp index of current element
        $count = 0;           // Count of current element so far
        $result = (array)[];
      
        // Solution:
        // Just do a for loop and calculate each element count
        for ($i=0; $i<$len; $i++) {
            print($len);
            if ($temp !== $S[$i]) {
                if ($count > 2) {
                    array_push($result, [$temp_start_idx, $i-1]);
                }
                $temp = $S[$i];
                $temp_start_idx = $i;
                $count = 1;
            } else {
                $count ++;
            }
        }
  
        // Case: "aabcdefggg" or "ggg"
        if ($count > 2) {
            array_push($result, [$temp_start_idx, $len-1]);
        }
 
        return $result;
    }
}
?>