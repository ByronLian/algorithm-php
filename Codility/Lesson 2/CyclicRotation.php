<?php
// https://app.codility.com/programmers/lessons/2-arrays/cyclic_rotation/
// Task Score: 100
// Correctness: 100
// Performance: N/A

function solution($A, $K)
{
    $len = count($A);

    // Return result if length of array A less than 1
    if ($len <= 1) {
        return $A;
    }

    // e.g
    // A = [1, 2, 3, 4]
    // K = 4
    // move element to new position:
    // 1. current element index add K will be the new index
    // 2. check new index exceed length of array A or not
    //  2-1. if not then add value with new index into new array
    //  2-2. if exceed then use 'Mod' to find the new index and add value with new index into new array

    $new_arr = [];

    for ($i = 0; $i < $len; $i++) {
        // New position if not exceed length of array A
        $new_idx = $i + $K + 1;
        if ($new_idx >= $len) {
            // New position if exceed length of array A
            $new_idx = $new_idx % $len;
            if ($new_idx === 0) {
                $new_idx = $len;
            }
        }
        $new_arr[$new_idx - 1] = $A[$i];
    }

    return $new_arr;
}
?>