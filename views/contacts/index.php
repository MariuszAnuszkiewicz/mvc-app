
<?php $validate = new Validate(); ?>

<h3 class="label-contact">Contact Us</h3>

 <form name="form" action="" method="post" id="contact_form">
   <input type="text" class="form-control" name="name" placeholder="Your Name" />
     <span class="alert_name"><p><?php echo $validate->run($validate::input('name'), array(4, 100), $validate::input('submit')) ?></p></span></br>
   <input type="text" class="form-control" name="email" placeholder="Your Email" />
     <span class="alert_email"><p><?php echo $validate->email($validate::input('email')) ?></p></span></br>
   <textarea name="message" class="form-control" placeholder="Your Message"></textarea></br>    
   <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Send</button>  
 </form>
 
