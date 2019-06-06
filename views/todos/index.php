<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<?php if($this->session->flashdata('msg')): ?>
    <div class="alert alert-dismissible alert-success">
        <?php echo $this->session->flashdata('msg');?>
    </div>
<?php endif; ?>
<h1><?php echo $title; ?></h1>

<div class="form-group">
    <?php echo form_open('todo/create'); ?>
            <input type="input" class="form-control" name="title" placeholder="Title"/>

            <input type="text" class="form-control" name="desc" placeholder="Description" />

            <input type="submit" class="btn btn-primary" name="submit" value="Add" />
    </form>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>Text</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php if (count($todos) > 0): ?>
            <?php foreach ($todos as $t): ?>
                <tr>
                    <td> <?php echo $t['title']; ?> </td>
                    <td> <?php echo $t['text']; ?> </td>
                    <td> <?php echo $t['created_at']; ?> </td>
                    <td> 
                        <?php echo form_open('todo/delete/' . $t['id']); ?> 
                            <input type="hidden" name="id" value="">
                            <input type="submit" class="btn btn-outline-success" name="submit" value="Done" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>