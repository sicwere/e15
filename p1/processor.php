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
    $word = implode(array_filter(str_split($word), "ctype_alnum"));
    if($word === "")
        return "No";
    return strtolower($word) === strtolower(strrev($word)) ? "Yes" : "No";
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