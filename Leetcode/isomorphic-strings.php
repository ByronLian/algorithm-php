<?php
// https://leetcode.com/problems/merge-two-sorted-lists/
// Runtime: 32 ms, faster than 100.00% of PHP online submissions for Isomorphic Strings.


class Solution
{
    public function isIsomorphic($s, $t)
    {
        $s_storage = (object)[];
        $t_storage = (object)[];
        $len = strlen($s);
      
        // Solution:
        // This idea is use 2 objects to save element with it's position as value
        // e.g
        // s: "ab"
        // t: "aa"
      
        // loop 1: both s[0] and t[0] not exist in their storage, $s_storage[a] = 0, $t_storage[a] = 0
        // loop 2: s[1] exist in $s_storage but t[1] not in $t_storage so return false
        for ($i = 0; $i < $len; $i++) {
            $s_target = $s[$i];
            $t_target = $t[$i];
            if (!property_exists($s_storage, $s_target)  && !property_exists($t_storage, $t_target)) {
                $s_storage -> $s_target = $i;
                $t_storage -> $t_target = $i;
            } elseif (property_exists($s_storage, $s_target)  && property_exists($t_storage, $t_target)) {
                if ($s_storage -> $s_target !== $t_storage -> $t_target) {
                    return false;
                }
            } else {
                return false;
            }
        }
        return true;
    }
}
?>