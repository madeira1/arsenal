<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color: #bbb;
        }
       
        .container1{
            margin: auto;
            padding: 2px 5px;
            width:1200px;
            font-family: "Century Gothic",Arial, Helvetica, Sans-Serif;
            background-color: #fff;
            min-height: 600px;
        }
        
        header{
            height:60px;
            font-size: 16px;
        }
        header span{
           
            margin-right: 3px;
            padding: 5px;
            display: box;
            font-weight: bold;
            border: 1px solid;
            
        }

        header span:hover{
            background-color: #000;
           
        }
        header span a:hover{ text-decoration: none;  color: #fff;}
       
        
    </style>
</head>
<body>
     <div class="container1">
    <header>
        
            <?php if($this->session->userdata('authenticated')):?>
		<span><a href="<?php echo site_url('actions/employees');?>" >Employees</a></span>	
		<span><a href="<?php echo site_url('actions/employees_detail');?>" >Employees(full detail)</a></span>	
		<span><a href="<?php echo site_url('actions/departments');?>" >Departments</a></span>             
                <!--
                <li><a href="<?php echo site_url('actions/salaries');?>" >Salaries</a></li>
                
                -->
		<span><a href="<?php echo site_url('actions/manage_title');?>">Titles</a></span>
                <span><a href="<?php echo site_url('actions/dept_manager')?>">Department Manager</a></span>
		<span><a href="<?php echo site_url('welcome/logout')?>">Logout</a></span>
            <?php endif;?>
    </header>
   
        
   