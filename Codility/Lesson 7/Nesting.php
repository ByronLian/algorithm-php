<?php
// https://app.codility.com/programmers/lessons/7-stacks_and_queues/nesting/
// Task Score: 100
// Correctness: 100
// Performance: 100, O(N)

function solution($S)
{
    $len = strlen($S);

    if ($S === '') {
        return 1;  // e.g ''
    }
    if ($len < 2) {
        return 0;  // Only one bracket
    }

    // Solution:
    // We need a stack to store if we found open brackets
    // and use current bracket to compare with top element in Stack
    // if they can match which means they can close each other then we pop the top element
    // if not then we push current element
    // we can check the stack length when the loop end
    // if stack has element return 0 else return 1
    //
    // e.g '()'
    // stack [(]
    // current element is ) which can match top element in stack
    // pop (
    // stack []
    // loop end check stack length is 0, so return 1
    //
    // e.g ')('
    // stack [)]
    // current element is ( which can't match top element in stack
    // push (
    // stack [), (]

    $stack = [];
    $stack[0] = $S[0];

    $open_brackets = array(0 => '(');
    $close_brackets = array(0 => ')');

    for ($i=1; $i< $len; $i++) {
        $top_el_in_stack = $stack[ count($stack) -1 ];
        $top_stack_el_idx = array_search($top_el_in_stack, $open_brackets);
        $current_el_idx = array_search($S[$i], $close_brackets);
        
        if ($top_stack_el_idx === $current_el_idx && $current_el_idx !== false) {
            array_pop($stack);
        } else {
            array_push($stack, $S[$i]);
        }
    }

    return count($stack) > 0 ? 0 : 1;
}
?>