<?php
// https://app.codility.com/programmers/lessons/1-iterations/binary_gap/
// Task Score: 100
// Correctness: 100
// Performance: N/A

function solution($N)
{
    $binary_number = decbin($N);
    $binary_number_len = strlen((string) $binary_number);

    // Return when N only has one binary number
    if ($binary_number_len === 1) {
        return 0;
    }
     
    $longest_str = "1";        // For storing longest number
    $longest_str_0_count = 0;  // For storing '0' length of longest number

    $temp_str = "1";           // For storing '0' length of longest number temporarily
    $temp_0_count = 0;         // For storing longest number temporarily
  
    // e.g 1041 = 10000010001
    // start from left to right and add '0' into temp string until next 1 showup
    // compare temp string and longest string so far
    // swap if the temp string is longer then current longest string
    // return longest string
  
    for ($i = 1; $i < $binary_number_len; $i++) {
        if ($binary_number[$i] === "0") {
            $temp_str .= $binary_number[$i];
            $temp_0_count ++;
            continue;
        }

        if ($binary_number[$i] === "1") {
            if (strlen($temp_str) > strlen($longest_str)) {
                $longest_str = $temp_str;
                $longest_str_0_count = $temp_0_count;
            }
            $temp_str = "1";
            $temp_0_count = 0;
        }
    }

    return $longest_str_0_count;
}
?>