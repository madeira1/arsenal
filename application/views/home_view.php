<?php 
$this->load->view('header');
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

        
<?php

    if(isset($output)) echo $output;
    else {
        echo '<div align="center">';
        echo '<h1>Welcome '.$this->session->userdata('user')."</h1>";
        
        echo '</div>';
    }
    $this->load->view('footer');

?>
		
		
	

