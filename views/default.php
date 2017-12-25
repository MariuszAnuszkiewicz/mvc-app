<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
  <?php LoadFile::load(WEBROOT_PATH.DS.'css/style.css'); ?>
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title><?php echo Config::get('site_name') ?></title>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/"><?php echo Config::get('site_name') . ' - User Section' ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a <?php if(App::getRouter()->getController() == 'pages'){ ?> class="pages" <?php } ?>href="<?php echo (App::getRouter()->getAction() == 'view') ? '../' : '../pages/' ?>">Pages</a></li>
            <li><a <?php if(App::getRouter()->getController() == 'contacts'){ ?> class="contacts" <?php } ?>href="<?php echo (App::getRouter()->getController() == 'contacts') ? '../contacts/' : '../contacts/' ?>">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
       <div class="starter-template">
          <?php
		    if(Session::hasFlash()){
		  ?>
            <div class="alert alert-info" role="alert">
          <?php
             Session::flash();
          ?>
            </div>
          <?php
		       echo $data['content'];
		    }
          ?>
       </div>
    </div>

</body>
</html>