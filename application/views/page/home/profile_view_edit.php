

            <div class="post-update-form" ng-controller="postController">
    <p class="post-create-form-title text-primary"><i class="fas fa-layer-plus"></i>Edit Profile</p>
    <hr>
    <?php
        $catIds = array();
        echo form_open_multipart('user/edit_registration');
    ?>

    
        <div class="form-group">
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">User Name</label>
            <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
                <input type="text" class="form-control" readonly name="username" placeholder="Username" value="<?php echo set_value('username', $result->username); ?>">
            </div>
            </div>
        </div>

         <div class="form-group">
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">Email</label>
            <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
                <input type="email" class="form-control" readonly name="email" placeholder="Email address" value="<?php echo set_value('email', $result->email); ?>">
            </div>
            </div>
        </div>

         <div class="form-group">
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">Full Name</label>
            <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
                <input type="text" class="form-control" name="fullname" placeholder="Full name" value="<?php echo set_value('fullname', $result->fullname); ?>">
            </div>
            </div>
        </div>

        

       
        
        
        <div class="form-group">
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">Select Profile Picture </label>
             <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
            <input type="file" name="image" class="form-control-file">
            <input type="hidden" name="id" id="id" value="<?php echo set_value('id', $result->id); ?>">
        </div>
    </div>
        </div>
        
        <div class="form-group">
            
            <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
        <button class="btn btn-primary">SUBMIT</button>
    </div>
</div>
</div>
    <?php
        echo form_close();
    ?>
</div>
            
        



