<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{

function __construct(){
        parent::__construct();
    }
public function authenticate()
 {
    $username = $this->security->xss_clean($this->input->post('username'));
    $password = $this->security->xss_clean($this->input->post('password'));

   $this -> db -> select('id, username, password,role');
   $this -> db -> from('users');
   $this -> db -> where('username = ' . "'" . $username . "'");
   $this -> db -> where('password = ' . "'" . MD5($password) . "'");
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     $data=array(
         'user'=>$username,
         'authenticated'=>TRUE,
         'role'=>$query->row()->role,
     );
     $this->session->set_userdata($data);
     return $query->result();
   }
   else
   {
     return false;
   }
 }
    
}


?>
