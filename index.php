<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter Case Study</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="navv">
    <h1 style="text-align:center"> Case Study: Word Frequency Counter </h1>
</div>
    
    <form action="execute.php" method="post">
        <label for="text">Paste Your Text Here:</label><br>
        <textarea id="text" name="text" rows="8" cols="40" required></textarea>
        <br>
        <br>
        <label for="sort">Sort by Frequencies:</label>
        <select id="sort" name="sort">
            <option value="ASCE">Ascending</option>
            <option value="DESC">Descending</option>
        </select><br><br>
        
        <label for="limit">Number of Words to Display:</label>
        <input type="number" id="limit" name="limit" value="10" min="1"><br><br>
        <input type="submit" value="Calculate Word Frequency">
    </form>
</body>
</html>
