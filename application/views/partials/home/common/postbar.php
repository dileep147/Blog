<div class="categories">
    <h3 class="categories-header text-primary"><i class="fa fa-address-card" aria-hidden="true"></i> <b>Post</b></h3>
    <hr>
    <div class="main-category-list">


         <?php if($this->session->userdata('islogin')){ ?>

            <div class="main-category-list-item">
                
                    
                    
                    
                        <i class="fa fa-plus" aria-hidden="true">
                       <a  href="<?php echo base_url(); ?>index.php/post/create"></i>Create Post</a>
                     
                     <hr>
          
            </div>

            <div class="main-category-list-item">
                
                    
                    
                    
                        <i class="fa fa-user" aria-hidden="true"></i>
                      <a  href="<?php echo base_url(); ?>index.php/user/profile/<?php echo $this->session->userdata('userid'); ?>">Profile</a>
                     
                     <hr>
          
            </div>


           


            <div class="main-category-list-item">
                
                    <?php if($this->session->userdata('username')=='admin'){ ?>
                    
                    
                        <i class="far fa-bell"></i>
                        <a  title="Pending Alert" href="<?php echo base_url(); ?>index.php/user/alert">Pending Alert</a>
                     <?php } ?>
                     <hr>
          
            </div>
            <?php } ?>



            

            
        
    </div>
</div>