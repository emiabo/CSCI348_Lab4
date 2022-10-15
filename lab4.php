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
        <option value="he his him">He, him, his</option>
        <option value="he fname they">He, they, firstname('s)</option>
        <option value="she hers her">She, her, hers</option>
        <option value="she fname they">She, they, firstname('s)</option>
        <option value="they theirs them">They, them, theirs</option>
        <option value="ze hirs hir">Ze, hir, hirs</option>
        <option value="ze zirs zir">Ze, zir, zirs</option>
    </select>
    <br>
    <label for="numSentences">How many sentences:</label>
    <select name="numSentences" id="numSentences">
        <option value="3">3</option>
        <option value="5">5</option>
        <option value="10">10</option>
    </select>
    <br>
    <input type="submit" value="Roast!">
</form>
<?php include 'footer.php';?>