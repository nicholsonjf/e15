<?php

session_start();

$answer = $_POST['answer'];

if($answer == '') {
    $results = 'You didn\'t enter a guess';
}
else if($answer == 'pumpkin') {
    $results = 'Correct!';
}
else {
    $results = 'Incorrect!';
}

$_SESSION['results'] = $results;

# Redirect
header('Location: done.php');