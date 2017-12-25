 <h3 class="label-admin">Pages</h3></br>

 <table class="table table-striped" style="width: 400px; position: absolute; top: 120px; left: 100px;">
   <?php foreach($data['admin_zone'] as $page){ ?>
    <tr>
       <td><?php echo $page['title']; ?></td>
       <td align="right">
         <a href="/admin/pages/edit/<?=$page['id']?>"><button class="btn btn-sm btn-primary">edit</button></a>
         <a href="/admin/pages/delete/<?=$page['id']?>" onclick="return confirm_delete();"><button class="btn btn-sm btn-warning">delete</button></a>
       </td>
    </tr>
   <?php } ?>
 </table>

 <br/>

 <div>
   <a href="/admin/pages/add/"><button class="btn btn-sm btn-success">New Page</button></a>
 </div>






