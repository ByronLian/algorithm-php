<?php
// https://app.codility.com/programmers/lessons/9-maximum_slice_problem/max_slice_sum/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N)

function solution($A)
{
    $len = count($A);

    if ($len === 1) {
        return $A[0];
    }

    // Solution
    // e.g A [3, 2, -6, 4, 0]
    // so the $temp array is used to record accumulation result when we iterate the array A
    // and $max_sum is used to record highest sum so far
  
    // loop 1: $temp [3], $max_sum = 3
    // loop 2: $temp [3, 5], $max_sum = 5
    // loop 3: $temp [3, 5, -1], $max_sum = 5
    // loop 4: $temp [3, 5, -1, 4] , $max_sum = 5
    // loop 5: $temp [3, 5, -1, 4, 4], $max_sum = 5
    // return $max_sum which is 5

    $max_sum = $A[0];
    $temp = (array)[];
    $temp[0] = $A[0];

    for ($i = 1; $i < $len; $i++) {
        // Return A[i] if accumulation of previous sum and A[i] are less than A[i]
        $temp[$i] = $temp[$i - 1] + $A[$i] > $A[$i] ? $temp[$i - 1] + $A[$i] : $A[$i];

        // Update $max_sum if accumulation bigger than $max_sum
        $max_sum = $temp[$i] > $max_sum ? $temp[$i] : $max_sum;
    }

    return $max_sum;
}
