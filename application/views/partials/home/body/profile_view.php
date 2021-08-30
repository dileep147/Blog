

<div class="profile-page-view-1010">
    <div class="profile-top-1010">
        <div class="profile-top-content-1010">
            <div class="profile-top-image-1010">
                <?php if(!empty($result->pro_pic)) {
                    ?>
                         <img src="<?php echo $result->pro_pic?>" alt="">
                    <?php
                }else{?>
                        <img src="<?php echo base_url(); ?>uploads/image/man.jpg" alt="">
                    <?php

                }?>
                    
                
            </div>
            <div class="profile-top-title-1010">
                <p class="profile-top-title-name-1010"><?php echo $result->fullname; ?></p>
            </div>
        </div>
        <?php if($this->session->userdata('islogin')){ ?>
            <div class="profile-top-message-1010">
                <?php if((int)$this->session->userdata('userid') === (int)$result->id){ ?>
                   
                    
                    <div>
                         <a  href="<?php echo base_url(); ?>index.php/user/profile_view/<?php echo $this->session->userdata('userid'); ?>"
                       class="btn btn-primary">
                        <b>Edit Profile</b>
                    </a>
                    </div>
                   

                <?php }else{ ?>
                    <!-- <a
                       href="<?php echo base_url()?>index.php/message/to/<?php echo $result->id; ?>"
                       class="btn btn-primary">
                        Message
                    </a> -->
                <?php } ?>
            </div>
        <? } ?>

        
    </div>
</div>

<!-- post -->

<?php $results = $this->post_model->get_all_by_author_id($result->id);?>
<?php foreach ($results as $row){ ?>
    <div class="post-card">
        <div class="post-header">
            <p class="post-title"><?php echo $row->title; ?></p>
            <p class="author">
                By <a href="<?php echo base_url(); ?>index.php/user/profile/<?php echo $row->author_id; ?>">
                    <?php
                        if((int)$this->session->userdata('userid') === (int)$row->author_id){
                            echo "You";
                        }else{
                            echo $row->author_name;
                        }
                    ?>
                </a>
            </p>
        </div>
        <div class="post-image">
            <img src="<?php  echo $row->image; ?>">
        </div>
        <div class="post-text">
            <p>
                <?php echo substr($row->content, 0, 149);?>
                <?php if(strlen($row->content) >= 150){ ?>
                    ...<a class="btn btn-primary" href="<?php echo base_url() ?>index.php/post/view/<?php echo $row->id; ?>" role="button">Read more</a>
                <?php } ?>
            </p>
        </div>
        <?php if($this->session->userdata('islogin')){ ?>
            <div class="post-opinion-bar">
                
                <div class="post-opinion-comment">
                    <a href="<?php echo base_url(); ?>index.php/post/view/<?php echo $row->id; ?>" class="post-opinion-button">
                        <i class="fal fa-comment-plus"></i>
                    </a>
                </div>

                <?php if((int)$this->session->userdata('userid') === (int)$row->author_id || $this->session->userdata('username')=='admin'){?>
                        <div class="post-opinion-edit">
                    <a href="<?php echo base_url(); ?>index.php/post/edit/<?php echo $row->id; ?>" class="post-opinion-button">
                        <i class="fas fa-edit"></i>
                    </a>

                     
                </div>

                <div>
                    <a href="<?php echo base_url(); ?>index.php/post/post_delete/<?php echo $row->id; ?>" class="post-opinion-button">
                       <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>

                    <?php

                }else{

                } ?>
                

                
            </div>
        <?php } ?>
    </div>
<?php } ?>
<!--end post-->