<?php ob_start(); ?>
<br>
<h2> Deconnexion </h2>
<p> Merci de votre passage ainsi que de votre soutien et à bientôt !</p>
<form action="index.php?page=client&action=disconnect" method="POST">
    <input type="submit" value="Disconnexion" class="btn btn-secondary" name="deconnection">
</form>

<?php
$body = ob_get_clean();
require('template.php');
?>