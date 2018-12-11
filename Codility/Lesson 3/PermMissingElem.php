<?php
// https://app.codility.com/programmers/lessons/3-time_complexity/perm_missing_elem/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N) or O(N * log(N))

function solution($A) {
     $len = count($A);
     $N1 = $len + 1;

    // Return 1 if no element
    // e.g []
    if ($len === 0) {
        return 1;
    }

    // Return if only one element
    // e.g [1] or [2]
    if ($len === 1) {
        if ($A[0] === 2) {
            return 1;
        } else {
            return 2;
        }
    }

    // Sorting array 
    // e.g [2, 1, 3, 5] => [1, 2, 3, 5] 
    sort($A);

    // Return if [2, 3, 4, 5 ....]
    if ($A[0] === 2) {
        return 1;
    }

    // Return if [1, 2, 3, 4... N-1]
    if ($A[$len - 1] !== $N1) {
        return $N1;
    }

    // Other cases
    // e.g 
    // [1, 2, 4, 5] => 4-2 > 1 return 3
    // [1, 3, 4, 5] => 3-1 > 1 return 2
    for ( $i = 0; $i < $len; $i++) {
         $temp = $A[$i + 1] - $A[$i];
        if ($temp > 1) {
            return $A[$i] + 1;
        }
    }
}
?>