<?php
// https://app.codility.com/programmers/lessons/6-sorting/max_product_of_three/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N*log(N))

function solution($A)
{
    $len = count($A);

    // If only 3 elements
    if ($len === 3) {
        return $A[0] * $A[1] * $A[2];
    }

    // Sort the array from smallest to biggest
    sort($A);

    // case [-4, -2, -1, 0], so the max product of three will be 0
    if ($A[$len - 1] === 0) {
        return 0;
    }

    // Solution:
    // so our idea is comparing below 2 results and return biggest one

    // for example the array after sorted : [-4, -2, -1, 1, 2, 3]
    // fst_2_min_times_max of this array: -4 * -2 * 3 = 24
    // lst_3_max of this array: 1 * 2 * 3 = 6

    // another case like [-2, -1, 1, 3, 4]
    // fst_2_min_times_max of this array: -2 * -1 * 4 = 8
    // lst_3_max of this array: 1 * 3 * 4 = 12
    $fst_2_min_times_max = $A[0] * $A[1] * $A[$len - 1];
    $lst_3_max = $A[$len - 1] * $A[$len - 2] * $A[$len - 3];

    if ($A[0] < 0 && $A[1] < 0) {
        if ($lst_3_max < $fst_2_min_times_max) {
            return $fst_2_min_times_max;
        } else {
            return $lst_3_max;
            ;
        }
    }

    // case like [-2, -1, 1, 2, 3] or [-1, 1, 2, 3]
    return $lst_3_max;
}
?>