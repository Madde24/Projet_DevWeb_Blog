<?php ob_start(); ?>
<br>
<h2> Create your account </h2>
<br>
<form action="index.php?page=client&action=create" method="POST">

    <div class="form-group">
      <label for="firstnameLabel">First name</label>
      <input style="display:block; margin-left:auto; margin-right:auto; width:60%;"  type="text" class="form-control" id="firstnameLabel" aria-describedby="firstnameHelp" placeholder="Enter first name" name="firstname">
     
    </div>
    <div class="form-group">
      <label for="lastnameLabel">Last name</label>
      <input style="display:block; margin-left:auto; margin-right:auto; width:60%;"  type="text" class="form-control" id="lastnameLabel" aria-describedby="lastnameHelp" placeholder="Enter last name" name="lastname">
      
    </div>
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

    <div class="form-group">
        <label for="avatarLabel">Avatar path</label>
        <input style="display:block; margin-left:auto; margin-right:auto; width:60%;" type="text" class="form-control" id="avatarLabel" placeholder="Enter avatar path" name="avatarpath" value="">
        <small id="avatarHelp" class="form-text text-muted">The avatar path is optional</small>
    </div>

    <input type="submit" value="Create" class="btn btn-secondary" name="newClient">
</form>
<br>


<?php
$body = ob_get_clean();
require('template.php');
?>