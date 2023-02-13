<?php

session_start();

if(isset($_POST["wordbox"])) {
    $_SESSION["results"] = [
        "word" => $_POST["wordbox"],
        "palindrome" => isPalindrome($_POST["word"]),
        "vowel_count" => vowelCount($_POST["word"])
    ];
}

header("Location: index.php");

function isPalindrome(string $word) : bool {
    if($word === "")
        return false;
    for($i = 0, $j = strlen($word); $i <= $j; $i++, $j--) {
        if($word[$i] !== $word[$j])
            return false;
    }
    return true;
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