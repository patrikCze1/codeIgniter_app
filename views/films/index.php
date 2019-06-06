<?php if($this->session->flashdata('msg')): ?>
    <div class="alert alert-dismissible alert-success">
        <?php echo $this->session->flashdata('msg');?>
    </div>
<?php endif; ?>
<h1><?php echo $title . ' (' . $count . ')'; ?></h1>


    <div class="form-group">
        <?php echo form_open('film/search'); ?>
            <input type="search" name="name" class="form-control" placeholder="Search">
            <input type="submit" value="Search" class="btn btn-primary">
        </form>
    </div>

    <div class="form-group form-inline my-2 my-lg-0 right">
        <?php echo form_open('film/random'); ?>
            <input type="submit" value="Random film" class="btn btn-outline-secondary my-2 my-sm-0">
        </form>
    </div>

<!-- table -->
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th> <a href="<?php echo base_url();?>index.php/film/order">%</a></th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php if (count($films)): ?>
            <?php foreach ($films as $f): ?>
                <tr>
                    <td> <a href="<?php echo site_url('film/view/'.$f['id']); ?>"><?php echo $f['name']; ?></a> </td>
                    <td> <?php echo $f['score']; ?> </td>
                    <td class="row">

                        <?php 
                            if (isset($f['wish_id'])){
                                echo form_open('film/removeFromWish/' . $f['wish_id']); 
                                echo '<input type="submit" class="btn btn-outline-info" name="submit" value="Rem wishlist" />';
                            } else {
                                echo form_open('film/addToWish/' . $f['id']); 
                                echo '<input type="submit" class="btn btn-info" name="submit" value="Add wishlist" />';
                            }                            
                        ?>                             
                        </form>
                        
                        <?php if($f['user_id'] == $this->session->id): ?>
                            <?php echo '&nbsp' . form_open('film/edit/' . $f['id']); ?> 
                                <input type="submit" class="btn btn-warning" name="submit" value="Edit" />
                            </form> 

                            <?php echo '&nbsp' . form_open('film/delete/' . $f['id']); ?> 
                                <input type="hidden" name="id" value="">
                                <input type="submit" class="btn btn-danger" name="submit" value="Delete" />
                            </form>   
                        <?php endif; ?>                     
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<div>
    <?php 
        if (isset($paginate)) {
            echo $this->pagination->create_links(); 
        }
    ?>
</div>