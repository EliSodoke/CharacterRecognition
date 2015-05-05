<h1>Letter Table</h1>
<div>Filter By Letter</div>
<select id="letterSelect" onchange="filterLetter($('#letterSelect').val())">
    <?php
    
    if($value != '') {
        echo '<option value="">All</option>';
    } else {
        echo '<option value="" selected disabled>Letter</option>';
    }
    for($i = 1; $i < 27; $i++) {
        echo '<option value="' . chr($i + 64) . '">' . chr($i + 64) . '</option>';
    }
    ?>
</select>

<script>
$('#letterSelect').val('<?php echo $value; ?>');
</script>

<?php

if($letters) {
    $numRow = 7;
    $numColumn = 5;
    $currentAlpha = '';
    echo '<table class="tab1">';
    foreach($letters as $letter) {
        
        if($currentAlpha != $letter->getValue()) {
            $currentAlpha = $letter->getValue();
            if($currentAlpha != '') {
                echo '</tr>';
            }
            echo '<tr>';
        }
        echo '<td class="case">';
        echo '<table class="tab1-1">';
        $pixels = explode(' ', $letter->getPixels());
        $currentPos = 0;
        for($i = 0; $i < $numRow; $i++) {
            echo '<tr>';
            for($j = $currentPos; $j < ($currentPos + $numColumn); $j++) {
                if($pixels[$j] == 1) {
                    echo '<td class="pxl-color"></td>';
                } else {
                    echo '<td class="pxl"></td>';
                }
            }
            $currentPos += $numColumn;
            echo '</tr>';
        }
        echo '</table>';
        echo '</td>';
    }
    echo '</table>';
} else {
    echo '<h1>There is no letters</h1>';
}