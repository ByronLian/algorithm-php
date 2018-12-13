<?php
// https://app.codility.com/programmers/lessons/4-counting_elements/missing_integer/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N) or O(N * log(N))

function solution($A)
{
    $len = count($A);
    $first_el = $A[0];
  
    // [-1] or [2] or [1]
    if ($len === 1) {
        if ($first_el <= 0 || $first_el > 1) {
            return 1;
        }
        if ($first_el === 1) {
            return 2;
        }
    }

    // Because the question is finding missing smallest positive integer
    // so we only need to focus positive number
    $new_arr = array_filter($A, function ($v) {
        return ($v > 0);
    });
    sort($new_arr);
  
    $new_arr_len = count($new_arr);

    // This array only contain negative integer so length is 0 after filtered
    if ($new_arr_len === 0) {
        return 1;
    }

    // From array A [-1, -3, 2, -2, 3, 5] to array $new_arr [2, 3, 5]
    // From array A [-1, -3, 2, -2] to array $new_arr [2]
    if ($new_arr[0] > 1) {
        return 1;
    }

    // From array A [-1, -3, 1, -2] to array $new_arr [1]
    if ($new_arr_len === 1 && $new_arr[0] === 1) {
        return 2;
    }

    // From array A [2, 1, 3, 4, 6] to array $new_arr [1, 2, 3, 4, 6]
    for ($i = 1; $i < $new_arr_len; $i++) {
        $temp = $new_arr[$i] - $new_arr[$i - 1];
        if ($temp > 1) {
            return $new_arr[$i - 1] + 1;
        }
    }

    // case [1, 2, 3, 4]
    $first_el = $new_arr[0];
    if ($first_el === 1) {
        return $new_arr[$new_arr_len - 1] + 1;
    }
}
?>
 