<?php
// https://app.codility.com/programmers/lessons/10-prime_and_composite_numbers/count_factors/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(sqrt(N))

function solution($N)
{
    // Solution
    // e.g 24
    // sqrt = 4.898979485566356
    // loop 1: 24 % 1 === 0, means N has two factors which is 24 and 1. $count += 2
    // loop 2: 24 % 2 === 0, means N has two factors which is 12 and 2. $count += 2
    // loop 3: 24 % 3 !== 0
    // loop 4: 24 % 4 === 0, means N has two factors which is 6 and 4. $count += 2
    // loop finished
    // i = 4, 4 * 4 !== N means N is not perfect square number so no need to add $count
    // return $count

    $count = 0;
    $i = 1;
    $sqrt = sqrt($N);

    for (; $i < $sqrt; $i++) {
        if ($N % $i == 0) {
            $count += 2;
        }
    }

    if ($i * $i === $N) {
        $count++;
    }

    return $count;
}
?>