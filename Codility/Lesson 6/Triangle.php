<?php
// https://app.codility.com/programmers/lessons/6-sorting/triangle/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N*log(N))

function solution($A)
{
    // Filter negative integer and sort the number
    $A = array_filter($A, function ($v) {
        return ($v > 0);
    });
    sort($A);

    $len = count($A);

    // if [1, 2]
    if ($len <= 2) {
        return 0;
    }

    // if [2, 3, 4]
    // else [1, 1, 2]
    if ($len === 3) {
        if ($A[0] + $A[1] > $A[2]) {
            return 1;
        } else {
            return 0;
        }
    }

    // Because we sorted the array so we don't need to check every combination for each element
    // for example A [1, 1, 1, 2, 3, 4]
    // we don't need to check [1, 1, 1] , [1, 1, 2] ... [1, 2, 3] , [1, 3, 4]....etc
    // all we need to check for the first 3 elements then we can know if it exist triangle or not
    for ($i = 0; $i < $len - 2; $i++) {
        $first = $A[$i];
        $sec = $A[$i + 1];
        $third = $A[$i + 2];

        if ($first + $sec > $third) {
            return 1;
        }
    }

    return 0;
}
?>