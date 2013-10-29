<?php /* Smarty version Smarty-3.1.15, created on 2013-10-29 02:50:47
         compiled from ".\templates\demo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32672526f21213a3072-34878337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a7e89e303f4de9a63afc840f5194fe561182e55' => 
    array (
      0 => '.\\templates\\demo.tpl',
      1 => 1383015045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32672526f21213a3072-34878337',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_526f21213e1881_32087986',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526f21213e1881_32087986')) {function content_526f21213e1881_32087986($_smarty_tpl) {?><?php if (!is_callable('smarty_function_bender')) include 'D:\\Ampps\\www\\projects\\Bender\\demo\\smarty\\plugins\\function.bender.php';
?><!DOCTYPE HTML>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Bender Demo</title>
    <?php echo smarty_function_bender(array('src'=>"Bender/demo/assets/css/bootstrap.css"),$_smarty_tpl);?>

    <?php echo smarty_function_bender(array('src'=>"Bender/demo/assets/css/bootstrap-theme.css"),$_smarty_tpl);?>

    <?php echo smarty_function_bender(array('src'=>"Bender/demo/assets/js/jquery-1.10.2.js"),$_smarty_tpl);?>

    <?php echo smarty_function_bender(array('src'=>"Bender/demo/assets/js/bootstrap.js"),$_smarty_tpl);?>

    <?php echo smarty_function_bender(array('output'=>"Bender/demo/assets/css/stylesheet.css"),$_smarty_tpl);?>

</head>

<body>

<div class="container">
    <div class="row">
        <div class="jumbotron">
            <div class="container">
                <h1>Hello, world!</h1>
                <p>This is a Bender demo</p>
                <p><a class="btn btn-primary btn-lg" href="http://www.esiteq.com/projects/bender/">Learn more &raquo;</a></p>
            </div>
        </div>
    </div>
</div>

    <?php echo smarty_function_bender(array('output'=>"Bender/demo/assets/js/javascript.js"),$_smarty_tpl);?>

</body>
</html><?php }} ?>
