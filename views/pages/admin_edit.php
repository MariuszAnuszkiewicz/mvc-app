<?php LoadFile::load(WEBROOT_PATH.DS.'btn\back_btn.html'); ?>

<h3 class="label-edit">Edit Page</h3>

<form method="post" action="">
  <div class="form-group">
    <label for="alias">Alians</label>
    <input type="text" id="alias" name="alias" value="<?php echo $data['edit_pages']['alias'] ?>" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?php echo $data['edit_pages']['title'] ?>" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control"><?php echo $data['edit_pages']['content'] ?></textarea>
  </div>
  
  <div class="form-group">
    <label for="is_published">Publish</label>
    <input type="chcekbox" name="is_published" id="is_published" chocked="checked" />
  </div>
  <input type="submit" class="btn btn-success" name="submit">
</form>



