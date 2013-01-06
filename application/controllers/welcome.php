<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($msg=null)
	{ 

                $data=array('msg'=>$msg);
		//$this->load->view('welcome_message');
                if($this->session->userdata('authenticated')) redirect('home');
                else 
                $this->load->view('login_view',$data);
             
	}
        
        public function login(){
            
            $this->load->model('user');
            $status = $this->user->authenticate();

            if($status) {
                redirect('actions');
                
              }
              else{
                  $msg="Incorrect username or password. Can't authenticate please try again!";
                  $this->index($msg);
              }
        
            
        }//login
        
        public function logout() {
            $this->session->sess_destroy();
            $this->session->unset_userdata(array('authenticated','user','role'));
            $this->index('Sucessfully logged out.');
        }
                
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>