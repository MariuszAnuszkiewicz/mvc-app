
<h3 class="messages">Messages</h3></br>

<table class="table table-striped-contacts" style="width: 90%;">
  <tr>
    <td style="width: 5%;">#</td>
    <td style="width: 10%;">Name</td>
    <td style="width: 25%;">Email</td>
    <td style="width: 50%;">Message</td>
  </tr>

<?php foreach($data['messages'] as $message){ ?>
  <tr>
    <td><?php echo $message['id'] ?></td>
    <td><?php echo $message['name'] ?></td>
    <td><?php echo $message['email'] ?></td>
    <td><?php echo $message['message'] ?></td>
  </tr>
<?php } ?>
</table>

