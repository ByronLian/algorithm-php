<?php
// https://app.codility.com/programmers/lessons/3-time_complexity/frog_jmp/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(1)

function solution($X, $Y, $D)
{
    // If no need to move
    if ($X === $Y) {
        return 0;
    }
  
    // If only need one move
    if ($Y - $X <= $D) {
        return 1;
    }
  
    // Other cases
    return (int)ceil(($Y - $X) / $D);
}
?>