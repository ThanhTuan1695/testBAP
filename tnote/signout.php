
<?php
 

require_once 'core/init.php';

$session->destroySession();

header('Location: index.php');
 
?>