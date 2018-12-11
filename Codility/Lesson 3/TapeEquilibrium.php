<?php
// https://app.codility.com/programmers/lessons/3-time_complexity/tape_equilibrium/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N)

function solution($A) {

    // Get sum of array
    $total_arr_sum = array_sum($A);

    // Initial first element
    $first_el = $A[0];
    // Initial minimize range
    $min = abs($first_el - ($total_arr_sum - $first_el));

    // Return if minimize range equals 0
    if ($min === 0) {
        return $min;
    }

    // Initial previous_sum
    $previous_sum = $first_el;

    // e,g
    // A[0] = 3
    // A[1] = 1
    // A[2] = 2
    // A[3] = 4
    // A[4] = 3
    // P = 1, difference = |3 − 10| = 7 
    // P = 2, difference = |4 − 9| = 5 
    // P = 3, difference = |6 − 7| = 1 
    // P = 4, difference = |10 − 3| = 7 

    // take P = 1 as example 
    // the previous_sum will be 3
    // 10 will be total_arr_sum - previous_sum
    // num is abs number 
    // compare current min and num 
    // if num less than current min then update min
    // return min after loop

    $len = count($A) - 1;
    for ($i = 1; $i < $len; $i++) {
        $previous_sum += $A[$i];

        $num = abs($previous_sum - ($total_arr_sum - $previous_sum));
        if ($num < $min) {
            $min = $num;
        }

        if ($min === 0) {
            return $min;
        }
    }

    return $min;
}
?>