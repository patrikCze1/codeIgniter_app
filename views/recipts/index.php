<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<?php if($this->session->flashdata('msg')): ?>
    <div class="alert alert-dismissible alert-success">
        <?php echo $this->session->flashdata('msg');?>
    </div>
<?php endif; ?>
<h1><?php echo $title; ?></h1>

<a href="<?php echo site_url('recipt/create'); ?>">Add</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php if (count($recipts) > 0): ?>
            <?php foreach ($recipts as $r): ?>
                <tr>
                    <td> <a href="<?php echo site_url('recipt/view/'.$r['id']); ?>"><?php echo $r['name']; ?></a> </td>
                    <td> <?php echo $r['category']; ?> </td>
                    <td> <?php echo $r['created_at']; ?> </td>
                    <td> 
                        <?php echo form_open('recipt/delete/' . $r['id']); ?> 
                            <input type="submit" class="btn btn-danger" name="submit" value="Del" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>