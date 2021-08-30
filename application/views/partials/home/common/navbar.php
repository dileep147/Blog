<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <a href="#" class="navbar-brand"><i class="fas fa-blog" style="font-weight: 500;font-size: 40px;color: #fff;"></i><b>Entaitment Blog</b></a>
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" title="Home" href="<?php echo base_url(); ?>index.php/home">
                <i class="fa fa-home" style="font-weight: 500;font-size: 40px;color: #fff;"></i></a>
            </li>
            <?php if($this->session->userdata('islogin')){?>


            <?php }
            else{?>
                 <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/user"><b>Login</b></a>
                </li>

            <?php }?>
                

            

               
            


        </ul>
        <?php if($this->session->userdata('islogin')){ ?>
            

            <div class="navbar-nav ml-auto">
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="fa fa-bars" style="font-weight: 500;font-size: 40px;color: #fff;"></i>
                    </a>
                    <div class="dropdown-menu">
                        

                        <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/user/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>


                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</nav>