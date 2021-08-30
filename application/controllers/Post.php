<?php

class Post extends CI_Controller{


    public function create(){
        if($this->session->userdata('islogin')){
            $data['page_body'] = 'create_post';
            $data['main_categories']=$main_categories = $this->categories_model->get_main_categories();

            $this->load->view('page/home/index', $data);
             // $this->load->view('partials/home/body/create_post', $data);

        }else{
            $this->session->set_flashdata(array("create_success" => "<p class='text-success'>Login first</p>"));
            redirect('home');
        }
    }

    public function post_submit(){

        $id= trim($this->input->post('id'));
        $title = trim($this->input->post('title')); 
        $cat = trim($this->input->post('cat')); 
        $content = trim($this->input->post('content'));
        $author_id = $this->session->userdata('userid');

        if(!empty($_FILES['image']['name']))
            {
                $config['upload_path'] = './uploads/image';
                $config['allowed_types'] = '*';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if(!($this->upload->do_upload('image')))
                {

                    echo "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
                }
                else
                {
                    $pic = $this->upload->data();
                    $image = base_url().'uploads/image/'.$pic['file_name'];
                   
                }
            }

            $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]');
            $this->form_validation->set_rules('content', 'Content', 'required|min_length[3]');
            $this->form_validation->set_rules('cat', 'Category', 'trim|required');

            if($this->form_validation->run()){
                    
                $data = array(
                    
                    
                    'title' => $title,
                    'cat_id' => $cat,                    
                    'content' => $content,
                    'image' => $image,
                    'author_id' => $author_id,
                    'status'=>'P',
                    
                );
                $this->post_model->insert($data);
                 $this->session->set_flashdata(array("create_success" => "<p class='text-success'>Post create success </p>"));
                redirect('home');
                    
                }else{
                    $data = array(
                        'error' => '<p>Data is invalid. Make sure data is fill up</p>',
                        'page_body' => 'errors'
                    );
                    $this->load->view('page/home/index', $data);

                }

    }


    public function view($post_id){
        if(isset($post_id)){
            $data['page_body'] = 'view_post';
            $data['post_id'] = $post_id;
            $this->load->view('page/home/index', $data);
        }else{
            $data = array(
                'error' => '<p>Data is invalid. Make sure data is fill up</p>',
                'page_body' => 'errors'
            );
            $this->load->view('page/home/index', $data);
        }
    }

    public function comment($post_id){
        if(isset($post_id)){
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[1]');
                if($this->form_validation->run()){
                    $this->post_model->insert_comment($post_id);
                    redirect('post/view/' . $post_id);
                }
            }else{
                $data = array(
                    'error' => '<p>Request method error</p>',
                    'page_body' => 'errors'
                );
                $this->load->view('page/home/index', $data);
            }
        }else{
            $data = array(
                'error' => '<p>No post id define</p>',
                'page_body' => 'errors'
            );
            $this->load->view('page/home/index', $data);
        }
    }

    public function all_post($cat = 0, $subCat = 0){
        if($this->input->get('page')){
            $page = (int)$this->input->get('page');
        }else{
            $page = 0;
        }
        $data['result'] = $this->post_model->get_post_by_page($cat, $subCat, $page);
        $data['page_body'] = "view_aLl_post";
        $data['next_page'] = $page + 1;
        $this->load->view('page/home/index.php', $data);

        // print_r($data['result']);
    }


    public function get_sub_cat($cat_id){
        $result['data'] = $this->categories_model->get_sub_categories($cat_id);
        $this->load->view('partials/home/single/sub_cat_view', $result);
    }

    public function edit($id){

        // echo $id;
        $data['page_body'] = 'edit_post';
        $data['main_categories']=$main_categories = $this->categories_model->get_main_categories();
       $result = $this->post_model->get_post_info_by_id($id);
        
        // $data['page_body'] = 'profile_view';
        $data['result'] = $result[0];
        // print_r( $data['result']);
         $this->load->view('page/home/index', $data);
       
            
    }

    public function update(){

        $id= trim($this->input->post('id'));
        $title = trim($this->input->post('title')); 
        $cat = trim($this->input->post('cat')); 
        $content = trim($this->input->post('content'));
        $image = trim($this->input->post('image'));
        $author_id = $this->session->userdata('userid');

        

            $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]');
            $this->form_validation->set_rules('content', 'Content', 'required|min_length[3]');
            $this->form_validation->set_rules('cat', 'Category', 'trim|required');

            if($this->form_validation->run()){
                    
                $data = array(
                    
                    'id' => $id,
                    'title' => $title,
                    'cat_id' => $cat,                    
                    'content' => $content,
                    'image' => $image,
                    'author_id' => $author_id,
                    'status'=>'P',
                    
                );

                // print_r($data);
                $this->post_model->update($data);
                // print_r($data);
                 $this->session->set_flashdata(array("create_success" => "<p class='text-success'>Post Update success</p>"));
                redirect('home');
                    
                }else{
                    $data = array(
                        'error' => '<p>Data is invalid. Make sure data is fill up</p>',
                        'page_body' => 'errors'
                    );
                    $this->load->view('page/home/index', $data);

                }
    }

    public function view_pending_post($id){

        // echo $id;
        $data['main_categories']=$main_categories = $this->categories_model->get_main_categories();
       $result = $this->post_model->get_post_info_by_id($id);
        
        $data['page_body'] = 'view_pending_post';
        $data['result'] = $result[0];
        // print_r( $data['result']);
         $this->load->view('page/home/index', $data);
        
            
    }

    public function confirm($id){ 

         $data = array(
            'id'    =>  $this->uri->segment(3),
            'status'    =>  "C",
            );
        $this->post_model->confirm($data);
        redirect('user/alert');


            
    }

    public function delete($id){ 

         
        $data = array(
            'id'    =>  $this->uri->segment(3),
            'status'    =>  "D",
            );
        $this->post_model->confirm($data);
        redirect('user/alert');
    }

    public function post_delete($id){ 

    // echo $id;        
        
        $this->post_model->post_delete($id);
        redirect('home');
            
    }
}