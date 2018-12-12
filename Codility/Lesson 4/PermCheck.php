<?php
// https://app.codility.com/programmers/lessons/4-counting_elements/perm_check/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N) or O(N * log(N))

function solution($A)
{
    $len = count($A);
    $first_el = $A[0];

    // If only one element
    if ($len === 1) {
        if ($first_el > 1) {
            return 0; // e.g A[2] case
        } else {
            return 1; // e.g A[1] case
        }
    }

    // e.g
    // A[0] = 4
    // A[1] = 1
    // A[2] = 3
    // A[3] = 2
    // sorting > A [1, 2, 3, 4]
    sort($A);

    // Reassign first element after sorted
    $first_el = $A[0];

    // e.g
    // A [1, 2, 4, 5]
    // calculate the difference between neighbor elements
    // 2 - 1 = 1 not 0 and not big than 1 so continue
    // 4 - 2 = 2 big than 1 then this array is not a permutation
    $tmp = 0;
    for ($i = 0; $i < $len; $i++) {
        $tmp = $A[$i + 1] - $A[$i];
        if ($tmp === 0 || $tmp > 1) {
            return 0;
        }
    }

    // Other cases if for-loop did not return 0
    if ($first_el === 1) {
        return 1; // e.g [1, 2, 3, 4] case
    } else {
        return 0; // e.g [2, 3, 4, 5] case
    }
}
?>