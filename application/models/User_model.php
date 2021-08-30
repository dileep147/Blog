<?php
class User_model extends CI_Model{
    public function insert($data){

        $this->db->insert('users',$data);
        return $this->db->insert_id();
        
        // $this->db->insert('users', $data);
        // return array($this->db->insert_id(), $this->input->post('username'));
    }

    public function get_user($username,$password){
        return  $this->db->select('*') 
            ->from('users') 
            ->where('username',$username) 
            ->where('password',MD5($password))  
            ->get() 
            ->row();
    }

    public function update($data){ 
        return  $this->db->where('id',$data['id'])
                    ->update('users',$data);
    }

    public function get_user_by_id($user_id){
        $this->db->where('id', $user_id);
        $result = $this->db->get('users');
        return $result->result();
    }

    public function user_exists(){
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $result = $this->db->get('users');
        if($result->num_rows() === 1){
            return true;
        }else {
            return false;
        }
    }

    public function user_info($id ){
        return $this->db->select('*')
            ->from('users')
           
            ->where('id',$id)
            ->get()
            ->result(); 
    }

    public function update_user($data){
        
        $this->db->where('id',$data['id']);
        $this->db->update('users',$data);     
        
    } 

    
}