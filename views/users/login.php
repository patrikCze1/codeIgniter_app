<div class="login-page">
    <div class="card border-secondary mb-3" style="max-width: 25rem;">
    <div class="card-header"><h1 style="font-size: 16px"><?php echo $title; ?></h1></div>
    <div class="card-body">
            <div class="form-group">

                <?php echo validation_errors('<div class="alert alert-dismissible alert-danger">', '</div>'); ?>
                <?php if($this->session->flashdata('msg')): ?>
                    <div class="alert alert-dismissible alert-danger">
                    <?php echo $this->session->flashdata('msg');?>
                    </div>
                <?php endif; ?>

                <?php echo form_open('user/login'); ?>
                    <div class="form-group">    
                        <label for="name" >Name</label>
                        <input class="form-control" type="input" name="name" placeholder="Name"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                    </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Login" />
                </form>
            </div>
        </div>
    </div>
</div>