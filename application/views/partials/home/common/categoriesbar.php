<div class="categories">
    <h3 class="categories-header text-primary"><i class="fa fa-list-alt" aria-hidden="true"></i><b>Categories</b></h3>
    <hr>
    <div class="main-category-list">
        <?php $main_categories = $this->categories_model->get_main_categories(); ?>
        <?php foreach ($main_categories as $cat_row){ ?>
            <div class="main-category-list-item">
                <p>
                    <i class="far fa-angle-double-right"></i>
                     <a href="<?php echo base_url() ?>index.php/post/all_post/<?php echo $cat_row->id; ?>">
                        <?php echo $cat_row->name; ?>
                    </a>
                </p>
                <hr>
               
                
            </div>
        <?php } ?>
    </div>
</div>