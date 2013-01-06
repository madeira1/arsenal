<?php
class Find extends CI_Controller{

function _contruct()

{

parent::_construct();

$this->load->model('find_model');

}

function index()

{


}

function findemp()

{

$fname = $this->input->get('firstname');
$lname = $this->input->get('lastname');
$dept = $this->input->get('dept');
$job = $this->input->get('jobtitle');

$res = $this->find_model->search($dept);

echo json_encode($res);

}

}

?>
