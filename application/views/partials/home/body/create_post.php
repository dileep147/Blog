

            <div class="post-update-form" ng-controller="postController">
    <p class="post-create-form-title text-primary"><i class="fas fa-layer-plus"></i>Create Post</p>
    <hr>
    <?php
        $catIds = array();
        echo form_open_multipart('post/post_submit');
    ?>

    
        <div class="form-group">
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">Title *</label>
            <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
                <input type="text" name="title" placeholder="Title" class="form-title-input form-control-plaintext" >
            </div>
            </div>
        </div>
        <div class="form-group">
            
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">Category *</label>
             <div class="col-xs-12 col-sm-9">
                <div class="clearfix">
            <select class="form-control" name="cat" ng-model="category" id="category">
                    <option>-------Select Category--------</option>

                    <?php
                        foreach($main_categories as $data){ 
                            if ($data->id==$result->cat_id){
                                ?><option  selected value=<?php echo $data->id; ?>><?php echo $data->name; ?></option><?php
                            }else{
                                ?><option   value=<?php echo $data->id; ?>><?php echo $data->name; ?></option><?php
                        }
                    } ?>

            </select>
        </div>
        </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">Select File *</label>
             <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
            <input type="file" name="image" class="form-control-file">
        </div>
    </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">Content </label>
            <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
                <textarea name="content" id="" cols="30" rows="10" class="form-content-input" placeholder="Content" ></textarea>

            <input type="hidden" name="id" id="id">
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
            
        



