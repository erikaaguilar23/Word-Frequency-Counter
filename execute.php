<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Results</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
   
</head>
<body>
    <h1 style="text-align:center">Word Frequency Results</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];

        $Wrdstop = array("the", "and", "in", "to");

        $words = str_word_count($text, 1);
        $wordsTolower= array_map('strtolower', $words);
        

        $Wrdstop = file("StpWrds.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $filteredWords = array();
        foreach ($wordsTolower as $wordsTolower) {
          
            if (!in_array($wordsTolower, $Wrdstop)) {
                $filteredWords[] = $wordsTolower;
            }
        }

        $text = preg_replace("/[^a-zA-Z0-9]+/", " ", $text);
    $text = strtolower($text);
       

        $wordCounts = array_count_values($filteredWords);

        $sortValue = $_POST['sort'];

       
        $sortOrder = ($sortValue === 'asc') ? SORT_ASC : SORT_DESC;

      
        if ($sortOrder === SORT_ASC) {
            asort($wordCounts);
        } else {
            arsort($wordCounts);
        }

        $limit = $_POST["limit"];

        $counter = 0;

        echo '<table class="table table-info table-striped">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th>Word</th>';
                    echo '<th>Frequency</th>';
                echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
            foreach ($wordCounts as $word => $frequency) {
                if ($counter >= $limit) {
                    break;
                }
                echo '<tr>';
                    echo "<td>$word</td>";
                    echo "<td>$frequency</td>";
                echo '</tr>';
                $counter++;
            }
            echo '</tbody>';
        echo '</table>';
    } else {
        echo "<p>Form not submitted.</p>";
    }
    ?>

    <p><a href="index.php">Back to Word Frequency Counter</a></p>
</body>
</html>