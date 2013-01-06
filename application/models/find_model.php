<?php
class Find_model extends CI_model {
function _construct()

{

parent:: construct();
$this->load->database();

}

function search($dept)

{

$res = $this ->db->get_where('departments',array('dept_name'-> $dept));


return $res->result_array();


}


}

?>