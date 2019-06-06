<h1><?php echo $title; ?></h1>

<div onload="render(<?php echo $f['score']; ?>)">

    <?php
    $score = $f['score'];
    echo $score . ' %';

    echo '<div class="progress">';
    if ($score >= 70) {        
        echo '<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: ' . $score . '%" aria-valuenow="' . $score . '" aria-valuemin="0" aria-valuemax="100"></div>';
    } elseif ($score < 70 && $score >= 50) {
        echo '<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: ' . $score . '%" aria-valuenow="' . $score . '" aria-valuemin="0" aria-valuemax="100"></div>';
    } else {
        echo '<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: ' . $score . '%" aria-valuenow="' . $score . '" aria-valuemin="0" aria-valuemax="100"></div>';
    }
    echo '</div><br>';

    echo '<p>' . $f['desc'] . '</p>';
    ?>
</div>
<br>

<a href="<?php echo site_url('film/index'); ?>">Back to films</a>

