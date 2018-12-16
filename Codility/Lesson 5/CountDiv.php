<?php
// https://app.codility.com/programmers/lessons/5-prefix_sums/count_div/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(1)

function solution($A, $B, $K)
{
    $addition_count = 0;
  
    if ($A % $K === 0) {
        $addition_count = 1;
    }
  
    //e.g [6, 7, 8, 9, 10, 11]
    // K = 2
    // (int)(B / K) from [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] / 2 => 5
    // (int)(A / K) from [1, 2, 3, 4, 5, 6] / 2 => 3
    // so 5 - 3 = 2 and add 1 because "6" is divisible by 2 too
    // result will be 5 - 3 + 1 for this case
    return (int)($B / $K) - (int)($A / $K) + $addition_count;
}
?>