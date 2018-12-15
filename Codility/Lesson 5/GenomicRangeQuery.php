<?php
// https://app.codility.com/programmers/lessons/5-prefix_sums/genomic_range_query/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N + M)

function solution($S, $P, $Q)
{
    $result_arr = [];
    $len = count($P);

    for ($i = 0; $i < $len; $i++) {
        // Find the substring
        // if       => case $P[0] $Q[0]
        // else if  => case $P[5] $Q[5]
        // else     => case $P[2] $Q[5]
        if ($Q[$i] - $P[$i] === 0 && $Q[$i] === 0) {
            $seq = $S[0];
        } else  if ($Q[$i] - $P[$i] === 0 && $Q[$i] !== 0){
            $seq = substr($S, $P[$i], 1);
        } else {
            $seq = substr($S, $P[$i], $Q[$i] - $P[$i] + 1);
        }
      
        // Solution:
        // We get the substring for each round
        // and find the specific char from that substring by sequence A, C, G, T
        
        // For now (2018/12/16), strchr is still the best efficient way to find char from a string    
        if (strchr($seq, 'A') !== false) {
            $result_arr[count($result_arr)] = 1;
        } 
        elseif (strchr($seq, 'C') !== false) {
            $result_arr[count($result_arr)] = 2;
        } 
        elseif (strchr($seq, 'G') !== false) {
            $result_arr[count($result_arr)] = 3;
        } 
        else {
            $result_arr[count($result_arr)] = 4;
        }
    }
  
    return $result_arr;
}
