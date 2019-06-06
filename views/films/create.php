<h1><?php echo $title; ?></h1>
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<div class="form-group">
    <?php echo form_open('film/create'); ?>
        <label for="title">Name</label>
        <input type="input" class="form-control" name="title" placeholder="Name"/>

        <label for="desc">Description</label>
        <textarea name="desc" class="form-control" placeholder="Description"></textarea>
        
        <label for="score">Score</label>
        <input type="number" class="form-control" name="score" placeholder="%" min="0" max="100" />

        <input type="submit" class="btn btn-primary" name="submit" value="Add" />
    </form>
</div>

<br>
<a href="<?php echo site_url('film/index'); ?>">Back to films</a>