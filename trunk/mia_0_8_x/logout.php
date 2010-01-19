<?php
/**
* @package Mia-Chat
* @copyright Brilaps, LLC (http://brilaps.com)
* @license The MIT License (http://www.opensource.org/licenses/mit-license.php)
*/
session_start();
require('includes/mia.classes.php');
$mia = MiaChatDb::getInstance();
if ($mia->sessionHijackCheck()===false) {
    header('Location: index.php');
}
$mia->updateStatus('offline');

//Now blow up the session
session_unset();
session_destroy();
session_regenerate_id();

//Redirect to login
header('Location: index.php');
exit;
?>