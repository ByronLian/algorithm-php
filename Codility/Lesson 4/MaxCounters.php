<?php
// https://app.codility.com/programmers/lessons/4-counting_elements/max_counters/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N + M)

function solution($N, $A)
{
    // Initial array which length is N for saving final result
    $result_arr = array_fill(0, $N, 0);
  
    // Solution:
    // what we did is using $current_big_val to save current biggest value in result array
    // we empty result array when $A[$i] === $N1 which is max counter
    // when empty result array we will add $current_big_val to $addition_val
    // so we only need to record those steps which after final max counter
    // and add $addition_val to each element

    // e.g $N = 5, $A = [3, 4, 4, 6, 1, 4, 4]
    // So $N1 = 6 and the original steps should look like below
    // (0, 0, 1, 0, 0) $A[0] !== $N1
    // (0, 0, 1, 1, 0) $A[1] !== $N1
    // (0, 0, 1, 2, 0) $A[2] !== $N1
    // (2, 2, 2, 2, 2) $A[3] === $N1, max counter
    // (3, 2, 2, 2, 2) $A[4] !== $N1
    // (3, 2, 2, 3, 2) $A[5] !== $N1
    // (3, 2, 2, 4, 2) $A[6] !== $N1

    // Our steps will be like this
    // (0, 0, 1, 0, 0) $A[0] !== $N1, $current_big_val = 1, $addition_val = 0
    // (0, 0, 1, 1, 0) $A[1] !== $N1, $current_big_val = 1, $addition_val = 0
    // (0, 0, 1, 2, 0) $A[2] !== $N1, $current_big_val = 2, $addition_val = 0
    // (0, 0, 0, 0, 0) $A[3] === $N1, max counter so empty array, $current_big_val = 0, $addition_val = 2
    // (1, 0, 0, 0, 0) $A[4] !== $N1
    // (1, 0, 0, 1, 0) $A[5] !== $N1
    // (1, 0, 0, 2, 0) $A[6] !== $N1
    // add $addition_val which is 2 to each element
    // (3, 2, 2, 4, 2)
  
    $len = count($A);
    $N1 = $N + 1;
    $current_big_val = 0;
    $addition_val = 0;
  
    for ($i = 0; $i < $len; $i++) {
        if ($A[$i] === $N1) {
            $result_arr = array();
            $addition_val += $current_big_val;
            $current_big_val = 0;
        } else {
            if (!isset($result_arr[$A[$i] - 1])) {
                $result_arr[$A[$i] - 1] = 0;
            }
        
            $result_arr[$A[$i] - 1] ++;
        
            if ($current_big_val < $result_arr[$A[$i] - 1]) {
                $current_big_val = $result_arr[$A[$i] - 1];
            }
        }
    }
 
    for ($i=0; $i<$N; $i++) {
        $result_arr[$i] = !isset($result_arr[$i]) ? $addition_val : $result_arr[$i] + $addition_val;
    }
 
    return $result_arr;
}
?>