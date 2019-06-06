<h1><?php echo $title; ?></h1>
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<div class="form-group">
    <?php echo form_open('recipt/create'); ?>
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name"/>

        <label for="ingerdients">Ingredients</label>
        <textarea name="ingerdients" class="form-control gre" placeholder="Ingerdients..." rows="5"></textarea>

        <label for="process">Process</label>
        <textarea name="process" class="form-control" placeholder="Process..." rows="5"></textarea>

        <label for="category">Category</label>
        <select name="category" class="form-control" >
            <?php 
            foreach ($categories as $c): 
                echo '<option value="' . $c['id'] . '">' . $c['name'] . '</option>';
            endforeach; 
            ?>
        </select>

        <input type="submit" class="btn btn-primary" name="submit" value="Add" />
    </form>
</div>

<br>
<a href="<?php echo site_url('recipt/index'); ?>">Back to recipts</a>

<script>
    $(function(){ 
        $('.gre').gre();
    });
</script>