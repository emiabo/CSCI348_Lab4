<?php include 'header.php';?>
<h1>Political Roast Generator</h1>
<h2>Complain about a politician</h2>
<form action="generate.php" method="get">
    <label for="fname">First name: </label>
    <input type="text" name="fname" id="fname">
    <br>
    <label for="lname">Last name: </label>
    <input type="text" name="lname" id="lname">
    <br>
    <label for="pronouns">Pronouns:</label>
    <select name="pronouns" id="pronouns">
        <option>He, him, his</option>
        <option>He, they, firstname('s)</option>
        <option>She, her, hers</option>
        <option>She, they, firstname('s)</option>
        <option>They, them, theirs</option>
        <option>Ze, hir, hirs</option>
        <option>Ze, zir, zirs</option>
    </select>
    <br>
    <label for="numSentences">How many sentences:</label>
    <select name="numSentences" id="numSentences">
        <option>3</option>
        <option>5</option>
        <option>10</option>
    </select>
    <br>
    <input type="submit" value="Roast!">
</form>
<?php include 'footer.php';?>