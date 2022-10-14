<?php
include 'header.php';
include 'openers.php';
include 'sentences.php';
include 'closers.php';
try {
    if(strlen($_GET['fname']) == 0 || strlen($_GET['lname']) == 0) {
        throw new Exception("Enter a full name!");
    }
    //Set the rest of the vars
} catch(Exception $e) {
    echo($e->getMessage());
}
include 'footer.php';
?>