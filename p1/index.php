<?php
    session_start();

    $word = $_SESSION["results"]["word"] ?? "";
    
    if($word !== "") {
        $isPalindrome = $_SESSION["results"]["palindrome"];
        $vowel_count = $_SESSION["results"]["vowel_count"];
    }

    $_SESSION["results"] = null;
    
    require("index-view.php");
?>