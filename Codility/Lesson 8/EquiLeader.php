<?php
// https://app.codility.com/programmers/lessons/8-leader/equi_leader/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N)

function solution($A)
{
    // Solution
    // so we find the leader of array $A first
    // $leader = find_leader($A);
    // $leader[0] = Leader element of array
    // $leader[1] = Leader element total number
    // then we iterate the array and use $current_leader_count to record
    // how many Leader element we found so far
    // $remain_leader_count means how many Leader element remain in the rest array
    // then we calculate both side to see if there have same Leader or not

    // e.g $A [4, 3, 4, 4, 4, 2]
    // $leader[0] = 4
    // $leader[1] = 4
    // start iterating array
    //
    // loop 1:
    // $A[$i] = 4, $current_leader_count = 1, $remain_leader_count = 2
    // separate array $A to [4] and [3, 4, 4, 4, 2]
    // counting 1st sub array [4] has 100% "4" element
    // counting 2nd sub array [3, 4, 4, 4, 2] has 60% "4" element
    // both sub array have over half "4" element so $result add 1
    //
    // loop 2: ...
    // after loop we return the $result

    $len = count($A);
    $current_leader_count = 0;
    $result = 0;
    $leader = find_leader($A);

    for ($i = 0; $i < $len; $i++) {
        if ($A[$i] === $leader[0]) {
            $current_leader_count++;
        }
        $remain_leader_count = $leader[1] - $current_leader_count;
        if ($current_leader_count / ($i + 1) > 0.5 && $remain_leader_count / ($len - ($i + 1)) > 0.5) {
            $result++;
        }
    }
    return $result;
}

// Find the highest elements and number from array
function find_leader($array)
{
    $len = count($array);
    $map = (object)[];
    $max_el = $array[0];
    $max_el_count = 1;

    for ($i = 0; $i < $len; $i++) {
        $el = $array[$i];
        if (!property_exists($map, $el)) {
            $map[$el] = 1;
        } else {
            $map[$el]++;
        }

        if ($map[$el] > $max_el_count) {
            $max_el = $el;
            $max_el_count = $map[$el];
        }
    }

    return [$max_el, $max_el_count];
}
?>