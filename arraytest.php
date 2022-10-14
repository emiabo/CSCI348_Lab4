<?php 
  //include ('openers.php'); 
  include ('closers.php'); 

  $openers = $closers;

function convertString($tempSentence1, $fname, $lname, $npro, $ppro, $opro)
{
 //replace the Placeholders with the proper names or pronouns
 $tempSentence2 = str_replace("_FNAME_", $fname, $tempSentence1);
 $tempSentence1 = str_replace("_LNAME_", $lname, $tempSentence2);
 $tempSentence2 = str_replace("_NPRONOUN_", $npro,  $tempSentence1);
 $tempSentence1 = str_replace("_PPRONOUN_", $ppro, $tempSentence2);
 $tempSentence2 = str_replace("_OPRONOUN_", $opro,  $tempSentence1);

 //echo strpos($tempSentence2, "<b>")."<br>";
 //Make sure the first word is propercase
 if (strpos($tempSentence2, "<b>") == 0)
 {
   //fix for the case where the first word is actually a HTML tag so it misses capital
   //$tempSentence1 = str_replace("<b>", "", $tempSentence2);
   $tempSentence1 = substr_replace($tempSentence2, "", 0, 3);
   //$tempSentence1 = preg_replace("/<b>/", "", $tempSentence2, 1);
   $tempSentence2 = ucfirst($tempSentence1); 
   $tempSentence1 = "<b>".$tempSentence2; 
 }
 else
 {
   //normal case where there is no HTML tag first 
   $tempSentence1 = ucfirst($tempSentence2); 
 }

 $tempSentence2 = $tempSentence1 . "."; //put a period at the end of the sentence

 return $tempSentence2;

}
?> 

<?php include ('header.php'); ?> 

<?php 


//send all openers to the screen using a temp array assignment of $opArray
echo "<h2>All Openers </h2>";
for ($i = 0; $i < count($openers); $i++)
{
  $opArray = $openers[$i];
  echo $opArray["text"];
  echo "<br>";
}

//get 2 distinct random openers using the shortcut method $openers[<index>]["text"]
echo "<h2>Two Random Openers With Pronouns Replaced Using 'She, her, hers' </h2>";
$numOfSentences = 0;
//create a separate array to hold numbers I've already gotten
$usedArray = array(); 

//Loop until we have two sentences
while ($numOfSentences < 2)
{
    //get a random number as a possible index from the openers array
    $possIndex = rand(0, count($openers) - 1); //in range from 0 to 3 in this case

    //check to see if we used it already.  If it is there in_array will return true
    if (in_array($possIndex, $usedArray) != true) //if it was not there
    {
      //put it there so we don't get this sentence again
      $usedArray[count($usedArray)] = $possIndex;
      
      //increment the numOfSentences
      $numOfSentences = $numOfSentences + 1;

      //since we have not gotten this one before lets grab it now using the numbered index
      $tempSentence1 = $openers[$possIndex]["text"];

      $tempSentence2 = convertString($tempSentence1, "Lisa", "Simpson", "she", "her", "hers");

      echo $tempSentence2;
      echo "<br><br>";
    }
}
?>

<?php include ('footer.php'); ?> 