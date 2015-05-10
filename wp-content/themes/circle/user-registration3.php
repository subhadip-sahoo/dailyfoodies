<?php /* Template Name: Reg */ ?>
<div id="register-form">  
    <div class="title">  
        <h1>Register your Account</h1>  
        <span>Sign Up with us and Enjoy!</span>  
    </div>  
    <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post" name="registerform" id="registerform">  
        <input type="text" name="user_login" value="Username" id="user_login" class="input" />  
        <input type="text" name="user_email" value="E-Mail" id="user_email" class="input"  />  
        <input type="password" name="pwd" id="user_pass" class="input" value="Password" size="20" />  
            <?php do_action('register_form'); ?>  
            <input type="submit" value="Register" id="register" />  
        <hr />  
        <p class="statement">A password will be e-mailed to you.</p>  
    </form>  
</div>  
