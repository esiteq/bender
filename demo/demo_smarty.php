<?php
/**
 * @author Alex Raven
 * @company ESITEQ
 * @website http://www.esiteq.com/
 * @email bugrov at gmail.com
 * @created 29.10.2013
 * @version 1.0
 */

require_once "../Bender/Bender.class.php";
require_once "smarty/Smarty.class.php";

$smarty = new Smarty;
$smarty->display( "demo.tpl" );
?>