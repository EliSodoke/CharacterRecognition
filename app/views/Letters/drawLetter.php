<form id="drawLetterForm">
    <?php

    $numRow = 7;
    $numColumn = 5;
    echo '<table class="drawLetter">';
    for($i = 0; $i < $numRow; $i++) {
        echo '<tr>';
        for($j = 0; $j < $numColumn; $j++) {
            echo '<td class="drawLetterGrid" id="' . ($i - $j) . '"></td>';
        }
        echo '</tr>';
    }
    echo '</table>';

    ?>

    <input type="submit" value="store in database" />
</form>
<br/><br/>
<div class="message"></div>