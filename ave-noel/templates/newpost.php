<?php ob_start(); ?>
<br>
<h2> Share Your Story </h2>
<br>
<form action="index.php?page=post&action=create" method="POST">

    <label>Title</label>
    <input style="display:block; margin-left:auto; margin-right:auto; width:60%;"  class="form-control"  type="text" name="title">
    
    <br>

    <div class="form-group">
      <label for="exampleTextarea">Content</label>
      <textarea style="display:block; margin-left:auto; margin-right:auto; width:60%;"  name="content" class="form-control" id="exampleTextarea" rows="3" style="width=50%;"></textarea>
    </div>
    <input type="submit" value="Publish" class="btn btn-secondary" name="newPost">
</form>
<br>
<hr> </hr>
<br>
<h2> Your ancient posts </h2> <br>
<?php
foreach($postClient as &$post){ 
?>
<form action="index.php?page=post&action=delete" method="POST">
<fieldset style="margin: 10 px;"> 
<input type="hidden" name="idPost" value="<?php echo $post["id"]?>">

<p> <strong> <?php echo $post["title"]?> </strong> <p> 
    <div class="form-group">
      <textarea style="display:block; margin-left:auto; margin-right:auto; width:60%;"  name="content" class="form-control" id="exampleTextarea" rows="3" readonly> <?php echo $post["content"]?> </textarea>
     <p> edited on <?php echo $post["created_at"]?> </p>
    <?php if ($post["updated_at"]!='') { ?>
     <p> modified on <?php echo $post["updated_at"]?> </p>
    <?php } ?>
    </div>
<input type="submit" value="Delete Post" class="btn btn-secondary" name="deletePost">
</fieldset>
<br> <br>
</form>
<?php }
?>


<br>
<hr> </hr>
<br>
<h2> Modify your ancient posts </h2>


<?php
$postClient = $this->read();
foreach($postClient as &$post){ 
?>
<form action="index.php?page=post&action=update" method="POST">
<fieldset style="margin: 10 px;"> 
<input type="hidden" name="idPost" value="<?php echo $post["id"]?>">

    <label>Title</label>
    <input style="display:block; margin-left:auto; margin-right:auto; width:60%;"  class="form-control"  type="text" name="title" value="<?php echo $post["title"]?>">
    
    <br>
    <div class="form-group">
      <textarea style="display:block; margin-left:auto; margin-right:auto; width:60%;"  name="content" class="form-control" id="exampleTextarea" rows="3"> <?php echo $post["content"]?> </textarea>
    </div>
<input type="submit" value="Modify Post" class="btn btn-secondary" name="modifyPost">
</fieldset>
<br> <br>
</form>
<?php }
?>

<?php
$body = ob_get_clean();
require('template.php');
?>