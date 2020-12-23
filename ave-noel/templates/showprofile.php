<?php ob_start(); ?>
<br>
<h2> Your Profile </h2> <br>

<?php
foreach($clientID as &$client){
?>

<fieldset style="margin: 10 px;"> 
 <p> Username : <strong> <?php echo $client['username']?> </strong> <p> 
 <p> Last name : <strong> <?php echo $client['nom']?> </strong> <p> 
 <p> First name : <strong> <?php echo $client['prenom']?> </strong> <p>
 <p> Email address : <strong> <?php echo $client['mail']?> </strong> <p>  
 <p> Last connection : <?php echo $client['last_connection_at']?> </p>
 <br>
</fieldset>

<?php }
?>
<form action="index.php?page=client&action=delete" method="POST">
    <input type="submit" value="Delete Account" class="btn btn-secondary" name="newDelete">
</form>


<?php
$body = ob_get_clean();
require('template.php');
?>