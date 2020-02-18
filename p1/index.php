<?php
/**
 * Main controler for p1.
 */




/**
 * Determines if a string is a palindrome.
 *
 * @param string $inputString The string to test for palindromism.
 * 
 * @return boolean.
 */
function isPalindrome( $inputString ) {
    $string_reversed = strrev($inputString );
    if ($inputString === $string_reversed ) {
        return true;
    }
    else {
        return false;
    }
}

/**
 * Determines if a string has vowels.
 *
 * @param string $inputString The string to check for vowels.
 * 
 * @return boolean
 */
function hasVowels( $inputString ) {

    $inputStringSplit = str_split($inputString);
    $inputStringSet = new \Ds\Set($inputStringSplit);
    $vowels = new \Ds\Set(array( 'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U' ));
    $diff = $vowels->diff($inputStringSet);
    return !$diff->isEmpty();
}

require 'index-view.php';