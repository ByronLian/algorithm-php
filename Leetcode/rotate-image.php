<?php
// https://leetcode.com/problems/rotate-image/
// Runtime: 12 ms, faster than 100.00% of PHP online submissions for Rotate Image.

class Solution
{
    public function rotate(&$matrix)
    {
        $n = count($matrix);
        $j = 0;
        $temp = (array)[];
  
        // Solution:
        // My way is pick up element into $temp array and modify $matrix

        // Pick up element into array
        while ($j < $n) {
            for ($i=$n-1; $i>=0; $i--) {
                array_push($temp, $matrix[$i][$j]);
            }
            $j++;
        }
  
        // Modify $matrix
        for ($i=0; $i<$n; $i++) {
            for ($j=0; $j<$n; $j++) {
                $matrix[$i][$j] = array_shift($temp);
            }
        }
  
        return $matrix;
    }
}
?>