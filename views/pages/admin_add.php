<?php LoadFile::load(WEBROOT_PATH.DS.'btn\back_btn.html'); ?>

<h3 class="add_page">Add Page</h3></br>

<form method="post" action="">
  <input type="hidden" name="id" value="">
  <div class="form-group">
    <label for="alias">Alians</label>
    <input type="text" id="alias" name="alias" value="" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="title">Alians</label>
    <input type="text" id="title" name="title" value="" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control"></textarea>
  </div>
  
  <div class="form-group">
    <label for="is_published">Publish</label>
    <input type="chcekbox" name="is_published" id="is_published" chocked="checked">
  </div>
  <input type="submit" class="btn btn-success">
</form>
