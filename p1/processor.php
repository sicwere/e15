<?php

function isPalindrome(string $word) : bool {
    for($i = 0, $j = strlen($word); $i <= $j; $i++, $j--) {
        if($word[$i] !== $word[$j])
            return false;
    }
    return true;
}

function vowelCount(string $word) : int {
    $vowels = ['a','e','i','o','u', 'A','E','I','O','U'];
    $len = strlen($word);
    $count = 0;
    for($i = 0; $i < $len; $i++) {
        if(in_array($word[$i], $vowels))
            $count++;
    }
    return $count;
}