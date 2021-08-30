<?php

class Home extends CI_Controller{
    public function index(){
        $data['page_body'] = "root";
        $data['results'] = $this->post_model->get_all();

       
        // print_r($data['results']);
        $this->load->view('page/home/index', $data);

        // $this->load->view('page/home/login');
    }
    
}