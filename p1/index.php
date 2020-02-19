<?php

session_start();

$results = null;

if( isset( $_SESSION['results'] ) ) {
    $results = $_SESSION['results'];

    extract( $results );

    $_SESSION['results'] = null;
}

require 'index-view.php';