<?php
// https://leetcode.com/problems/reverse-only-letters/
// Runtime: 28 ms, faster than 100.00% of PHP online submissions for Reverse Only Letters.

class Solution
{

  /*
   * @param String $S
   * @return String
   */
    function reverseOnlyLetters($S)
    {
        $len = strlen($S);
        $result = "";
        $temp = (array)[];
  
        // Pick up all letters into temp array
        for ($i = 0; $i < $len; $i++) {
            $asc_val = ord($S[$i]);
            if (($asc_val > 64 && $asc_val < 91) || ($asc_val > 96 && $asc_val < 123)) {
                $val = $S[$i];
                array_push($temp, $val);
            }
        }
  
        // Put them back with un-letter char
        for ($j = 0; $j < $len; $j++) {
            $asc_val = ord($S[$j]);
            if (($asc_val > 64 && $asc_val < 91) || ($asc_val > 96 && $asc_val < 123)) {
                $result .= array_pop($temp);
            } else {
                $result .= $S[$j];
            }
        }
  
        return $result;
    }
}
?>