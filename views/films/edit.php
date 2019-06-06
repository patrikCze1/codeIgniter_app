<h1><?php echo $title; ?></h1>
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<div class="form-group">
    <?php echo form_open('film/updateFilm/' . $f['id']); ?>
        <label for="title">Name</label>
        <input type="input" class="form-control" name="title" placeholder="Name" value="<?php echo $f['name']; ?>"/>

        <label for="desc">Description</label>
        <textarea name="desc" class="form-control" placeholder="Description"><?php echo $f['desc']; ?></textarea>
        
        <label for="score">Score</label>
        <input type="number" class="form-control" name="score" placeholder="%" min="0" max="100"  value="<?php echo $f['score']; ?>"/>

        <input type="submit" class="btn btn-primary" name="submit" value="Edit" />
    </form>
</div>

<br>
<a href="<?php echo site_url('film/index'); ?>">Back to films</a>