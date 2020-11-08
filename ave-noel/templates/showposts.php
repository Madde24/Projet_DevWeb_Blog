<?php ob_start(); ?>
<br>

<h2> Your shared stories </h2> <br>

<?php
echo $content;
?>




<?php
$body = ob_get_clean();
require('template.php');
?>