

            <div class="post-update-form" ng-controller="postController">
    <p class="post-create-form-title text-primary"><i class="fas fa-user-edit"></i>Edit Post</p>
    <hr>
    <?php
        $catIds = array();
        echo form_open_multipart('post/update');
    ?>

    <div class="col-xs-4" style="text-align: center;">
         <img style="height: 250px;width: 250px; text-align: center; "
                                             src="<?php echo $result->image; ?>"
                                             alt="Profile Picture">

        
    </div>
        <div class="form-group">
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">Title *</label>
             <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
            <input type="text" name="title" placeholder="Title" class="form-title-input form-control-plaintext" value="<?php echo set_value('title', $result->title); ?>">
        </div>
    </div>
        </div>
        <div class="form-group">
            
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">Category *</label>
             <div class="col-xs-12 col-sm-9">
                <div class="clearfix">
            

            <select class="form-control" name="cat" ng-model="category" id="category">
                              

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
            <label class="control-label col-xs-3 col-sm-3 no-padding-right">Content</label>
             <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
            <textarea name="content" id="" cols="30" rows="10" class="form-content-input" placeholder="Content" ><?php echo $result->content;?></textarea>

            <input type="hidden" name="image" id="image" value="<?php echo set_value('id', $result->image); ?>"  />

             <input type="hidden" name="id" id="id" value="<?php echo set_value('id', $result->id); ?>">
        </div>
    </div>
</div>
<div class="form-group">
            
             <div class="col-xs-12 col-sm-12">
                <div class="clearfix">
        <button class="btn btn-primary">UPDATE</button>
    </div>
</div>
</div>
    <?php
        echo form_close();
    ?>
</div>
            
        



