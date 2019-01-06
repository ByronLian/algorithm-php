<?php
// https://app.codility.com/programmers/lessons/10-prime_and_composite_numbers/min_perimeter_rectangle/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(sqrt(N))

function solution($N)
{
    if ($N === 1) {
        return 4;
    }

    // Solution
    // almost same with CountFactors
    // if we want to find the minimum side length (2 factors)
    // we need to find the closest 2 factors which can have product 30
    // for example 30 has below factors 1, 2, 3, 5, 6, 10, 15, 30
    // factor 5 and factor 6 are the most closest and their product is 30

    $i = 1;
    $sqrt = sqrt($N);
    $factor_a = 0;

    for (; $i < $sqrt; $i++) {
        if ($N % $i === 0) {
            $factor_a = $i;
        }
    }

    // when N is perfect square number
    if ($i * $i === $N) {
        return $i * 4;
    }

    $factor_b = $N / $factor_a;

    return ($factor_a + $factor_b) * 2;
}
?>