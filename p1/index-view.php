<!DOCTYPE html>
<html lang="en">

<head>
    <title>H. Scott Ferguson E15 Project 1</title>
</head>
<style>
body {
    text-align: center;
}

.resultBox {
    border: 5px solid black;
    margin: 25px 500px 0 500px;
}

.resultBox span {
    font-weight: bold;
}
</style>

<body>
    <h1>H. Scott Ferguson E15 Project 1</h1>
    <form method="POST" action="processor.php">
        <label for="wordbox">Enter string:</label>
        <input type="text" name="wordbox" id="wordbox">
        <input type="submit" value="Submit">
    </form>
    <?php if($word !== "") { ?>
    <div class="resultBox">
        <p>String: <span><?php echo $word ?></span></p>
        <p>Is Palindrome: <span><?php echo $is_palindrome ?></span></p>
        <p>Vowel Count: <span><?php echo $vowel_count ?></span></p>
    </div>
    <?php } ?>
</body>

</html>