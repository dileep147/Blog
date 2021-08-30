<?php

class User extends CI_Controller{
    public function index(){
        if($this->session->userdata('islogin')){
            redirect('home');
        }else{
            $this->load->view('page/home/login');
        }
    }

    public function registration(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('fullname', 'Name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|md5');
            $this->form_validation->set_rules('re_password', 'Repeat Password', 'required|md5|matches[password]');
            

            if($this->form_validation->run()){
                $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
               
                'password' =>  $this->input->post('password'),
                'fullname' => $this->input->post('fullname'),
                'last_log_date' => date("Y-m-d h:i:s")
                ); 
            $this->session->set_userdata($data);
            $this->user_model->insert($data); 
             $this->session->set_userdata($data);
                    $this->load->view('page/home/login');

            }else{
                echo "validation error";
            }
        }else{
            echo "No data";
        }
    }

    public function profile($user_id){
        $result = $this->user_model->get_user_by_id($user_id);
        $infoList = $this->user_model->user_info($user_id);
        // $data['informations'] =$informations= $infoList[0]  ;  
        $data['page_body'] = 'profile_view';
        $data['result'] = $result[0];

        // print_r( $data);
        $this->load->view('page/home/index', $data);
    }

    public function profile_view($user_id){
        $result = $this->user_model->get_user_by_id($user_id);
        $data['page_body'] = 'profile_view_edit';
        $data['result'] = $result[0];

         $this->load->view('page/home/index', $data);
        
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $result   = $this->user_model->get_user($username,$password); 

            // print_r($result);

            if($result)
            { 
                $sdata = array(
                'userid'     =>  $result->id,
                'fullname'    =>  $result->fullname,
                'username'    =>  $result->username,
                'password'    =>  $result->password,
                'islogin' => true
                ); 

                $this->session->set_userdata($sdata);
                          
                $this->user_model->update(array('id'=>$result->id,'last_log_date' => date("Y-m-d h:i:s")));
                redirect('home',$sdata) ;
            }
        }else{
            echo "Request method error";
        }
    }

    public function edit_registration(){
        $id= trim($this->input->post('id'));
        $fullname = trim($this->input->post('fullname')); 

        if(!empty($_FILES['image']['name']))
            {
                $config['upload_path'] = './uploads/pro_pic';
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
                    $image = base_url().'uploads/pro_pic/'.$pic['file_name'];
                   
                }
            }

        $this->form_validation->set_rules('fullname', 'Full name', 'required|min_length[3]');

        if($this->form_validation->run()){
                    
                $data = array(
                    
                    'id' => $id,
                    'fullname' => $fullname,                    
                    'pro_pic' => $image,                  
                    
                );

                // print_r($data);
                $this->user_model->update_user($data);
                // print_r($data);
                 $this->session->set_flashdata(array("create_success" => "<p class='text-success'>User Update success</p>"));
                redirect('home');
                    
                }else{
                    $data = array(
                        'error' => '<p>Data is invalid. Make sure data is fill up</p>',
                        'page_body' => 'errors'
                    );
                    $this->load->view('page/home/index', $data);

                }
    }


    public function logout(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $this->session->unset_userdata('userid');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('islogin');
            redirect('home');
        }else{
            echo "Request method error";
        }
    }

    public function alert(){
        $data['page_body'] = 'view_alert';

        $data['informations'] = $this->post_model->pending_info(); 
        $this->load->view('page/home/index', $data);
        
        // print_r($data['informations']);
    }
}