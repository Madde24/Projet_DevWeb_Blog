

<p style="font-size:20px;"> <?php echo $postClient["avatar_path"]?> <strong> <?php echo $postClient["username"]?> </strong> posted : <p> 
<div style="border:1px dotted black; display:block; margin-left:auto; margin-right:auto; width:50%;" >
<p> <strong> <?php echo $postClient["title"]?> </strong> <p> 
    <div class="form-group">
      <textarea style="display:block; margin-left:auto; margin-right:auto; width:60%;" name="content" class="form-control" id="exampleTextarea" rows="3" style="width:50%;" readonly> <?php echo $postClient["content"]?> </textarea>
     <p> edited on <?php echo $postClient["created_at"]?> </p>

     <?php foreach ($commentsList as &$comments){ ?>
     <p> <?php echo $comments['username']?> commented on <?php echo $comments['created_at']?>  </p>
         
        <?php if ($comments['id_client']==$session->get('id')){ ?>
            <form action="index.php?page=comment&action=update" method="POST">
            <input type="text" style="display:block; margin-left:auto; margin-right:auto; width:40%;" name="content" class="form-control" id="exampleTextarea" rows="3" style="width:50%;"  value="<?php echo $comments["text_comment"]?>"> 
            <br>
            <center> 
            <table style="display:block; margin-left:auto; margin-right:auto;"> 
            <tr>
            <td> 
            <input type="hidden" name="idComment" value="<?php echo $comments["id"]?>">
            <input  type="submit" value="Modify" class="btn btn-secondary" name="modifyPost"> 
            </form> </td>
            <td> <form action="index.php?page=comment&action=delete" method="POST">
            <input type="hidden" name="idComment" value="<?php echo $comments["id"]?>">
            <input  type="submit" value="Delete" class="btn btn-secondary" name="deletePost"> 
            </form> </td>
            </tr>
            </table> </center>
            
        <?php }else{?>
            <input type="text" style="display:block; margin-left:auto; margin-right:auto; width:40%;" name="content" class="form-control" id="exampleTextarea" rows="3" style="width:50%;" readonly  value="<?php echo $comments["text_comment"]?>">
     <?php } ?>
     <br>
    <?php }?>
    </div>

    <?php if ($session->get('id')){ ?>
    
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Comment</a>
      
        <div class="dropdown-menu" style=" margin-left:auto; margin-right:auto; width:40%;" >
        <form action="index.php?page=comment&action=create" method="POST">
        <input type="hidden" name="idPost" value="<?php echo $postClient["id"]?>">
        
         <textarea name="content" class="form-control" id="exampleTextarea" rows="3">  </textarea>
        <input  type="submit" value="Send" class="btn btn-secondary" class="dropdown-item" name="commentPost">
        
        </form>
        </div>
        
    <?php } ?>
</div>
</fieldset>
<br>


