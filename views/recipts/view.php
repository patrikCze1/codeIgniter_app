<h1><?php echo $title; ?></h1>
<br>
<div>
    <h2>Category:</h2>
    <p><?php echo $r['category']; ?></p>
    <br>

    <h2>Ingredients:</h2>
    <p><?php echo $r['ingredients']; ?></p>
    <br>

    <h2>Process:</h2>
    <p><?php echo $r['process']; ?></p>
    <br>
</div>
<br>

<a href="<?php echo site_url('recipt/index'); ?>">Back to recipts</a>

