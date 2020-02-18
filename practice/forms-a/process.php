<?php

$answer = $_POST['answer'];

if($answer == '') {
    $result = 'You didn\'t enter a guess';
}
else if($answer == 'pumpkin') {
    $result = 'Correct!';
}
else {
    $result = 'Incorrect!';
}

require 'process-view.php';