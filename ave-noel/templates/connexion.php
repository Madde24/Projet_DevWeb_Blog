<?php ob_start(); ?>
<br>
<h2> Connexion  </h2>
<br>
<form action="index.php?page=client&action=connect" method="POST">
    <div class="form-group">
      <label for="usernameLabel">Username</label>
      <input style="display:block; margin-left:auto; margin-right:auto; width:60%;"  type="text" class="form-control" id="usernameLabel" aria-describedby="usernameHelp" placeholder="Enter username" name="username">
      
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input style="display:block; margin-left:auto; margin-right:auto; width:60%;"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="passwordLabel">Password</label>
      <input style="display:block; margin-left:auto; margin-right:auto; width:60%;"  type="password" class="form-control" id="passwordLabel" placeholder="Password" name="password">
    </div>
    <input type="submit" value="Connexion" class="btn btn-secondary" name="connexion">
</form>
<br>
<hr> </hr>
<br>
<?php
$body = ob_get_clean();
require('template.php');
?>