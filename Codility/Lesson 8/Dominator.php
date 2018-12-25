<?php
// https://app.codility.com/programmers/lessons/8-leader/dominator/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N*log(N)) or O(N)

function solution($A)
{
    $len = count($A);
    $storage = (object)[];
    $max_el = 0;
    $max_count = 0;

    if ($len === 0) {
        return -1;
    }

    if ($len === 1) {
        return 0;
    }

    // Solution
    // we used an object($storage) to save every total count of each different number
    // $max_el is used to save element which has highest number so far
    // e.g array A [3, 4, 3, -1, 3]
    // loop 1: $storage { '3' : [0] }, $max_el = 3
    // loop 2: $storage { '3' : [0], '4' : [1] }, $max_el = 3
    // loop 3: $storage { '3' : [0, 2], '4' : [1] }, $max_el = 3
    // loop 4: $storage { '3' : [0, 2], '4' : [1], '-1' : [3] }, $max_el = 3
    // loop 5: $storage { '3' : [0, 2, 4], '4' : [1], '-1' : [3] }, $max_el = 3
    // check if max element's count over half of array then return max element array index
    // if not then return -1
    // in this case we should return [0, 2, 4]

    for ($i = 0; $i < $len; $i++) {
        $el = $A[$i];

        if (!property_exists($storage, $el)) {
            $storage -> $el = [];
            array_push($storage -> $el, $i);
        } else {
            array_push($storage -> $el, $i);
        }

        if (count($storage -> $el) > $max_count) {
            $max_el = $el;
            $max_count = count($storage -> $el);
        }
    }

    // If every element has equal count , e.g [1, 2, 3] or [-1, -2, 1]
    if ($max_count === 1) {
        return -1;
    }

    // Check if max element's count over half array or not
    if (count($storage -> $max_el) / $len <= 0.5) {
        return -1;
    }
    
    return $storage -> $max_el[0];
}
?>