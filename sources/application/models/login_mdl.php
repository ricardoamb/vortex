<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_mdl extends CI_Model {

    public function login($login=null,$senha=null)
    {
        if($login != null && $senha != null)
        {
            $resultLogin = $this->db->get_where('vtx_users',array('login'=>$login));
            $resultEmail = $this->db->get_where('vtx_users',array('email'=>$login));
            if($resultLogin->num_rows() == 1){
                $result = $this->db->get_where('vtx_users',array('login'=>$login,'senha'=>$senha));
                if($result->num_rows() == 1){
                    $activeUser = $this->db->get_where('vtx_users',array('login'=>$login,'senha'=>$senha,'ativo'=>1));
                    if($activeUser->num_rows() == 1){return 'loggedLogin';}else{return 'activation';}
                }else{return 'senha';}
            }else{
                if($resultEmail->num_rows() == 1){
                    $result = $this->db->get_where('vtx_users',array('email'=>$login,'senha'=>$senha));
                    if($result->num_rows() == 1){
                        $activeUser = $this->db->get_where('vtx_users',array('email'=>$login,'senha'=>$senha,'ativo'=>1));
                        if($activeUser->num_rows() == 1){return 'loggedEmail';}else{return 'activation';}
                    }else{return 'senha';}
                }else{return 'login';}
            }
        }else{return false;}
    }

    public function get_user($login=null,$type='login')
    {
        if($login != null)
        {
            if($type == 'login'){
                return $this->db->get_where('vtx_users',array('login'=>$login),1);
            }else if($type == 'email'){
                return $this->db->get_where('vtx_users',array('email'=>$login),1);
            }
        }
        else
        {
            return false;
        }
    }

}

