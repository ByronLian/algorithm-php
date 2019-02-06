<?php
// https://leetcode.com/problems/detect-capital/
// Runtime: 56 ms, faster than 100.00% of PHP online submissions for Detect Capital.

class Solution
{

/*
 * @param String $word
 * @return Boolean
 */
    public function detectCapitalUse($word)
    {
        // Case "s" or "S"
        $len = strlen($word);
        if ($len === 1) {
            return true;
        }

        $first_el = ord($word[0]);
        $sec_el = ord($word[1]);

        if ($first_el > 64 && $first_el < 91) {
            // Case "USA"
            if ($sec_el > 64 && $sec_el < 91) {
                for ($i = 2; $i < $len; $i++) {
                    $el = ord($word[$i]);
                    if ($el < 65 || $el > 90) {
                        return false;
                    }
                }

                return true;
            // Case "Dog"
            } else {
                for ($i = 2; $i < $len; $i++) {
                    $el = ord($word[$i]);
                    if ($el > 64 && $el < 91) {
                        return false;
                    }
                }

                return true;
            }
        }

        // Case "dog"
        if ($first_el < 65 || $first_el > 90) {
            for ($i = 1; $i < $len; $i++) {
                $el = ord($word[$i]);
                if ($el > 64 && $el < 91) {
                    return false;
                }
            }

            return true;
        }
    }
}
?>