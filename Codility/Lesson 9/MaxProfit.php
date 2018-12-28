<?php
// https://app.codility.com/programmers/lessons/9-maximum_slice_problem/max_profit/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N)

function solution($A)
{
    $len = count($A);
    $max_profit = 0;
    $lowest_price = $A[0];

    // Solution
    // so the idea is you want to get the biggest profit you need to buy it at the lowest price
    // lowest_price = the lowest price so far
    // current_profit = current price - lowest_price
    // all we have to do is make sure lowest_price is the smallest price
  
    // e.g [2, 4, 5, 3, 10]
    // loop 1: lowest_price = 2, current_profit = 2, max_profit = 2
    // loop 2: lowest_price = 2, current_profit = 3, max_profit = 3
    // loop 3: lowest_price = 2, current_profit = 1, max_profit = 3
    // loop 4: lowest_price = 2, current_profit = 8, max_profit = 8
    // return max_profit = 8

    for ($i = 1; $i < $len; $i++) {
        if ($lowest_price > $A[$i]) {
            $lowest_price = $A[$i];
        } else {
            $current_profit = $A[$i] - $lowest_price;
            if ($current_profit > $max_profit) {
                $max_profit = $current_profit;
            }
        }
    }

    return $max_profit;
}
?>