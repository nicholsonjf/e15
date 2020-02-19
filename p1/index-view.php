<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e15 Project 1</title>
</head>

<body>
    <h1>e15 Project 1</h1>

    <form method='POST' action='process.php'>
        <label for='inputString'>Enter a string:</label>
        <input type='text' id='inputString' name='inputString'>
        <button type='submit'>Process</button>
    </form>

    <?php if( isset( $results ) ) {?>
        <h2>Is palindrome?</h2>
        <? echo $isPalindrome ?>

        <h2>Has vowels?</h2>
        <? echo $hasVowels ?>
    <?php } ?>

</body>

</html>