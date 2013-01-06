<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller{
   
    function __construct(){
        parent::__construct();
    }
    function index(){
        
        if(!$this->session->userdata('authenticated')) redirect ('welcome');
        
        echo 'Home page';
        
    }
    
}

?>
