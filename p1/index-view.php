<!DOCTYPE html>
<html lang="en">

<head>
    <title>H. Scott Ferguson E15 Project 1</title>
</head>

<body>
    <form method="POST" action="processor.php">+
        <input type="text" name="wordbox" id="wordbox">
        <label for="wordbox">Enter word:</label>
        <input type="submit" value="Submit">
    </form>
    <?php if($word !== "") { ?>
    Word: <?php $word ?>
    Is Palindrome: <?php $isPalindrome ?>
    Vowel Count; <?php $vowel_count ?>
    <?php } ?>
</body>

</html>