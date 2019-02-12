<?php
// Runtime: 228 ms, faster than 80.00% of PHP online submissions for Island Perimeter.
// Memory Usage: 17.2 MB, less than 100.00% of PHP online submissions for Island Perimeter.

class Solution
{
  /*
   * @param Integer[][] $grid
   * @return Integer
   */
    public function islandPerimeter($grid)
    {
        // Solution
        // Just check current element's up, down, left and right element.

        $count = 0;
        $x_len = count($grid);
        $y_len = count($grid[0]);
  
        for ($i = 0; $i < $x_len; $i++) {
            for ($j = 0; $j < $y_len; $j++) {
                if ($grid[$i][$j] === 1) {
                    $up_val = $i === 0 ? 0 : $grid[$i - 1][$j];
                    $down_val = $i === $x_len - 1 ? 0 : $grid[$i + 1][$j];
                    $left_val = $j === 0 ? 0 : $grid[$i][$j - 1];
                    $right_val = $j === $y_len - 1 ? 0 : $grid[$i][$j + 1];
  
                    if ($up_val === 0) {
                        $count++;
                    }
                    if ($down_val === 0) {
                        $count++;
                    }
                    if ($left_val === 0) {
                        $count++;
                    }
                    if ($right_val === 0) {
                        $count++;
                    }
                }
            }
        }
  
        return $count;
    }
}
?>