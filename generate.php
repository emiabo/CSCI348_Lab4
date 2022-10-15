<?php
include 'header.php';
include 'openers.php';
include 'sentences.php';
include 'closers.php';
function convertString($temp, $fname, $lname, $npro, $ppro, $opro) {
    $temp2 = str_replace("_FNAME_", $fname, $temp);
    $temp = str_replace("_LNAME_", $lname, $temp2);
    $temp2 = str_replace("_NPRONOUN_", $npro,  $temp);
    $temp = str_replace("_PPRONOUN_", $ppro, $temp2);
    $temp2 = str_replace("_OPRONOUN_", $opro,  $temp);
    
    if (strpos($temp2, "<b>") == 0)
    {
      $temp = substr_replace($temp2, "", 0, 3);
      $temp2 = ucfirst($temp); 
      $temp = "<b>".$temp2; 
    }
    else
    {
      $temp = ucfirst($temp2); 
    }

    return $temp;
}
try {
    if(strlen($_GET['fname']) == 0 || strlen($_GET['lname']) == 0) {
        throw new Exception("Enter a full name!");
    }
    //Set the rest of the vars
    $fname = ucfirst($_GET['fname']);
    $lname = ucfirst($_GET['lname']);
    $pronouns = explode(" ", $_GET['pronouns']);
    list($npro, $opro, $ppro) = $pronouns;
    if(strpos($opro, "fname") !== false) {
        $opro = $fname . "'s";
    }
    $numSentences = $_GET['numSentences'];
    //Get unformatted sentences
    $opener = $openers[rand(0, 3)]['text'] . ".";
    
    $roasts = array();
    $generated = 0;
    $usedSentences = array();
    while($generated < ($numSentences - 2)) {
        $possible = rand(0, (count($sentences) - 1));

        if (in_array($possible, $usedSentences) != true)
        {
          $usedSentences[count($usedSentences)] = $possible;
        
          $generated = $generated + 1;

          $roasts[] = $sentences[$possible]["text"] . ".";
        }
    }
    
    $closer = $closers[rand(0, 3)]['text'] . ".";
    //print the strings
    echo(convertString($opener, $fname, $lname, $npro, $ppro, $opro) . "<br>");
    echo("<ul>");
    foreach($roasts as $roast) {
        echo("<li>" . convertString($roast, $fname, $lname, $npro, $ppro, $opro) . "</li>");
    }
    echo("</ul>");
    echo(convertString($closer, $fname, $lname, $npro, $ppro, $opro));
    echo("<br><a href='lab4.php'>Try again</a>");
} catch(Exception $e) {
    echo($e->getMessage());
}
include 'footer.php';
?>