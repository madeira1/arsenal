
<?php $this->load->view('header');?>

<div align="center">
    <h2>Login Panel</h2><p>&nbsp;</p>
     <h3><font color="#FF0000"><?=$msg ?> </font></h3>
    <form method="post" action="<?php echo base_url();?>index.php/welcome/login">  
        <fieldset style="width:400px;">
   
        <legend>Your Info</legend>
       
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="your unique id" /><br/><br/>
       
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="your secret" /><br/><br/>
        
        <input type="submit" name="login-submit-button" value="Login" />
       
    </fieldset>   
    </form>
</div>
<?php $this->load->view('footer');?>