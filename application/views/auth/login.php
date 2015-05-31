<div class="form-box" id="login-box">
    <?php echo ($this->session->flashdata('error')) ? error_msg($this->session->flashdata('error')) : ''; ?>
    <?php echo ($error) ? error_msg($error) : ''; ?>
    <?php echo ($this->session->flashdata('success')) ? success_msg($this->session->flashdata('success')) : ''; ?>
    <div class="header">Administrator Panel</div>
    <form action="<?php echo site_url('admin/auth/'); ?>" method="post">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="email"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password"/>
            </div>          
        </div>
        <div class="footer">                                                               
            <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
            
            <p><a href="<?php echo site_url('auth/forgot_password'); ?>">I forgot my password</a></p>
            
        </div>
    </form>
</div>