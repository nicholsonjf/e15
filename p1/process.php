<?php

session_start();

$inputString = $_POST['inputString'];

function isPalindrome($inputString)
{
    $string_reversed = strrev($inputString);
    if ($inputString === $string_reversed) {
        return 'Yes';
    } else {
        return 'No';
    }
}


function hasVowels($inputString)
{
    $inputArray = str_split($inputString);
    $vowels = array( 'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U' );
    $hasVowels = !empty(array_intersect($vowels, $inputArray));
    return $hasVowels ? 'Yes' : 'No';
}

$_SESSION['results'] = [
    'isPalindrome' => isPalindrome( $inputString ),
    'hasVowels' => hasVowels( $inputString )
];

header( 'Location: index.php' );