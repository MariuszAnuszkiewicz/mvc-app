<?php $validate = new Validate(); ?>

<h3 class="label-login">Login</h3></br>

<form name="form" method="post" action="">
 <div class="form-group">
   <label for="login">Login</label>
   <input type="text" id="login" name="login" class="form-control" />
     <span class="alert_login"><p><?php echo $validate->run($validate::input('login'), array(4, 100), $validate::input('log_submit'))?></p></span><br/>
 </div>
 
 <div class="form-group">
   <label for="password">Password</label>
   <input type="password" id="password" name="password" class="form-control" />
     <span class="alert_password"><p><?php echo $validate->checkPassword($validate::input('password'), $validate::input('log_submit'))?></p></span><br/>
 </div>
 <input type="submit" class="btn btn-success" name="log_submit"/>
</form>
