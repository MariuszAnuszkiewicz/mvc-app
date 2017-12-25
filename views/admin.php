<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
  <?php LoadFile::load(WEBROOT_PATH.DS.'/css/style.css'); ?>
</style>
<script>
  <?php LoadFile::load(WEBROOT_PATH.DS.'/js/admin.js'); ?>
</script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title><?php echo Config::get('site_name') ?></title>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
    <?php if (Session::get('login')) { ?>
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/"><?php echo Config::get('site_name') . " - Admin section" ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">  
            <li><a <?php if (App::getRouter()->getController() == 'pages') { ?> class="active" <?php } ?>href="<?php echo (App::getRouter()->getMethodPrefix() == 'admin') ? './pages' : './pages/' ?>">Pages</a></li>
            <li><a <?php if (App::getRouter()->getController() == 'contacts') { ?> class="active" <?php } ?>href="<?php echo (App::getRouter()->getController() == 'contacts') ? './contacts' : './contacts' ?>">Contact Us</a></li>
            <li><a href="/admin/users/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    <?php } ?>
    </nav>

    <div class="container">
      <div class="starter-template">
         <?php
	    if (Session::hasFlash()) {
	 ?>
            <div class="alert alert-info" role="alert">
         <?php
            Session::flash();
            echo $data['content'];
         ?>
            </div>
         <?php
	   }
        ?>
      </div>
    </div>

</body>
</html>

