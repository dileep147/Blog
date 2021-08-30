

            <div class="post-update-form" ng-controller="postController">
                <p class="post-create-form-title text-primary"><i class="fas fa-binoculars"></i>View Alerts</p>
                <hr>


                <!-- <div class="panel-body ">
                <div class="table-responsive "> -->
                    <table  class="table table-hover"  >
                        <thead>
                            <tr>
                                <th>

                                </th>
                                
                                <th>User Name</th>
                                
                                
                                <th>
                                    Category
                                </th>


                                

                         <th class="no-print"> Action </th>
                     </tr>
                 </thead>
                 <tbody>
                    <?php
                    if (!empty($informations)) {
                        $count = 1;
                        $ci =&get_instance();
                        $ci->load->model('Categories_model');
                        foreach ($informations as $information) {
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                             
                                    <td><?php $details = $this->post_model->get_user_name($information->author_id);
                                echo $details['username'];?></td>

                                
                                <td>
                                    <?php
                                    $details = $ci->categories_model->get_categories_details($information->cat_id);
                                    echo $details['name'];
                                    ?>
                                </td>                                                  
                                <td class="no-print">
                                    <a class="blue" data-toggle="tooltip" title="view" href="<?php echo base_url() . "index.php/post/view_pending_post/" . $information->id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;

                                    <a style="color: green" class="green" data-toggle="tooltip" title="Confirm" href="<?php echo base_url() . "index.php/post/confirm/" . $information->id; ?>"><i class=" green fa fa-check" aria-hidden="true"></i></a>&nbsp;&nbsp;

                                    <a style="color: red" class="red" data-toggle="tooltip" title="Delete" href="<?php echo base_url() . "index.php/post/delete/" . $information->id; ?>"><i class="red fa fa-trash" aria-hidden="true"></i></a>
  
                                </td>

                            </tr>
                            <?php
                            $count++;
                        }
                    }
                    ?>
                </tbody>
            </table>
    <!--     </div>
    </div> -->
    
            </div>
            
     
        



