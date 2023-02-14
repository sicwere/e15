<?php

session_start();

if(isset($_POST["wordbox"])) {
    $_SESSION["results"] = [
        "word" => $_POST["wordbox"],
        "palindrome" => isPalindrome($_POST["wordbox"]),
        "vowel_count" => vowelCount($_POST["wordbox"])
    ];
}

header("Location: index.php");

function isPalindrome(string $word) : string {
    if($word === "")
        return "No";
    for($i = 0, $j = strlen($word) - 1; $i <= $j; $i++, $j--) {
        if(!ctype_alnum($word[$i])) {
            $j++;
            continue;
        }
        if(!ctype_alnum($word[$j])) {
            $i--;
            continue;
        }
        if(strtolower($word[$i]) !== strtolower($word[$j]))
            return "No";
    }
    return "Yes";
}

function vowelCount(string $word) : int {
    if($word === "")
        return 0;
    $vowels = ['a','e','i','o','u', 'A','E','I','O','U'];
    $len = strlen($word);
    $count = 0;
    for($i = 0; $i < $len; $i++) {
        if(in_array($word[$i], $vowels))
            $count++;
    }
    return $count;
}