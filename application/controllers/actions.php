<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actions extends CI_Controller {

	function __construct()
	{
		parent::__construct();
                ini_set('memory_limit', '-1');
		$this->load->library('grocery_CRUD');	
	}
	
	function show_data($output = null)
	{
		$this->load->view('home_view.php',$output);	
	}

	
	function index()
	{
            if(!$this->session->userdata('authenticated')) redirect('welcome');
		$this->show_data((object)array('output' => null , 'js_files' => array() , 'css_files' => array()));
	}	

	function employees_detail()
	{
             if(!$this->session->userdata('authenticated')) redirect('welcome');
		try{
			$crud = new grocery_CRUD();
                        
			$crud->set_table('employees');
                       
                        //$crud->set_relation('emp_no', 'salaries', 'salary');
                        $crud->set_relation_n_n('department','dept_emp','departments','emp_no','dept_no','dept_name');
			$crud->columns('emp_no','name','salary','department','gender','birth_date');
			
                        $crud->callback_column('salary', array($this,'get_salary'));
                        $crud->callback_column('name', array($this,'get_name'));
                        $crud->callback_column('department', array($this,'get_dept'));
                        $crud->display_as('birth_date', 'DOB');
                        
                       // $crud->add_action("More", "", "", "", array($this,'more_detail'));
                        
                        if($this->session->userdata('role')=='guest'){
                            $crud->unset_operations();
                        }
                        else if($this->session->userdata('role')=='super_user'){
                            $crud->unset_delete();
                        }
                        
			$output = $crud->render();
			$this->show_data($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        
        function get_salary($value,$row) {
            $this->db->where('emp_no',$row->emp_no);
            return $this->db->get('salaries')->row()->salary.' &euro;';   
        }
        function get_dept($value,$row) {
            $this->db->where('emp_no',$row->emp_no);
            if($this->db->get('dept_manager')->num_rows()>0)
                return $row->department.'(MANAGER)';  
            else return $row->department;
        }
        function get_name($value,$row) {
            return $row->last_name." ".$row->first_name;   
        }
        
        function more_detail($primary_key , $row)
        {
            return site_url('action/emp_detail').'?id='.$row->emp_no;
        }
        
        function emp_detail($id) {
            
            
        }
        
	function employees()
	{
             if(!$this->session->userdata('authenticated')) redirect('welcome');
		try{
			$crud = new grocery_CRUD();
                        
			$crud->set_table('employees');
			
                        if($this->session->userdata('role')=='guest'){
                        $crud->unset_operations();
                        }
                        else if($this->session->userdata('role')=='super_user'){
                            $crud->unset_delete();
                        }
			$output = $crud->render();
			
			$this->show_data($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function departments()
	{
             if(!$this->session->userdata('authenticated')) redirect('welcome');
		try{
			$crud = new grocery_CRUD();
                        
			$crud->set_table('departments');
			$crud->columns('dept_no','dept_name');
			
                        if($this->session->userdata('role')=='guest'){
                        $crud->unset_operations();
                        }
                        else if($this->session->userdata('role')=='super_user'){
                            $crud->unset_delete();
                        }
			$output = $crud->render();
			
			$this->show_data($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function salaries()
	{
             if(!$this->session->userdata('authenticated')) redirect('welcome');
		try{
			$crud = new grocery_CRUD();
                        
			$crud->set_table('salaries');
			$crud->columns('emp_no','salary','from_date','to_date');
			
                        if($this->session->userdata('role')=='guest'){
                           $this->employees();
                        }
                        else if($this->session->userdata('role')=='super_user'){
                            $crud->unset_delete();
                        }
			$output = $crud->render();
			
			$this->show_data($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function manage_title()
	{
             if(!$this->session->userdata('authenticated')) redirect('welcome');
		try{
			$crud = new grocery_CRUD();
                        
			$crud->set_table('titles');
			$crud->columns('emp_no','title');
		        
                        if($this->session->userdata('role')=='guest'){
                            $crud->unset_operations();
                        }
                        else if($this->session->userdata('role')=='super_user'){
                            $crud->unset_delete();
                        }
			$output = $crud->render();
			
			$this->show_data($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function dept_manager()
	{
             if(!$this->session->userdata('authenticated')) redirect('welcome');
		try{
			$crud = new grocery_CRUD();

			$crud->set_table('dept_manager');
			$crud->columns('dept_no','emp_no','from_date','to_date');
			
                        if($this->session->userdata('role')=='guest'){
                        $crud->unset_operations();
                        }
                        else if($this->session->userdata('role')=='super_user'){
                            $crud->unset_delete();
                        }
			$output = $crud->render();
			
			$this->show_data($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	

	
}